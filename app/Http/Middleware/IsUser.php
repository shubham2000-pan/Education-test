<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class IsUser
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
        Session::put('last_url','');
        return $next($request);
        
             
        
    
    }
}
