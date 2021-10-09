<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiTokenCheck
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
        if ($request->header("PRODUCT_KEY") == env("PRODUCT_KEY")){

            return $next($request);
        }else{
            return response()->json(["message" => "Invalid Product Key"] ,401);
        }
    }
}
