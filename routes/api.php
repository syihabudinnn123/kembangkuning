<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/perkebunan','Api\PerkebunanController@all');
Route::get('/perkebunan/{id}','Api\PerkebunanController@show');
Route::post('/perkebunan','Api\PerkebunanController@store');
Route::put('/perkebunan/{id}','Api\PerkebunanController@update');
Route::delete('/perkebunan/{id}','Api\PerkebunanController@delete');

Route::get('/warga','Api\WargaController@all');
Route::get('/warga/{id}','Api\WargaController@show');
Route::post('/warga','Api\WargaController@store');
Route::put('/warga/{id}','Api\WargaController@update');
Route::delete('/warga/{id}','Api\WargaController@delete');

Route::get('/pengumuman','Api\PengumumanController@all');
Route::get('/pengumuman/{id}','Api\PengumumanController@show');
Route::post('/pengumuman','Api\PengumumanController@store');
Route::put('/pengumuman/{id}','Api\PengumumanController@update');
Route::delete('/pengumuman/{id}','Api\PengumumanController@delete');
