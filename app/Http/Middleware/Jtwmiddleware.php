<?php

namespace App\Http\Middleware;

use Closure;
//use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;

class Jtwmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {try {
        $user =JWTAuth::parseToken()->authenticate();
    } catch (\Exception $e) {
        if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
           return response()->json(['status'=>'Token is Invalid']);
        }
        elseif ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
            # code...
            return response()->json(['status'=>'Token is Exceped']);
        }
        else  {
            return response()->json(['status'=>'Authorization Token not found']);
         }
        //throw $th;
    }
        return $next($request);
    }
}
