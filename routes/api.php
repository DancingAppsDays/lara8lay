<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\MIddleware\tokenmiddle;
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

Route::post('Login', 'AuthController@login');//-> middleware('cors');
Route::post('Logout', 'AuthController@logout');//-> middleware('cors');
Route::post('Registro', 'AuthController@register');//-> middleware('cors');


//});
//Route::post('Login', 'Login@login')-> middleware('cors');

//Route::post('Registro', 'AuthController@register')-> middleware('cors');

//                                          WHY this is working...
//Route::get('Empleado','EmpleadoController@index');//-> middleware('cors');//->middleware('auth');
Route::get('Turno','TurnoController@index')->middleware(tokenmiddle::class);//-> middleware('cors');
Route::get('Turno/{id}','TurnoController@show')->middleware(tokenmiddle::class);//-> middleware('cors');//REceives 1 id

//Route::apiResource("Maquina","EquipController");// dontttt-> middleware('cors');  

Route::get('Maquina','Maquinacontroller@index')->middleware(tokenmiddle::class); //-> middleware('cors');

Route::get('Maquina/{id}','Maquinacontroller@show')->middleware(tokenmiddle::class);//> middleware('cors'); 
Route::post('Maquina','Maquinacontroller@store')->middleware(tokenmiddle::class);//-> middleware('cors');    //DEBUGin
Route::post('Maquina/{id}','Maquinacontroller@update')->middleware(tokenmiddle::class);//-> middleware('cors');    //DEBUGin

//from the resource tut
//list empleados route

Route::get('Empleado','EmpleadoController@index')->middleware(tokenmiddle::class);//->middleware('tokenmiddle'); //-> middleware('cors');

//list single
Route::get('Empleado/{id}','EmpleadoController@show')->middleware(tokenmiddle::class);//-> middleware('cors');

//create new
Route::post('Empleado','EmpleadoController@store')->middleware(tokenmiddle::class);//-> middleware('cors');
Route::post('Empleado/{id}','EmpleadoController@update')->middleware(tokenmiddle::class);//-> middleware('cors'); //update method crashed??
//uodate                                                //was crashin with store, not suported ID
//Route::put('Empleado/{id}','EmpleadoController@update');

//delete
Route::delete('Empleado','EmpleadoController@destroy')->middleware(tokenmiddle::class);

Route::delete('Maquina','Maquinacontroller@destroy')->middleware(tokenmiddle::class);

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