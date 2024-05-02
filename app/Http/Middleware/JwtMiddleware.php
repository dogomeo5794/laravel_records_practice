<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
// use Tymon\JWTAuth\Facades\JWTAuth;
// use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        try {
            //code...
        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException) {
                return response()->json(['status' => 'Token is invalid']);
            }
            else if ($e instanceof TokenExpiredException) {
                return response()->json(['status' => 'Token is expired']);
            }
            else {
                return response()->json(['status' => 'Unauthorized account']);
            }
        }
        return $next($request);
    }
}
