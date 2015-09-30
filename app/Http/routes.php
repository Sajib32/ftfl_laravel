<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
  //  return 'Welcome to our page!';
//});
//Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'TicketsController@create');
Route::post('/contact', 'TicketsController@store');
Route::get('/tickets', 'TicketsController@index');
Route::get('/ticket/{slug?}', 'TicketsController@show');
Route::get('/ticket/{slug?}/edit', 'TicketsController@edit');
Route::post('ticket/{slug?}/edit', 'TicketsController@update');
Route::post('/ticket/{slug?}/delete','TicketsController@destroy');
Route::get('sendemail', function() {
    $data = array(
        'name' => "Learning Laravel",
    );
    
    Mail::send('emails.welcome', $data, function($message) {
        $message->from('sajibcste@gmail.com', 'Learning Laravel');
        
        $message->to('sajibnstu@gmail.com')->subject('Learning Laravel test email');
    });
    
    return "Your email has been sent successfully";
});