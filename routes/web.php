<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('sendmail',function(){

$data = array('name' => "Laravel test1");

//Mail::send('emails.welcom',$data,function($message){  //usa views..

Mail::raw("Text to MAILLL",function($message){  //usa views..

 $message ->from('dancingappsdays@gmail.com', 'Laravel messagefrom');

 $message ->to('ba55yunky@gmail.com')->subject('Subjecto of message');



});
    return "Email enviado correctamente";


});


Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('ba55yunky@gmail.com')->send(new \App\Mail\NotMail($details));
   
    dd("Email is Sent.");
});