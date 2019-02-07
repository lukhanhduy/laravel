<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Illuminate\Container\Container as App;

abstract class EloquentRepository implements RepositoryInterface
{
    protected $app;

    protected $model;

    protected $fieldSearchable = array();

    protected $presenter;

    protected $validator;

    protected $rules = null;

    protected $criteria;

    protected $skipCriteria = false;

    protected $skipPresenter = false;

    protected $scopeQuery = null;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->criteria = new Collection();
        $this->makeModel();
        $this->makePresenter();
        $this->makeValidator();
        $this->boot();
    }

    public function boot()
    {

    }

    public function resetModel()
    {
        $this->makeModel();
    }

    abstract public function model();

    public function presenter()
    {
        return null;
    }

    public function validator()
    {

        if ( isset($this->rules) && ! is_null($this->rules) && is_array($this->rules) && !empty($this->rules) ) {
            if ( class_exists('Prettus\Validator\LaravelValidator') ) {
                $validator = app('Prettus\Validator\LaravelValidator');
                if ($validator instanceof ValidatorInterface) {
                    $validator->setRules($this->rules);
                    return $validator;
                }
            } else {
                throw new Exception( trans('repository::packages.prettus_laravel_validation_required') );
            }
        }

        return null;
    }

    public function setPresenter($presenter)
    {
        $this->makePresenter($presenter);
        return $this;
    }

    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    public function makePresenter($presenter = null)
    {
        $presenter = !is_null($presenter) ? $presenter : $this->presenter();

        if ( !is_null($presenter) ) {
            $this->presenter = is_string($presenter) ? $this->app->make($presenter) : $presenter;

            if (!$this->presenter instanceof PresenterInterface ) {
                throw new RepositoryException("Class {$presenter} must be an instance of Prettus\\Repository\\Contracts\\PresenterInterface");
            }

            return $this->presenter;
        }

        return null;
    }

    public function makeValidator($validator = null)
    {
        $validator = !is_null($validator) ? $validator : $this->validator();

        if ( !is_null($validator) ) {
            $this->validator = is_string($validator) ? $this->app->make($validator) : $validator;

            if (!$this->validator instanceof ValidatorInterface ) {
                throw new RepositoryException("Class {$validator} must be an instance of Prettus\\Validator\\Contracts\\ValidatorInterface");
            }

            return $this->validator;
        }

        return null;
    }

    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    public function scopeQuery(\Closure $scope){
        $this->scopeQuery = $scope;
        return $this;
    }

    public function all($columns = array('*'))
    {
        $this->applyCriteria();
        $this->applyScope();

        if ( $this->model instanceof \Illuminate\Database\Eloquent\Builder ){
            $results = $this->model->get($columns);
        } else {
            $results = $this->model->all($columns);
        }

        $this->resetModel();

        return $this->parserResult($results);
    }

    public function paginate($pagination = [ 'limit' => null , 'skip' => null ] , $columns = array('*'))
    {
        // $this->applyCriteria();
        // $this->applyScope();
        $limit = is_null($pagination['limit']) ? config('global.pagination.limit', 10) : $pagination['limit'];
        $skip = is_null($pagination['skip']) ? config('global.pagination.skip', 0) : $pagination['skip'];
        $results = $this->model->skip($skip)->paginate($limit);
        $this->resetModel();
        return $this->parserResult($results);
    }

    public function find($id, $columns = array('*'))
    {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->model->findOrFail($id, $columns);
        $this->resetModel();
        return $this->parserResult($model);
    }

    public function findByField($field, $value = null, $columns = array('*'))
    {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->model->where($field,'=',$value)->paginate($pagination,$columns);
        $this->resetModel();
        return $this->parserResult($model,true);
    }

    public function findProjectFields($filter = array(),$columns = array()){
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->model;
        $fillable = $model->fillable;
        for( $i=0; $i<count($fillable); $i++ ){
            if(array_search($value,$columns)){
                unset($fillable[$i]);
           }
        }
        if($filter){
            $this->model->where($filter);
        }
        $model = $this->model->paginate($pagination,$fillable);
        $this->resetModel();
        return $this->parserResult($model,true);
    }

    public function findWhere( array $where , $columns = array('*'))
    {
        $this->applyCriteria();
        $this->applyScope();

        foreach ($where as $field => $value) {
            if ( is_array($value) ) {
                list($field, $condition, $val) = $value;
                $this->model = $this->model->where($field,$condition,$val);
            } else {
                $this->model = $this->model->where($field,'=',$value);
            }
        }

        $model = $this->model->paginate($pagination,$columns);
        $this->resetModel();
        return $this->parserResult($model,true);
    }

    public function findWhereIn( $field, array $values, $pagination = [], $columns = array('*'))
    {
        $this->applyCriteria();
        $model = $this->model->whereIn($field, $values)->paginate($pagination,$columns);
        $this->resetModel();
        return $this->parserResult($model,true);
    }

    public function findWhereNotIn( $field, array $values, $pagination = [], $columns = array('*'))
    {
        // $this->applyCriteria();
        $model = $this->model->whereNotIn($field, $values)->paginate($pagination,$columns);
        $this->resetModel();
        return $this->parserResult($model,true);
    }

    public function create(array $attributes)
    {
        if ( !is_null($this->validator) ) {
            $this->validator->with($attributes)
                ->passesOrFail( ValidatorInterface::RULE_CREATE );
        }

        $model = $this->model->newInstance($attributes);
        $model->save();
        $this->resetModel();

        event(new RepositoryEntityCreated($this, $model));

        return $this->parserResult($model);
    }

    public function update(array $attributes, $id)
    {
        $this->applyScope();

        if ( !is_null($this->validator) ) {
            $this->validator->with($attributes)
                ->setId($id)
                ->passesOrFail( ValidatorInterface::RULE_UPDATE );
        }

        $_skipPresenter = $this->skipPresenter;

        $this->skipPresenter(true);

        $model = $this->model->findOrFail($id);
        $model->fill($attributes);
        $model->save();

        $this->skipPresenter($_skipPresenter);
        $this->resetModel();

        event(new RepositoryEntityUpdated($this, $model));

        return $this->parserResult($model);
    }

    public function delete($id)
    {
        $this->applyScope();

        $_skipPresenter = $this->skipPresenter;
        $this->skipPresenter(true);

        $model = $this->find($id);
        $originalModel = clone $model;

        $this->skipPresenter($_skipPresenter);
        $this->resetModel();

        $deleted = $model->delete();

        event(new RepositoryEntityDeleted($this, $originalModel));

        return $deleted;
    }

    public function with($relations)
    {
        $this->model = $this->model->with($relations);
        return $this;
    }

    public function hidden(array $fields)
    {
        $this->model->setHidden($fields);
        return $this;
    }

    public function visible(array $fields)
    {
        $this->model->setVisible($fields);
        return $this;
    }

    public function parserResult($model,$pagination = false){
        $result = [];
        if($pagination === true){
            $result['data'] = $model["data"] ? $model["data"] : [];
            $result['next'] =$model['next'] ? $model['next'] : null;
            $result['prev'] =$model['prev_page_url'] ? $model['prev_page_url'] : null;
            $result['last'] = $model['last_page'] ? $model['last_page'] : 1;
            $result['total'] = $model['total'] ? $model['total'] : 0;
            $result['page'] = $model['current_page'] ? $model['current_page'] : 1;
            return $result;
        }
        else{
            $result['data'] = $model;
        }
        return $result;
    }
}