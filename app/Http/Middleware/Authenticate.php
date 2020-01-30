<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{

    public function handle($request, Closure $next, $guard = null)
    {
        try{
            $user = Auth::payload();
        }catch(\Tymon\JWTAuth\Exceptions\JWTException $erro){
            return response()->json(['Token_Ausente' => $erro->getMessage()], 500);
        }
        catch(\Tymon\JWTAuth\Exceptions\JWTExpiredException $erro){
            return response()->json(['Token_Expirado' => $erro->getMessage()], 500);
        }
        catch(\Tymon\JWTAuth\Exceptions\JWTInvalidException $erro){
            return response()->json(['Token_Invalido' => $erro->getMessage()], 500);
        }

        return $next($request);
    }
}
