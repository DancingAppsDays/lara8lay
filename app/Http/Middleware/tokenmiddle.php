<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class tokenmiddle
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

        
        $headertoken = $request->header('Authorization');
        $token = null;

        $token = substr($headertoken,13);   //included dobule beraerer

    $authuser = User::where('apitoken', '=', $token)->first();


              
       if(isset($authuser))          //if token valid
       {
           return $next($request);
       }else { 
        return response()->json([
          'status' => 'error',           //error para mas espsecifico
          'data' => 'Acceso no autorizado, Favor de ingresar'
        ]); 
      }

    }
}
