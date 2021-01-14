<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TechnicalUserAuthorized
{
    /**
     * The access permission to the technical user's routes should be implemented here, if he was logged in
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
