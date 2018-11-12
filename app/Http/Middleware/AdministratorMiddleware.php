<?php

namespace App\Http\Middleware;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Closure;

class AdministratorMiddleware
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
        if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'administrator'){
            return $next($request);    
        }else{
            return redirect('/dashboard');
        }
        
    }
}
