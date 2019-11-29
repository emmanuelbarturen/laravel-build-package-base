<?php namespace VendorName\PackageName\Middleware;

use Closure;


/**
 * Class FirstMiddleware
 * @package VendorName\PackageName\Middlewares
 */
class FirstMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        if ($user && $user->freshsales_id) {
            # do your magic
        }

        return $next($request);
    }
}
