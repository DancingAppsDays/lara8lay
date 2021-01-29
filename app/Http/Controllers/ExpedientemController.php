<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller; 



use App\Http\Requests;      //???
use App\Models\expedientem as ex;



class ExpedientemController extends Controller
{
    //
    public function store(Request $request)
    {
        //
        $expedientenuevo = ex::create($request->all());
        
        return response()->json([
          'status' => 'success',
          'mensaje' => 'Expediente añadido con èxito',
          'data' => $expedientenuevo
      ]);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //for individual resource
    {
        //          //model
       // $article = ex::findOrFail($id);
       $exp = ex::where('idempleado','=',$id)->first();

       if ($exp === null) {
        // ecp doesn't exist
        return response()->json([
            'status' => 'success',
            'mensaje' => 'Expediente no encontrado',
            'data' => $exp
        ]);

     }
        return response()->json([
            'status' => 'success',
            'mensaje' => 'Expediente obtenido con èxito',
            'data' => $exp
        ]);
        //return   $article; //return new empleadoresource(article) missing
    }
}
