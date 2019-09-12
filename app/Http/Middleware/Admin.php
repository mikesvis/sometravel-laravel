<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Administration;

class Admin
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
        if(auth()->user()->userable instanceof Administration){
            return $next($request);
        }
        abort(403);
        // return $next($request);
    }
}
