<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TurnodetalleModel;// as turna;// as equip; cant be BOYH...

class TurnoController extends Controller
{

    public function indexpuesto($puesto,$horario)
    {
        //
    $article = TurnodetalleModel::where('puesto','=',$puesto)
    ->where('horario','=',$horario)->get();

        return   $article; 
    }
    
     public function indexarea($puesto,$horario,$area)
    {
        //
    $article = TurnodetalleModel::where('area','=',$area)
    ->where('horario','=',$horario)
    ->where('puesto','=',$puesto)->get();

        return   $article; 
    }
    
     public function indexfecha($puesto,$horario,$area,$fecha)
    {
        //
    $article = TurnodetalleModel::where('area','=',$area)
    ->where('horario','=',$horario)
    ->where('puesto','=',$puesto)
    ->where('fecha','>=',$fecha)->get();

        return   $article; 
    }
    
    
    
      public function indexa()
    {
        //
    $results = DB::select("SELECT * FROM turnodetalles WHERE (idempleado,fecha)  IN ( SELECT idempleado,MAX(fecha) FROM turnodetalles GROUP BY idempleado) ORDER BY idempleado");

        //$emples = TurnodetalleModel::all(); //paginate(25);  //::all()
        return $results;

       // return EmpleadoResource::collection($emples);
       //$empleadonuevo = equip::where('id','=',$id)->first();
    }
    


    //
    public function index()
    {
        //

        $emples = TurnodetalleModel::all(); //paginate(25);  //::all()
        return response()->json([
            'status' => 'success',
            'mensaje' => 'TUrnos recuperado con éxito',
            'data' => $emples
        ]);

       // return EmpleadoResource::collection($emples);
       //$empleadonuevo = equip::where('id','=',$id)->first();
    }
    public function show($id) //for individual resource
    {
        //          //model
        $article = TurnodetalleModel::where('idempleado','=',$id)->get();

        return response()->json([
            'status' => 'success',
            'mensaje' => 'TURNO recuperado con éxito',
            'data' => $article
        ]); //return new empleadoresource(article) missing
    }

    public function show1($id) //for individual resource
    {
        //          //model
        $article = TurnodetalleModel::where('id','=',$id)->first();   //mejor findor fail     //was get(), pero da como resultado un array al que hay que acceder con data['data'][0]

        return response()->json([
            'status' => 'success',
            'mensaje' => 'TURNO recuperado con éxito',
            'data' => $article
        ]);
    }


    public function store(Request $request)
    {
        //
        $turn = TurnodetalleModel::create($request->all());
        
        return response()->json([
          'status' => 'success',
          'mensaje' => 'Turno registrado con èxito',
          'data' => $turn
      ]);
        //return $empleadonuevo;

        //modify tooo
      //  $emp = $request -> isMethod('put')? Empleado::findOrFail
       // (request->empleado_id) : new Empleado;
    }

    public function update(Request $request,$id)        //ws $equip, but...
    {
        //
        $empleadonuevo = TurnodetalleModel::where('id','=',$id)->first();

        $input = $request->all();
   $empleadonuevo->fill($input)->save();

   return response()->json([
    'status' => 'success',
    'mensaje' => 'Turno actualizado con éxito',
    'data' => $empleadonuevo
]);
        //  return $empleadonuevo;
    }

}
