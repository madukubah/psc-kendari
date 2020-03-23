<?php

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

// Route::get('/', function () {
//     // return view('auth.login');
//     return view('landing');
// });

Route::get('/', 'PublicController@index')->name('landing');


Auth::routes();

Route::match(["GET", "POST"], "/register", function(){
    return redirect("/login");
})->name("register");

Route::get('/home', 'HomeController@index')->name('home');

Route::resource("users", "UserController");

Route::resource('puskesmas', 'PuskesmasController');

Route::resource('rumkit', 'RumkitController');

Route::resource('driver', 'DriverController');

Route::resource('ambulans', 'AmbulansController');

Route::resource('kejadian', 'KejadianController');

Route::get('/ajax/puskesmas/search', 'PuskesmasController@ajaxSearch');

Route::get('/ajax/rumkit/search', 'RumkitController@ajaxSearch');

Route::get('/ajax/ambulans/search', 'AmbulansController@ajaxSearch');

Route::get('/ajax/driver/search', 'DriverController@ajaxSearch');
