<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CompareSessionMiddleware
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
        //session()->forget("product_comparaison");

        //dump($request->session()->get("product_comparaison"));
        //dump($request->session()->get("product_comparaison"));

        return $next($request);
    }
}
