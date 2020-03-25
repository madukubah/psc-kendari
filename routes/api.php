<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    echo 'aa';
});

Route::get('/ambulans', 'API\AmbulansController@index')->name('ambulans');
Route::get('/puskesmas', 'API\PuskesmasController@index')->name('puskesmas');
Route::get('/rumkit', 'API\RumkitController@index')->name('rumkit');
Route::get('/kejadian', 'API\KejadianController@index')->name('kejadian');

