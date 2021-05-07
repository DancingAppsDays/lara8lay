<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\examenperiodo as ex;

use DB;

class ExamenperiodoController extends Controller
{


     public function indexa()
   {
     /*  
   $results = DB::select("
   SELECT * FROM examenperiodos WHERE (idempleado,updated_at)  IN ( SELECT idempleado,MAX(updated_at) FROM examenperiodos GROUP BY idempleado) ORDER BY idempleado"

);*/

//incluye para cada empleado... su último experiod

//LEFT JOIN esta vez arrojaba datos null, y limit2 solo arrojaba muy pocos...

$results =  DB::select("SELECT * FROM empleados 
  INNER JOIN  (SELECT * FROM examenperiodos as ex  WHERE  (ex.idempleado,ex.created_at)  IN 
  ( SELECT idempleado,MAX(created_at) FROM examenperiodos  GROUP BY idempleado))
as exp  ON exp.idempleado = empleados.id"
);

  
      
      
       return $results;

     
   }








    public function store(Request $request)
   {
       //
       $exa = ex::create($request->all());
       
       return response()->json([
         'status' => 'success',
         'mensaje' => 'Examen periodico añadido con èxito',
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

   


   public function showall($id) //for individual resource
    {
        //          //model
        $article = ex::where('idempleado','=',$id)->get();
       // $article2 = ex2::where('idempleado','=',$id)->get();

       // $articles3 = $article->merge($article2);

        return response()->json([
            'status' => 'success',
            'mensaje' => 'Examen obtenido con èxito',
            'data' => $article
        ]);
        //return   $article; //return new empleadoresource(article) missing
    }


    public function showallagg($id) //for individual resource in agg NEW
    {
        //          //model
        $article = ex::where('idempleado','=',$id)->get();
        $article2 = ex2::where('idempleado','=',$id)->get();

        $articles3 = $article->merge($article2);

        return  $articles3;
        
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
