<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GroupMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if($request->name == "email"){
            echo  "GroupMiddleware";
        }
        return $next($request);
    }
}
