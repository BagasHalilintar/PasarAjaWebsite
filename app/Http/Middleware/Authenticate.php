<?php

namespace App\Http\Middleware;

use Closure;
// use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate 
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle($request, Closure $next){
        if(!Auth::check()){
        return redirect('loginview')->with('error', 'Silahkan Login Terlebih Dahulu');
        }
        return $next($request);
    }
}
