<?php

namespace App\Http\Middleware;

use Closure;

class AuthKey
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
        $token = $request->header('API_KEY');
        if($token != 'ABCDEFGHIJ')
        {
            return response()->json(['message' => 'App Key Not Found'], 401);
        }

        return $next($request);
    }
}
