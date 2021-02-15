<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller; 



use App\Http\Requests;      //???
use App\Models\EmpleadoModel;
//use App\Models\User;          //moved to middleware
use Illuminate\Support\Facades\Auth;  


//use Tymon\JWTAuth\Facades\JWTAuth;

class EmpleadoController extends Controller
{
    //

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

        $emples = EmpleadoModel::all(); //paginate(25);  //::all()

            
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
