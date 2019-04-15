<?php

namespace App\Http\Middleware;
use Config;
use Closure;
use App;
class CheckLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->header('locale');
        if(empty($locale)){
            $locale = Config::get('global.defaultLanguage');
        }
        app()->setLocale($locale);
        return $next($request);
    }
}
