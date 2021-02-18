<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EquipoModel as equip;

use App\Http\Requests;                                  //very important for post??

use App\Http\Controllers\Controller; 

//use Illuminate\Support\Facades\Auth;  

class Maquinacontroller extends Controller
{
    //

    public function index()
    {
        //
        $emples = equip::all(); //paginate(25);  //::all()
       
       
        return response()->json([
            'status' => 'success',
            'mensaje' => 'Lista recuperada con èxito',
            'data' => $emples           //checar en angular, antes era dat....
        ]);
        return $emples;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $empleadonuevo = equip::create($request->all());
        
        return response()->json([
            'status' => 'success',
            'mensaje' => 'Maquina añadida con éxito',
            'data' => $empleadonuevo
        ]);
        //return $empleadonuevo;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\equip  $equip
     * @return \Illuminate\Http\Response
     */
    public function show($id) //equip $equip)//this was defaulted?
    {
        //
        $article = equip::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'mensaje' => 'Registro recuperado con éxito',
            'data' => $article
        ]); //return   $article;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\equip  $equip
     * @return \Illuminate\Http\Response
     */
    public function edit(equip $equip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\equip  $equip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)        //ws $equip, but...
    {
        //
        $empleadonuevo = equip::where('id','=',$id)->first();

        $input = $request->all();
   $empleadonuevo->fill($input)->save();

   return response()->json([
    'status' => 'success',
    'mensaje' => 'Maquina actualizada con éxito',
    'data' => $empleadonuevo
]);
        //  return $empleadonuevo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\equip  $equip
     * @return \Illuminate\Http\Response
     */
    public function destroy(equip $equip)
    {
        //
    }
}
