<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller; 



use App\Http\Requests;      //???
use App\Models\incidentes as acci;

class IncidentesController extends Controller
{
    public function store(Request $request)
    {
        //
        $incidentenuevo = acci::create($request->all());
        
        return response()->json([
          'status' => 'success',
          'mensaje' => 'Incidente añadido con èxito',
          'data' =>  $incidentenuevo 
      ]);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showall($id) //for individual resource
    {
        //          //model
        $article = acci::where('idempleado','=',$id)->get();

        return response()->json([
            'status' => 'success',
            'mensaje' => 'Lista de incidentes de empleado obtenido con éxito',
            'data' => $article
        ]);
        //return   $article; //return new empleadoresource(article) missing
    }


    public function show($id) //for individual resource
    {
        //          //model
       // $article = ex::findOrFail($id);
       $acc = acci::where('id','=',$id)->first();

       if ($acc === null) {

        // ecp doesn't exist
        return response()->json([
            'status' => 'success',
            'mensaje' => 'Incidente no encontrado',
            'data' => $acc
        ]);

     }
        return response()->json([
            'status' => 'success',
            'mensaje' => 'Incidente obtenido con éxito',
            'data' => $acc
        ]);
        //return   $article; //return new empleadoresource(article) missing
    }
}
