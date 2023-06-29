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
Route::get('/', 'Frontend\PengumumanController@profil')->name('profil');
Route::get('/homepage', 'Frontend\PengumumanController@index')->name('homepage');
Route::get('/pengumuman/{pengumuman}','Frontend\PengumumanController@show')->name('pengumuman.show');
Route::get('/pengumuman', 'Frontend\HalamanController@pengumuman')->name('pengumuman');
Route::post('/pengumuman/{pengumuman}/comment', 'Frontend\PengumumanCommentController@store')->name('comment.store')->middleware('auth');

Route::get('/kontak', 'Frontend\HalamanController@kontak')->name('kontak');
Route::post('/kontak/kirim', 'Frontend\KontakController@store')->name('kontak.store');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');



\PWA::routes();
