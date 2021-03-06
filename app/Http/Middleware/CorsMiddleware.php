<?php

namespace App\Http\Middleware;

class CorsMiddleware
{
    public function handle($request, \Closure $next)
    {
        $response = $next($request);

        $response->header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
        //$response->header('Access-Control-Allow-Headers', $request->header('Access-Control-Request-Headers'));
        $response->header('Access-Control-Allow-Headers', 'Authorization, X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Allow-Request-Method');
        $response->header('Access-Control-Allow-Origin', '*');
        $response->header('Allow', 'GET, POST, OPTIONS, PUT, DELETE');

        return $response;
    }

}
