<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class prefight
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
        /*
        if ($request->getMethod() === "OPTIONS") {      //for larave5....
            return response('');
        }
        //return $next($request);
        return $next($request)
        //return $next($request)
        //Url a la que se le dará acceso en las peticiones
       ->header("Access-Control-Allow-Origin", "http://localhost:4200/list")//http://urlfronted.example")
       //Métodos que a los que se da acceso
       ->header("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE")
       //Headers de la petición
       ->header("Access-Control-Allow-Headers", "X-Requested-With, Content-Type, X-Token-Auth, Authorization"); 
       */
      //$request->headers->set('Accept', 'application/json');
      $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'X-Requested-With, X-Auth-Token, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding, X-Login-Origin,X-CSRF-TOKEN, X-Requested-With, token',
       // 'Access-Control-Allow-Credentials' => 'true',
        
    ];

    if ($request->isMethod("OPTIONS")) {
        // The client-side application can set only headers allowed in Access-Control-Allow-Headers
        return Response::make('OK', 200, $headers);
    }
    //$request->headers->set('Accept', 'application/json');
    $response = $next($request);

    foreach ($headers as $key => $value) {
        $response->header($key, $value);
    }
     return $response;  

    }
}
