<?php

Route::get('/', 'HomeController@index')->name('dashboard');
// Data controller
Route::get('/warga/data', 'DataController@wargas')->name('warga.data');
Route::get('/perkebunan/data', 'DataController@perkebunans')->name('perkebunan.data');
Route::get('/pengumuman/data', 'DataController@pengumumans')->name('pengumuman.data');
Route::get('/kontak/data', 'DataController@contacts')->name('kontak.data');
Route::get('/komentar/data', 'DataController@comments')->name('komentar.data');
Route::get('/paralax/data', 'DataController@paralax')->name('paralax.data');
// data warga
Route::resource('warga', 'WargaController');
Route::get('export-warga','ExportController@warga')->name('warga.excel');
Route::post('import-warga','ImportController@warga')->name('warga.import');
Route::get('cetak_warga','PDFController@warga')->name('warga.cetak');
Route::get('warga-restore','WargaController@tampil_hapus')->name('warga.restore');
Route::get('warga-kembalikan/{id}', 'WargaController@kembalikan')->name('warga.kembalikan');
Route::get('warga-hapus_permanen/{id}', 'WargaController@hapus_permanen')->name('warga.hapus_permanen');
Route::get('warga/kembalikan_semua', 'WargaController@kembalikan_semua')->name('warga.kembalikan_semua');
Route::get('warga/hapus_permanen_semua', 'WargaController@hapus_permanen_semua')->name('warga.hapus_semua');
//data Pengumuman
Route::resource('pengumuman', 'PengumumanController');
//data Perkebunan
Route::resource('perkebunan', 'PerkebunanController');
Route::get('export-perkebunan','ExportController@perkebunan')->name('perkebunan.excel');
Route::get('cetak_perkebunan','PDFController@perkebunan')->name('perkebunan.cetak');
Route::post('import-perkebunan','ImportController@warga')->name('perkebunan.import');
Route::get('perkebunan-restore','PerkebunanController@tampil_hapus')->name('perkebunan.restore');
Route::get('perkebunan-kembalikan/{id}', 'PerkebunanController@kembalikan')->name('perkebunan.kembalikan');
Route::get('perkebunan-hapus_permanen/{id}', 'PerkebunanController@hapus_permanen')->name('perkebunan.hapus_permanen');
Route::get('perkebunan/kembalikan_semua', 'PerkebunanController@kembalikan_semua')->name('perkebunan.kembalikan_semua');
Route::get('perkebunan/hapus_permanen_semua', 'PerkebunanController@hapus_permanen_semua')->name('perkebunan.hapus_semua');
//data Kontak
Route::get('/kontak', 'ContactController@index')->name('kontak.show');
Route::delete('/kontak/hapus/{id}', 'ContactController@destroy')->name('contact.destroy');
Route::get('kontak/changeStatus', 'ContactController@changeStatus')->name('contact.status');
//data Komentar
Route::get('/komentar', 'KomentarController@index')->name('komentar.show');
Route::delete('/komentar/{comment}', 'KomentartController@destroy')->name('komentar.destroy');


Route::resource('slider', 'SliderController');
Route::resource('profil', 'ProfilController');
Route::resource('paralax', 'ParalaxController');
Route::resource('kategori-surat', 'KategoriSuratController');
Route::resource('arsip-surat', 'ArsipSuratController');
Route::get('/arsip-surat-keluar', 'ArsipSuratController@index2')->name('arsip-surat.keluar');
