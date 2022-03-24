<?php

namespace App\Http\Middleware;

use App\WebCounter;
use Closure;

class WebCounterMiddleware
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
        $web = new WebCounter;
        $web->set_count();
        
        return $next($request);
    }
}
