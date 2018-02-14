<?php namespace Bantenprov\JPJenisPekerjaan\Http\Middleware;

use Closure;

/**
 * The JPJenisPekerjaanMiddleware class.
 *
 * @package Bantenprov\JPJenisPekerjaan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class JPJenisPekerjaanMiddleware
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
