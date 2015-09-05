<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class OnlyMe
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
        if (Auth::check()) {
            if (Auth::user()->email === 'iamfaizahmed123@gmail.com') {
                return $next($request);
            } else {
                return abort(403);
            }
        } else {
            return abort(403);
        }
    }
}
