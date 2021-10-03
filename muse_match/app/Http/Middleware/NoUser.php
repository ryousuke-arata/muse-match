<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NoUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        session()->forget('login_user');

        return $response;

    }
}
