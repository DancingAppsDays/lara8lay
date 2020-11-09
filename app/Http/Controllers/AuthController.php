<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;  //lav8 docs?


use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Auth; 
use Validator;



class AuthController extends Controller
{
    //

    private $apiToken;

    public function __construct()
     {
     $this->apiToken = uniqid(base64_encode(Str::random(100)));
     }
   /** 
    * Register API 
    * 
    * @return \Illuminate\Http\Response 
    */ 
 
    //rooll key 
    public function rollnewkey()
    {
     do{ $this->apiToken = str_random(44);
 
     }while($this->where('remember_token', $this->apitoken)->exist());
     $this->save();
     
    }
 
    public function login(Request $request){ 
 
    if(Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')]))
    {
      
      //lara 5.4
      $user =auth()->user();//
       //Auth::user(); //auth()->user();


    //Setting login response 
    $success['token'] = $this->apiToken;      //sends error wihtout token
    $success['name'] = $user->name;
 
        //??bug
    
    //$user->update(['remember_token' => $success['token']]);
    //$user->update([     'apitoken' => $this->apiToken]);//$success['token']]

    $user->apitoken = $this->apiToken;  

     
    $user->save();

    //$user->update(['remember_token' => 'laralaralralra',
       //           'apiToken'=>$success['name']]
   
    
      


      return response()->json([
        'status' => 'success',
        'data' => $success
      ]); 
 
 
    } else {   //authlogin fauled
      return response()->json([    //(['error' => 'Email or password does\'t exist'], 401);
        'status' => 'error',
        'data' => 'Unauthorized Access',
        'error' => 'Email y password no coinciden', 401
      ]); 
    }
   }
 
   public function register(Request $request) 
   { 
     /*
     $validator = Validator::make($request->all(), [ 
       'name' => 'required', 
       'email' => 'required|email', 
       'password' => 'required', 
       
     ]);
     if ($validator->fails()) { 
       return response()->json(['error'=>$validator->errors()]);
     }*/
      //lav 8
     $hashed = Hash::make('password', [
      'rounds' => 12,
  ]);

  $postArray = $request->all();                                                   //lav5.4
     $postArray['password'] = $hashed;// bcrypt($postArray['password']);      //withoutthis auth faileeeed1!!
     
     

     //$user = User::create($request); 


      $user = User::create($postArray); 
     
     
      Auth::login($user,true);    //autenticate new user instance.... //crea remember token
 
     $success['token'] = $this->apiToken;  
     $success['name'] =  $user->name;
 
     
     //$user->update(['apitoken' => $sucess['token']   ]);  //trouble??
     //$user->update(array('apitoken' => $sucess['token']));
     


     $user->apitoken =  $success['token'];//name = 'FFUCKKK UU';//apitoken = $sucess['token'];        //this was crashing but... why

     
      $user->save();
      
     return response()->json([
       'status' => 'success',
       'data' => $success,
     ]); 
   }
 
 
       //invalidate token?
   public function logout(Request $request)
   {
      //JWTAuth::invalidate($token) ; //!!!!!!
 
     //auth()->logout();   //?
//if(Auth)
/*
    if(Auth::check()){

      $user =auth()->user();
      //Auth::user()->apitoken =
      $user->apitoken = null;
    }*/
    $headertoken = $request->header('Authorization');
    $token = null;
    $token = substr($headertoken,13); 

    $api = User::where('apitoken', '=', $token)->first();

      $api->apitoken  = null;
      $api->save();
      //Auth::logout();
 
     return response()->json(['status'=> 'success']);// 'Cerró sesión con éxito']);
   }
}
