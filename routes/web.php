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

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::post('/register', 'RegistrationController@register');
Route::get('/', 'PageController@index');
Route::get('/program', 'ProgramController@index');
Route::get('/program/tambah', 'ProgramController@add');
Route::post('/program/tambah', 'ProgramController@store');
Route::get('/profilatlet', 'AtletController@index');
Route::get('/profilatlet/tambah', 'AtletController@create');
Route::post('/profilatlet/tambah/save', 'AtletController@save');

Route::get('/program', 'ProgramController@index');
Route::prefix("program")->group(function(){
	Route::post("/simpan", "ProgramController@simpan");
	Route::get('/baru', 'ProgramController@index');
	Route::get('/{id_program}', 'ProgramController@edit');
	Route::get('/{id_program}/atlet', 'ProgramController@pilihAtlet');
	Route::get('/{id_program}/mikro', 'ProgramController@siklusMikro');
	Route::get('/{id_program}/mikro/{id_siklus_mikro}', 'ProgramController@sesiLatihan');
	Route::post('/{id_program}/mikro/{id_siklus_mikro}/simpan', 'ProgramController@simpanSesiLatihan');
	Route::post('/{id_program}/mikro/{id_siklus_mikro}/tambah_program_latihan', 'ProgramController@simpanProgramLatihan');
	Route::get('/{id_program}/makanan', 'ProgramController@programMakanan');
	Route::get("/sesi-latihan/{id_sesi_latihan}", 'ProgramLatihanController@index');
	Route::post("/sesi-latihan/{id_sesi_latihan}/simpan", 'ProgramLatihanController@simpan');
});
Route::post('/program/mikro/save', 'ProgramController@savesiklusMikro');

Route::get('/olahraga', 'CaborController@index');
Route::get('/pelatih', 'PelatihController@index');
Route::get('/list_makanan','ListMakananController@index');
Route::get('/latihan', 'LatihanController@index');
Route::get('/latihan/id', 'LatihanController@detail');
Route::get('/evaluasi', 'EvaluasiController@index');
