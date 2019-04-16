<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "userId" => 'required',
            'last_name' => 'required|string|max:50|min:3',
            'first_name' => 'string',
            'phone_number'=> 'required|string|min:3',
            'password' => 'required'
        ];
    }
     /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            'email' => 'trim|lowercase',
            'last_name' => 'trim|capitalize|escape'
        ];
    }
}
