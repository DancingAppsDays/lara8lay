<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\puesto;

use DB;

class PuestoController extends Controller
{
    public function index()
    {
        //

        $emples = puesto::all(); //paginate(25);  //::all()
        return response()->json([
            'status' => 'success',
            'mensaje' => 'Lista recuperada con èxito',
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
            'mensaje' => 'Puesto recuperado con éxito',
            'data' => $article
        ]);
    }


    //public function consultalastfecha($puesto)


    public function consulta($puesto,$horario,$fecha) //NUMERO ESPECIFICO
    {
        //          //model

        $results = DB::select(
            
            //arroja el maximo para cada id.......
           // "SELECT * FROM turnodetalles WHERE (idempleado,fecha)  IN ( SELECT idempleado,MAX(fecha) FROM turnodetalles  WHERE puesto = $puesto GROUP BY idempleado) ORDER BY idempleado  "

                
                "SELECT *          from turnodetalles LEFT JOIN empleados ON turnodetalles.idempleado = empleados.id   LEFT JOIN audioexes ON turnodetalles.idempleado = audioexes.idempleado  
                     where turnodetalles.fecha = 
                (select max(fecha) from turnodetalles) 
                  AND turnodetalles.puesto=$puesto AND horario=$horario"// LIMIT 1"


                /* //FUNCIONA PARA OBTENER UNA ID DEL ultimo turno
          "SELECT idempleado           from turnodetalles           where fecha = 
               (select max(fecha) from turnodetalles) 
                 AND puesto=$puesto AND horario=$horario LIMIT 1"*/
        );





        //$emples = TurnodetalleModel::all(); //paginate(25);  //::all()
        return $results;



        $article = puesto::where('fecha','>=',$fecha)
        ->where('horario','=',$horario)
        ->where('puesto','=',$puesto)->get();   //mejor findor fail     //was get(), pero da como resultado un array al que hay que acceder con data['data'][0]

        return response()->json([
            'status' => 'success',
            'mensaje' => 'Puesto recuperado con éxito',
            'data' => $article
        ]);
    }

    public function store(Request $request)
    {
        //
        $turn = puesto::create($request->all());
        
        return response()->json([
          'status' => 'success',
          'mensaje' => 'Puesto registrado con éxito',
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
        'mensaje' => 'Puesto actualizado con éxito',
        'data' => $empleadonuevo
    ]);
            //  return $empleadonuevo;
        }


}


