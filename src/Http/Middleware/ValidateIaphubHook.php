<?php

namespace Myckhel\Iaphub\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Myckhel\Iaphub\IaphubConfig;

class ValidateIaphubHook
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
        if (config('iaphub.hook_token') != $request->header('X-Auth-Token')) {
          abort(401, "Unauthorised");
        }
        return $next($request);
    }
}
