<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 



use App\Http\Requests;      //???
use App\Models\Examenme as ex;

use App\Models\Audioex as ex2;

use DB; //olschool query

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

   public function indexa()
   {
       //
   //$results = DB::select("SELECT * FROM examenmes WHERE (idempleado,updated_at)  IN ( SELECT idempleado,MAX(updated_at) FROM examenmes GROUP BY idempleado) ORDER BY idempleado");

      
   $results = DB::select("SELECT e.id,e.idempleado,e.nombre,e.edad,e.area, e.imcsignos,e.apto,e.created_at, au.i2000, au.d2000  FROM examenmes as e 
                  
   LEFT JOIN  (SELECT a.id,a.idempleado,a.i2000,a.d2000,a.created_at FROM audioexes as a 
   WHERE (a.idempleado,a.fecha) IN (SELECT idempleado,MAX(fecha) FROM audioexes GROUP BY idempleado ) )
    
      as au ON e.idempleado = au.idempleado
   
   WHERE  (e.idempleado,e.updated_at)  IN ( SELECT idempleado,MAX(updated_at) FROM examenmes GROUP BY idempleado)   "
   );
      
      
      
       return $results;

     
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
