<?php

namespace Myckhel\Iaphub\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DisabledRoute
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
      abort(403, "This Endpoint Is Disabled \n enable it by replacing the 'iaphub_disabled' middleware from your config");
    }
}
