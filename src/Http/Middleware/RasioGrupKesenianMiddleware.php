<?php

namespace Bantenprov\RasioGrupKesenian\Http\Middleware;

use Closure;

/**
 * The RasioGrupKesenianMiddleware class.
 *
 * @package Bantenprov\RasioGrupKesenian
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RasioGrupKesenianMiddleware
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
        return $next($request);
    }
}
