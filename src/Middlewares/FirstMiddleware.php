<?php namespace VendorName\PackageName\Middlewares;

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
        if ($user) {
            # do your magic
        }

        return $next($request);
    }
}
