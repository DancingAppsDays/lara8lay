<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 



use App\Http\Requests;      //???
use App\Models\Examenme as ex;

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
   $results = DB::select("SELECT * FROM examenmes WHERE (idempleado,updated_at)  IN ( SELECT idempleado,MAX(updated_at) FROM examenmes GROUP BY idempleado) ORDER BY idempleado");

       //$emples = TurnodetalleModel::all(); //paginate(25);  //::all()
       return $results;

      // return EmpleadoResource::collection($emples);
      //$empleadonuevo = equip::where('id','=',$id)->first();
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

        return response()->json([
            'status' => 'success',
            'mensaje' => 'Examen obtenido con èxito',
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
