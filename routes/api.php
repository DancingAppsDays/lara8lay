<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\tokenmiddle;
use App\Http\Middleware\prefight;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

        //ORIGINAL LAV(8)       //get

        /*
Route::middleware('auth:api')->post('/user', function (Request $request) {
    return $request->user();
});
*/
//LEGADO del laralyaout....

Route::get('/clear-cache', function() {
    
  $exitCode = Artisan::call('config:cache');
  $exitCode = Artisan::call('route:clear');
  return 'DONE'; //Return anything
});
Route::get('/clear-cache2', function() {
  
  $exitCode = Artisan::call('route:clear');
  return 'DONE2'; //Return anything
});


Route::get('Empleadonot/{id}','EmpleadoController@mail');

Route::get('Experiod1/{id}','ExamenperiodoController@show');
Route::get('Experiod/{id}','ExamenperiodoController@showall');
Route::get('Experiod','ExamenperiodoController@indexa');  //último de todos los emps
Route::post('Experiod','ExamenperiodoController@store');//->middleware(tokenmiddle::class);
Route::post('Experiod/{id}','ExamenperiodoController@update');


Route::get('Audios1/{id}','AudioexController@show');
Route::get('Audioperiod/{id}','AudioexController@showperiod');    //nueva plataforma period
Route::get('Audios/{id}','AudioexController@showall');

Route::post('Audios','AudioexController@store');//->middleware(tokenmiddle::class);
Route::post('Audios/{id}','AudioexController@update');






Route::get('Examenmesx','ExamenmeController@indexa');   //for aggconsulta, estados de salud, cambiara para añadir daño audiometria


Route::get('Examenmes/{id}','ExamenmeController@showall');
Route::get('Examenmesagg/{id}','ExamenmeController@showallagg');

Route::get('Examenme/{id}','ExamenmeController@show');//->middleware(tokenmiddle::class);//> middleware('cors'); 
Route::get('Examenmeperiod/{id}','ExamenmeController@showperiod');

Route::post('Examenme','ExamenmeController@store');//->middleware(tokenmiddle::class);
Route::post('Examenme/{id}','ExamenmeController@update');



Route::get('Expediente/{id}','ExpedientemController@show');//->middleware(tokenmiddle::class);//> middleware('cors'); 
Route::post('Expediente','ExpedientemController@store');//->middleware(tokenmiddle::class);
Route::post('Expediente/{id}','ExpedientemController@update');

Route::get('Accidentes/{id}','IncidentesController@showall');

Route::get('Accidente/{id}','IncidentesController@show');//->middleware(tokenmiddle::class);//> middleware('cors'); 
Route::post('Accidente','IncidentesController@store');

Route::get('Usodetalle','UsodetalleController@index');//->middleware(tokenmiddle::class);//-> middleware('cors');
Route::get('Usodetalle/{id}','UsodetalleController@show');//->middleware(tokenmiddle::class);//-> middleware('cors');//REceives 1 id
Route::post('Usodetalle','UsodetalleController@store');

Route::get('Puesto','PuestoController@index');//->middleware(tokenmiddle::class);
Route::get('Puesto/{id}','PuestoController@show');//->middleware(tokenmiddle::class);
Route::post('Puesto','PuestoController@store');
Route::post('Puesto/{id}','PuestoController@update');



Route::get('Puestocon/{puesto}/{horario}/{fecha}','PuestoController@consulta');     //nueva consulta multi
Route::get('Empleadox/{id}','EmpleadoController@showx');
Route::get('Empleadoax/{id}','EmpleadoController@showax');




Route::get('Area','AreaController@index');//->middleware(tokenmiddle::class);
Route::get('Area/{id}','AreaController@show');//->middleware(tokenmiddle::class);
Route::post('Area','AreaController@store');
Route::post('Area/{id}','AreaController@update');

Route::group(['middleware' =>['pref']], function(){





Route::post('Login', 'AuthController@login');//-> middleware('pref');
Route::post('Logout', 'AuthController@logout');//-> middleware('cors');
Route::post('Registro', 'AuthController@register');//-> middleware('pref');


//});

Route::get('Reportem','ReportemedicoController@index');//->middleware('tokenmiddle');//->middleware('cors');//->middleware(tokenmiddle::class);//->middleware('tokenmiddle'); //-> middleware('cors');
Route::get('Reportem/{id}','ReportemedicoController@show');//->middleware(tokenmiddle::class);//> middleware('cors'); 
Route::get('Reportem1/{id}','ReportemedicoController@showsingle');


//Route::post('Login', 'Login@login')-> middleware('cors');

//Route::post('Registro', 'AuthController@register')-> middleware('cors');

//                                          WHY this is working...
//Route::get('Empleado','EmpleadoController@index');//-> middleware('cors');//->middleware('auth');



Route::get('Turnox','TurnoController@indexa'); 


Route::get('Turno/{puesto}/{horario}','TurnoController@indexpuesto'); 

Route::get('Turnoa/{puesto}/{horario}/{area}','TurnoController@indexarea'); 

Route::get('Turnop/{puesto}/{horario}/{fecha}','TurnoController@indexfecha');    //used instead cuz area esta en puesto id ahora...
Route::get('Turno/{puesto}/{horario}/{area}/{fecha}','TurnoController@indexfecharea');

Route::get('Turnof/{fecha}/{horario}','TurnoController@indexfechahorario'); 




Route::get('Turno','TurnoController@index');//->middleware(tokenmiddle::class);//-> middleware('cors');
Route::get('Turno/{id}','TurnoController@show');//->middleware(tokenmiddle::class);//-> middleware('cors');//REceives 1 idempelado show many
Route::get('Turno1/{id}','TurnoController@show1');                   //reciveves specifi id
Route::post('Turno','TurnoController@store');//->middleware(tokenmiddle::class);
Route::post('Turno/{id}','TurnoController@update');


//Route::apiResource("Maquina","EquipController");// dontttt-> middleware('cors');  

Route::get('Maquina','Maquinacontroller@index');//->middleware(tokenmiddle::class); //-> middleware('cors');

Route::get('Maquina/{id}','Maquinacontroller@show');//->middleware(tokenmiddle::class);//> middleware('cors'); 
Route::post('Maquina','Maquinacontroller@store')->middleware(tokenmiddle::class);//-> middleware('cors');    //DEBUGin
Route::post('Maquina/{id}','Maquinacontroller@update')->middleware(tokenmiddle::class);//-> middleware('cors');    //DEBUGin

//from the resource tut
//list empleados route

Route::get('Empleado','EmpleadoController@index');//->middleware('tokenmiddle');//->middleware('cors');//->middleware(tokenmiddle::class);//->middleware('tokenmiddle'); //-> middleware('cors');

//list single
Route::get('Empleado/{id}','EmpleadoController@show');//->middleware(tokenmiddle::class);//-> middleware('cors');

//create new
Route::post('Empleado','EmpleadoController@store')->middleware(tokenmiddle::class);//-> middleware('cors');
Route::post('Empleado/{id}','EmpleadoController@update')->middleware(tokenmiddle::class);//-> middleware('cors'); //update method crashed??
//uodate                                                //was crashin with store, not suported ID
//Route::put('Empleado/{id}','EmpleadoController@update');

//delete
Route::delete('Empleado','EmpleadoController@destroy')->middleware(tokenmiddle::class);

Route::delete('Maquina','Maquinacontroller@destroy')->middleware(tokenmiddle::class);

});
/*

                    //conjunto de rutas que apunta al controller    
//Route::apiResource("Empleado","EmpleadoController");
Route::get('Turno','TurnosController@index')-> middleware('cors');
Route::get('Turno/{id}','TurnosController@show')-> middleware('cors');//REceives 1 id

//Route::apiResource("Maquina","EquipController");// dontttt-> middleware('cors');  

Route::get('Maquina','EquipController@index')-> middleware('cors');
Route::post('Maquina/{id}','EquipController@update')-> middleware('cors');    //DEBUGin
  //from the resource tut
//list empleados route

Route::get('Empleado','EmpleadoController@index')-> middleware('cors');

//list single
Route::get('Empleado/{id}','EmpleadoController@show')-> middleware('cors');

//create new
Route::post('Empleado','EmpleadoController@store')-> middleware('cors');
Route::post('Empleado/{id}','EmpleadoController@update')-> middleware('cors'); //update method crashed??
//uodate                                                //was crashin with store, not suported ID
//Route::put('Empleado/{id}','EmpleadoController@update');

//delete
Route::delete('Empleado','EmpleadoController@destroy');
*/