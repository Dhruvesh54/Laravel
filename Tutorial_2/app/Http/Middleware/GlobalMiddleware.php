<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GlobalMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if($request->name == "dhruvesh"){
            echo  "GlobalMiddleware";
        }
        return $next($request);
    }
}
