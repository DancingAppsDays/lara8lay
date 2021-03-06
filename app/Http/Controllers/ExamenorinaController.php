<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\examenorina as ex;

class ExamenorinaController extends Controller
{
    public function store(Request $request)
    {
        //
        $ex = ex::create($request->all());
        
        return response()->json([
          'status' => 'success',
          'mensaje' => 'Laboratorio Orina añadido con èxito',
          'data' => $ex
          ]);
      
    }

    public function show($id) //for individual resource
    {
        //          //model
        $article =ex::findOrFail($id);


        return response()->json([
            'status' => 'success',
            'mensaje' => 'Laboratorio Orina recuperada con éxito',
            'data' => $article
        ]);
        //return   $article;
    }

    public function showperiod($id) //for  periodo anual 
    {
        //          //model
        $article = ex::where('idperiodo','=',$id)->first();



        return response()->json([
            'status' => 'success',
            'mensaje' => 'Laboratorio Orina recuperada con éxito',
            'data' => $article
        ]);
        //return   $article;
    }



    public function showall($id) //for individual resource
    {
        //          //model
        $article = ex::where('idempleado','=',$id)->get();

        return response()->json([
            'status' => 'success',
            'mensaje' => 'Examenes Laboratorio Orina obtenido con èxito',
            'data' => $article
        ]);
        //return   $article; //return new empleadoresource(article) missing
    }

    public function update(Request $request, $id)  //used store for update....
    {
       
      $exa = ex::where('id','=',$id)->first();
      
      $input = $request->all();
    $exa->fill($input)->save();
        
   //($request->all());
   return response()->json([
    'status' => 'success',
    'mensaje' => 'Examen actualizado con èxito',
    'data' => $exa
]);
    }



}
