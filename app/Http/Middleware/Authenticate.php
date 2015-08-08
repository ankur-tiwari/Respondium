<?php

namespace App\Http\Middleware;

use Alert;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    protected $pathNotices = [
        'ask' => 'You must sign in to your account before you ask any questions.'
    ];

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                $this->showNotices($request->path());

                return redirect()->guest('signin');
            }
        }

        return $next($request);
    }

    protected function showNotices($path)
    {
        if ( isset($this->pathNotices[$path]) ) {
            Alert::info($this->pathNotices[$path], 'Whoops!');
        }
    }
}
