<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller; 



use App\Http\Requests;      //???
use App\Models\EmpleadoModel;
//use App\Models\User;          //moved to middleware
use Illuminate\Support\Facades\Auth;  


use Illuminate\Support\Facades\Mail;

use DB;

use App\Models\examenperiodo as ex;



//use Tymon\JWTAuth\Facades\JWTAuth;

class EmpleadoController extends Controller
{
    //

    public function mail($id) //Request $request
    {
       
      $Emp= EmpleadoModel::findOrFail($id);

        $Nombre = $Emp['nombre'];
       // $mailto = EmpleadoModel::select('email')->findOrFail($id);//where('id','=',$id)->findOrFail($id);//->pluck('email');
        $mailto =$Emp['email'];
        
      
        
        
        $Mensaje= "Estimado ".$Nombre."<br>". "Le recordamos que su proximo examen médico es el día: 0505-2020";


        //return $Mensaje;
        /*
        foreach (['taylor@example.com', 'dries@example.com'] as $recipient) {
          Mail::to($recipient)->send(new OrderShipped($order));
      }*/

/*
        Mail::raw($Mensaje,function($message) use($mailto){
          $message ->from('dancingappsdays@gmail.com'," Autonotificaciones SELMEDICA");
          $message ->to($mailto)->subject('NRecordatorio fecha examen medico');
         });

         return response()->json([
          'status' => 'success',
          'mensaje' => 'Email enviado con éxito',
          //'data' => $emples
      ]);*/

    }

    public function mailproximoexamen()
    {


      $results =  DB::select("SELECT * FROM empleados 
      INNER JOIN  (SELECT * FROM examenperiodos as ex  WHERE  (ex.idempleado,ex.created_at)  IN 
      ( SELECT idempleado,MAX(created_at) FROM examenperiodos    GROUP BY idempleado) )
    as exp  ON exp.idempleado = empleados.id  WHERE realizado <>1 ORDER BY empleados.id
    "
    );
   // return $results;//['nombre']; 

   // $recipients= json_encode($results);

    //$numa = $recipients.length;
    //return $recipients[5];
    //return $numa;
   // return$recipients;


/*
   $keys = Object.keys($results);

   for ($i = 0; $i < $keys.length; $i++) {
     $key = $keys[$i];
    //console.log(key, yourObject[key]);

    echo $key."  ".$results[$key];
  }
*/
  //$arra[] = $results;
 // return $results

  //echo count($results);
  for($i=0;$i<count($results);$i++)
  {
    // $reg = json_encode($results[$i]);  //funciona pero luego que?
   // $data = json_decode($results[$i],true);   //no funciona

     
    $mailto =  $results[$i]->email;              // WINNER
    $Mensaje= "Estimado ". $results[$i]->nombre."<br>". "Le recordamos que su proximo examen médico es el día:". $results[$i]->fecha;// 0505-2020";

    Mail::raw($Mensaje,function($message) use($mailto){
      $message ->from('dancingappsdays@gmail.com'," Autonotificaciones SELMEDICA");
      $message ->to($mailto)->subject('NRecordatorio fecha examen medico');
     });
  }
  return response()->json([
    'status' => 'success',
    'mensaje' => 'Email enviado con éxito',
    //'data' => $emples
]);
      

    }




    
    /*
    public function mail(Request $request, $id)
    {
        $user = User::findOrFail($id);

        Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');

            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });
    }
}*/


    public function index(Request $request)
    {
        //      //but didnt auth....
        //if(Auth::check()){                //enviado a middleware oekn

          //  $headertoken = $request->header('Authorization');
          //  $token = null;

            //$token =base64_decode($headertoken);  //CRASHHHH
         //   $token = substr($headertoken,13);   //included dobule beraerer

            //if(substr($headertoken, 0, 7) === "Bearer "){

              //  $token = substr($headertoken,7);//uniqid(base64_decode(substr($headertoken,7));            //NO MUESTRA EL MISMO TOKEEEN!
           // }                            //crashed?

                                    //user default pero mejor haz uno nuevo

                
       // $api = User::where('apitoken', '=', $token)->first();


                    //AUth solo funciona con los campos predeterminados.... mejor usa JWT
                                    //was remembertoken, pero ese campo es interno de lara
           //if(Auth::attempt(['apitoken' => $token]))    //still buggn
           if(true) //isset($api))// !==null)
           {
               /*
            return response()->json([
                'status' => 'error',
                'data' => $token,
              ]);  //debuggger*/
            /*
            if($token === null) return response()->json([
                'status' => 'error',
                'data' => 'Token empty before EMpleado List'
              ]);  //abort(401);//403 controller should only after vallidation...
            */


           // Log::debug($request->bearerToken());
           //return $header;//"something";

        $emples = EmpleadoModel::all();// ->exclude('profilepic'); //paginate(25);  //::all()
             $emples -> makeHidden('profilepic'); //prevent Fat data with no purpose...
            

             
        return response()->json([
            'status' => 'success',
            'mensaje' => 'Lista recuperada con èxito',
            'data' => $emples
        ]);
        //return $emples;// (json_encode($header));//$emples;
        
    
    
        }else { 
            return response()->json([
              'status' => 'error',
              'mensaje' => 'Unauthorized Access en Empleados list',
              'data' => 'errordata'
            ]); 
          }
       // return EmpleadoResource::collection($emples);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //devuelve vista de formulario para crear, restapi use STORE
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
        $empleadonuevo = EmpleadoModel::create($request->all());
        
        return response()->json([
          'status' => 'success',
          'mensaje' => 'Empleado añadido con èxito',
          'data' => $empleadonuevo
      ]);
        //return $empleadonuevo;

        //modify tooo
      //  $emp = $request -> isMethod('put')? Empleado::findOrFail
       // (request->empleado_id) : new Empleado;
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
        $article = EmpleadoModel::findOrFail($id);

        return   $article; //return new empleadoresource(article) missing
    }


    public function showx($id) //for individual resource
    {
        //          //model
        $results = DB::select(
          
          //El ultimo examen de empleado especifico...
         // "SELECT id,idempleado,nombre,edad,imcsignos,apto, created_at FROM examenmes WHERE  (idempleado,updated_at)  IN ( SELECT idempleado,MAX(updated_at) FROM examenmes  GROUP BY idempleado) ORDER BY idempleado"
        
          
              //WORKING FOR AUSDIOEX                                                                                                  //IMPORTANT: NOT a.idempleado, this another query!" ! ! !
        //  "SELECT a.id,a.idempleado,a.i2000,a.d2000,a.created_at FROM audioexes as a WHERE (a.idempleado,a.created_at) IN (SELECT idempleado,MAX(created_at) FROM audioexes GROUP BY idempleado) ORDER BY a.idempleado"



/*
         "SELECT e.id,e.idempleado,e.nombre,e.edad,e.imcsignos,e.apto FROM examenmes as e 
                  
         INNER JOIN  audioexes 
         
         
         as au ON e.idempleado = au.idempleado 
         
         WHERE  (e.idempleado,e.updated_at)  IN ( SELECT idempleado,MAX(updated_at) FROM examenmes  WHEREidempleado = $id GROUP BY idempleado)  "

*/

          // GOLD GOLD  //WHAT IS FAULTEDDD
          
          "SELECT e.id as exid,e.created_at,e.idempleado,e.nombre,e.edad,e.imcsignos,e.apto,au.i2000, au.d2000,au.id as AUID, emp.puesto, emp.nombre, emp.profilepic,emp.id FROM empleados as emp
        
          LEFT JOIN  (SELECT a.id,a.idempleado,a.i2000,a.d2000,a.created_at FROM audioexes as a WHERE (a.idempleado,a.created_at) IN (SELECT idempleado,MAX(created_at) FROM audioexes  WHERE idempleado = $id GROUP BY idempleado) LIMIT 1)
          
          as au ON emp.id = au.idempleado 
          
          LEFT JOIN  (SELECT e.id,e.idempleado,e.nombre,e.imcsignos,e.edad,e.apto,e.created_at FROM examenmes as e  WHERE  (e.idempleado,e.created_at)  IN ( SELECT idempleado,MAX(created_at) FROM examenmes  WHERE idempleado = $id GROUP BY idempleado)  LIMIT 1 )

          as e  ON e.idempleado = emp.id WHERE  emp.id = $id"
          
          //WHERE  (e.idempleado,e.updated_at)  IN ( SELECT idempleado,MAX(updated_at) FROM examenmes  WHERE idempleado = $id GROUP BY idempleado)  "
          

//THIS WOKSS!!! pero si el primer left join esta vacío todo esta vacío....
          /*
"SELECT e.id as exid,e.idempleado,e.nombre,e.edad,e.imcsignos,e.apto,au.i2000, au.d2000,au.id as AUID, emp.puesto, emp.profilepic, emp.nombre FROM examenmes as e 
        
LEFT JOIN  (SELECT a.id,a.idempleado,a.i2000,a.d2000,a.created_at FROM audioexes as a WHERE (a.idempleado,a.created_at) IN (SELECT idempleado,MAX(created_at) FROM audioexes  GROUP BY idempleado))

as au ON e.idempleado = au.idempleado 

LEFT JOIN empleados as emp ON e.idempleado = emp.id

WHERE  (e.idempleado,e.updated_at)  IN ( SELECT idempleado,MAX(updated_at) FROM examenmes  WHERE idempleado = $id GROUP BY idempleado)  "
*/










     //WHERE(a.idempleado,a.created_at)  IN ( SELECT a.idempleado,MAX(updated_at) FROM audioexes WHERE a.idempleado = $id GROUP BY a.idempleado)
         // INNER JOIN audioexes as a ON e.idempleado = a.idempleado 
        
        
      

         //"SELECT * FROM audioexes WHERE (idempleado,created_at) IN (SELECT idempleado,MAX(created_at)  GROUP BY idempleado)"
        
         // "SELECT  examenmes.idempleado,  examenmes.nombre,  examenmes.imcsignos FROM examenmes  INNER JOIN ( SELECT idempleado, i2000,d2000, MAX(created_at) FROM audioexes GROUP BY audioexes.idempleado) WHERE  ( examenmes.idempleado, examenmes.updated_at)  IN ( SELECT  examenmes.idempleado,MAX( examenmes.updated_at) FROM examenmes GROUP BY  examenmes.idempleado) HAVING    examenmes.idempleado = $id"
        
        
        
        );
      

      
       return $results;// +  $results2;

       
    }

    
    public function showax($id) //for individual resource
    {
        //          //model
        $results = DB::select(
          
          //El ultimo examen audio de empleado especifico...
          "SELECT idempleado,nombre,fecha,i2000,d2000 FROM audioexes WHERE  (idempleado,updated_at)  IN ( SELECT idempleado,MAX(updated_at) FROM audioexes GROUP BY idempleado) HAVING  idempleado = $id LIMIT 1" //wasnt correct, more like where in subquery

        );

        return $results;
      }
        



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)  //used store for update....
    {
       //$request::instance()->id
           // $idd->id;
           /*
                                        //this fucka always failed? 
        $empleadonuevo = Empleado::findOrFail($id)->update([
            'nombre' => $request->get('nombre'),
            'puesto'=> $request->get('puesto')
        ]
            
        );
       */
      $empleadonuevo = EmpleadoModel::where('id','=',$id)->first();
      
         $input = $request->all();
    $empleadonuevo->fill($input)->save();

        //return $empleadonuevo;
        return response()->json([
          'status' => 'success',
          'mensaje' => 'Maquina añadida con éxito',
          'data' => $empleadonuevo
      ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
