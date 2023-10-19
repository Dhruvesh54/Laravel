<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(!($request->has("name") && $request->name == "dhruvesh")){
            return redirect('email_send_form');
        }
        return $next($request);
    }
}
