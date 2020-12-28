<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TurnodetalleModel;// as equip;

class TurnoController extends Controller
{
    //
    public function index()
    {
        //

        $emples = TurnodetalleModel::all(); //paginate(25);  //::all()
        return $emples;

       // return EmpleadoResource::collection($emples);
       //$empleadonuevo = equip::where('id','=',$id)->first();
    }
    public function show($id) //for individual resource
    {
        //          //model
        $article = TurnodetalleModel::where('idempleado','=',$id)->get();

        return   $article; //return new empleadoresource(article) missing
    }
}
