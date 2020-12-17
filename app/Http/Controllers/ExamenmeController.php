<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 



use App\Http\Requests;      //???
use App\Models\Examenme as ex;

class ExamenmeController extends Controller
{
   //
   public function store(Request $request)
   {
       //
       $exa = ex::create($request->all());
       
       return response()->json([
         'status' => 'success',
         'mensaje' => 'Expediente añadido con èxito',
         'data' => $exa
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
       $article = ex::findOrFail($id);

       return response()->json([
           'status' => 'success',
           'mensaje' => 'Examen obtenido con èxito',
           'data' => $article
       ]);
       //return   $article; //return new empleadoresource(article) missing
   }
}
