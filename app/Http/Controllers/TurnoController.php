<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TurnodetalleModel;// as turna;// as equip; cant be BOYH...
use DB;


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

    public function indexfecha($puesto,$horario,$fecha)
    {
        //
    $article = TurnodetalleModel::where('fecha','>=',$fecha)
    ->where('horario','=',$horario)
    ->where('puesto','=',$puesto)->get();

        return   $article; 
    }


    
     public function indexfecharea($puesto,$horario,$area,$fecha)
    {
        //
    $article = TurnodetalleModel::where('area','=',$area)
    ->where('horario','=',$horario)
    ->where('puesto','=',$puesto)
    ->where('fecha','>=',$fecha)->get();

        return   $article; 
    }
    

    public function indexfechahorario($fecha,$horario)
    {

            
       // $results = TurnodetalleModel::where('fecha','=',$fecha)
       // ->where('horario','=',$horario)->get();
            

        //$results2 = $results::where('puesto','=',1)->get();



        //$fecha = STR_TO_DATE($fecha, "%Y,%m,%d ");
            // between '2018-01-01
            //$fecha = strtotime($fecha);
            //$fecha =date('d/m/Y', $fecha);

            //$fecha = DateTime::createFromFormat('m/d/Y H:i:s', $fecha.' 00:00:00');
           // $myfecha = $fecha->format('Y-m-d H:i:s');

        //$myfecha = "'" + (string)$fecha + "'";   //FAIL
        $myfecha = "'";
         $myfecha .= (string)$fecha;
         $myfecha .= "'";
       // $results = $myfecha;

    
        
       $results = DB::select(                           // fecha  CAUSA ERRRORRRRRRRRR sin comilla  ' ' ' simple ! ! ! ! ' ' ' '
           // "SELECT * FROM turnodetalles WHERE fecha >= $myfecha AND horario = $horario  AND idempleado IN (SELECT idempleado FROM turnodetalles GROUP BY idempleado) ORDER BY idempleado"
         
         //works...
          // "SELECT * FROM turnodetalles WHERE (idempleado,fecha)  IN (SELECT idempleado,MAX(fecha) FROM turnodetalles GROUP BY idempleado) AND fecha >=$myfecha ORDER BY idempleado"// STR_TO_DATE($fecha,'%m/%d/%Y') "//(STR_TO_DATE($fecha, '%Y,%m,%d '))    "   //   && horario = $horario"     horario = $horario AND 
      

         //INNER JOIN 
          //works on turno specific,, but.. turno depende de empleado so....
         // "SELECT * FROM turnodetalles WHERE (puesto,fecha)  IN (SELECT puesto,MAX(fecha) FROM turnodetalles GROUP BY puesto) ORDER BY puesto"


         // "SELECT * FROM turnodetalles WHERE (idempleado,fecha)  IN (SELECT idempleado,MAX(fecha) FROM turnodetalles GROUP BY idempleado)  ORDER BY idempleado"
         
                //PORQUW NO se limita a un idempleado! ! ? ?    //misterio resuelto, si tienen la misma fecha,(updatedat) aparecen repetidos"
            //"SELECT idempleado FROM audioexes WHERE (idempleado,updated_at)  IN ( SELECT idempleado,MAX(updated_at) FROM audioexes GROUP BY idempleado)"// ORDER BY idempleado"




           // "SELECT id, nombre as NombreEmpleado FROM audioexes WHERE idempleado IN (SELECT id FROM empleados WHERE area = 2) AND i2000 >30 AND d2000>30"   //WORKS!
            


          //"SELECT e.nombre,t.fecha,m.nombre as nombremaquina, m.ruido FROM turnodetalles as t INNER JOIN empleados  as e ON e.id = t.idempleado  INNER JOIN equips  as m ON t.idmaquina  =  m.id WHERE m.ruido >4 AND t.fecha > '2021-02-21'"

          //optimzar? agarra todas las tablas y luego revisa o primera checa condiciones y las junta....
          //"SELECT e.id, e.nombre,t.fecha,m.nombre as nombremaquina, m.ruido FROM turnodetalles as t INNER JOIN  empleados  as e ON e.id = t.idempleado  INNER JOIN equips  as m ON t.idmaquina  =  m.id INNER JOIN audioexes as a ON a.idempleado = e.id WHERE m.ruido >4 AND t.fecha >= '2021-02-11' AND  i2000 >20 AND d2000>20 "         //(SELECT audioexes.idempleado IN audioexes WHERE i2000 >10 AND d2000>10)


         //no funciono para mostrar todo el registro mas alto
       // "SELECT * FROM audioexes WHERE (d2000,i2000) IN (SELECT MAX(d2000),MAX(i2000) FROM audioexes GROUP BY i2000)"

            //not so good eiter
        //"SELECT MAX(i2000) FROM audioexes WHERE i2000 < (SELECT MAX(i2000) FROM audioexes) GROUP BY idempleado"  //Group BY shows every regfistro?

            //2 max valoreas de tabla, no funcional...
        // "SELECT  nombre,max(i2000) FROM audioexes GROUP BY id ORDER By i2000 Desc Limit 2"

            //wORKS, para obtener el mas alta de cada emp?
        "SELECT id,idempleado,nombre,d2000 FROM audioexes WHERE (idempleado,d2000) IN (SELECT idempleado,MAX(d2000) FROM audioexes GROUP BY idempleado)"
        //obtiene solo el mayor
       // "SELECT id,idempleado,nombre,d2000 FROM audioexes WHERE d2000 IN (SELECT MAX(d2000) FROM audioexes)"





        );


return $results;
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
