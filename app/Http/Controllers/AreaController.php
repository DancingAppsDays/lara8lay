<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\area as puesto;

class AreaController extends Controller
{
    public function index()
    {
        //

        $emples = puesto::all(); //paginate(25);  //::all()
        return response()->json([
            'status' => 'success',
            'mensaje' => 'Lista areas recuperada con èxito',
            'data' => $emples
        ]);
       // return EmpleadoResource::collection($emples);
       //$empleadonuevo = equip::where('id','=',$id)->first();
    }
    public function show($id) //for individual resource
    {
        //          //model
        $article = puesto::where('id','=',$id)->first();   //mejor findor fail     //was get(), pero da como resultado un array al que hay que acceder con data['data'][0]

        return response()->json([
            'status' => 'success',
            'mensaje' => 'Area recuperado con éxito',
            'data' => $article
        ]);
    }

    public function store(Request $request)
    {
        //
        $turn = puesto::create($request->all());
        
        return response()->json([
          'status' => 'success',
          'mensaje' => 'Area registrado con éxito',
          'data' => $turn
      ]);
        }

        public function update(Request $request,$id)        //ws $equip, but...
        {
            //
            $empleadonuevo = puesto::where('id','=',$id)->first();
    
            $input = $request->all();
       $empleadonuevo->fill($input)->save();
    
       return response()->json([
        'status' => 'success',
        'mensaje' => 'Area actualizado con éxito',
        'data' => $empleadonuevo
    ]);
            //  return $empleadonuevo;
        }

}
