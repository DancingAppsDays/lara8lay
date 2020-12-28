<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reportemedico as reportem;

class ReportemedicoController extends Controller
{
    //
    public function index()
    {
        //
        $emples = reportem::all(); //paginate(25);  //::all()
       
       
        return response()->json([
            'status' => 'success',
            'data' => 'Lista de reportes recuperada con èxito',
            'dat' => $emples
        ]);
       // return $emples;
    }


    public function show($id) //for individual resource
    {
        //          //model
       // $article = reportem::findOrFail($id);
        $article = reportem::where('idempleado','=',$id)->get();
        return   $article; //return new empleadoresource(article) missing
    }

    public function showsingle($id) //for individual resource
    {
        //          //model
       // $article = reportem::findOrFail($id);
        $article = reportem::where('id','=',$id)->get();
        return   $article; //return new empleadoresource(article) missing
    }

    
}
