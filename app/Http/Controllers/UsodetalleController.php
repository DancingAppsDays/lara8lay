<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usodetalle as uso;


class UsodetalleController extends Controller
{
    //

    public function index()
    {
        //

        $emples = uso::all(); //paginate(25);  //::all()
        return $emples;

       // return EmpleadoResource::collection($emples);
       //$empleadonuevo = equip::where('id','=',$id)->first();
    }
    public function show($id) //for individual resource
    {
        //          //model
        $article = uso::where('idempleado','=',$id)->get();

        return   $article; //return new empleadoresource(article) missing
    }

    public function store(Request $request)
    {
        //
        $turn = uso::create($request->all());
        
        return response()->json([
          'status' => 'success',
          'mensaje' => 'Turno uso detalle registrado con éxito',
          'data' => $turn
      ]);
        }
}
