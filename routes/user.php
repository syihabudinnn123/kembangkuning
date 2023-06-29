<?php

Route::get('/', function () {
    return view('user.default');
})->name('dashboard');
Route::get('/warga', 'WargaController@create')->name('warga.create');
Route::post('/warga/tambah', 'WargaController@store')->name('warga.store');

Route::get('/perkebunan', 'WargaController@buat')->name('perkebunan.buat');
Route::post('/perkebunan/tambah', 'WargaController@simpan')->name('perkebunan.simpan');

