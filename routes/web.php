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
// Route::get('/program', 'ProgramController@index');
// Route::get('/program/tambah', 'ProgramController@add');
// Route::post('/program/tambah', 'ProgramController@store');
Route::get('/atlet', 'AtletController@index');
Route::get('/atlet/tambah', 'AtletController@create');
Route::post('/atlet/save', 'AtletController@save');

Route::prefix("program")->group(function(){
	Route::get('/', 'ProgramController@index');
	Route::post("/simpan", "ProgramController@simpan");
	Route::get('/baru', 'ProgramController@baru');
	Route::get('/hapus/{id_program}','ProgramController@hapus');

	Route::get('/{id_program}/deskripsi', 'ProgramController@edit');
	Route::post("/{id_program}/ubah", 'ProgramController@ubah');
	Route::get('/{id_program}/atlet', 'ProgramController@pilihAtlet');
	Route::get('/{id_program}/makanan', 'ProgramController@programMakanan');


	Route::get('/{id_program}/mikro', 'SiklusMikroController@index');
	Route::get('/{id_program}/mikro/{id_siklus_mikro}', 'SiklusMikroController@detail');
	Route::get('/{id_program}/mikro/{id_siklus_mikro}/edit', 'SiklusMikroController@edit');
	Route::post('/{id_program}/mikro/{id_siklus_mikro}/ubah', 'SiklusMikroController@ubah');
	Route::get('/{id_program}/mikro/{id_siklus_mikro}/hapus', 'SiklusMikroController@hapus'); //perlu diubah ke route::delete
	// Route::post('/{id_program}/sesi-latihan/{id_siklus_mikro}/tambah_program_latihan', 'ProgramLatihanController@simpanProgramLatihan');
	// Route::get("/{id_program}/mikro/{id_sesi_latihan}", 'ProgramLatihanController@index');
	Route::get("/{id_program}/mikro/{id_siklus_mikro}/sesi-latihan/{id_sesi_latihan}", 'SesiLatihanController@index');
	Route::get("/{id_program}/mikro/{id_siklus_mikro}/sesi-latihan/{id_sesi_latihan}/edit", 'SesiLatihanController@edit');
	Route::post("/sesi-latihan/{id_sesi_latihan}/ubah", 'SesiLatihanController@ubah');
	Route::delete("/{id_program}/mikro/{id_siklus_mikro}/sesi-latihan/{id_sesi_latihan}/hapus", 'SesiLatihanController@hapus');

	Route::post('/{id_program}/mikro/{id_siklus_mikro}/sesi-latihan/{id_sesi_latihan}/menu-latihan/simpan', 'ProgramLatihanController@simpan');
	Route::get('/{id_program}/mikro/{id_siklus_mikro}/sesi-latihan/{id_sesi_latihan}/menu-latihan/{id_program_latihan}/edit', 'ProgramLatihanController@edit');
	Route::post('/{id_program}/mikro/{id_siklus_mikro}/sesi-latihan/{id_sesi_latihan}/menu-latihan/{id_program_latihan}/update', 'ProgramLatihanController@update');
	Route::delete('/{id_program}/mikro/{id_siklus_mikro}/sesi-latihan/{id_sesi_latihan}/menu-latihan/{program_latihan_id}/hapus', 'ProgramLatihanController@hapus');
	Route::post('/menu-latihan/{program_latihan_id}/ubah', 'ProgramLatihanController@ubah');

	Route::post('/{id_program}/mikro/simpan', 'SiklusMikroController@savesiklusMikro');
	Route::post('/sesi-latihan/simpan', 'SesiLatihanController@simpanSesiLatihan');
	Route::post('/program-makan/simpan', 'ProgramMakan@simpan');
	// Route::post("/menu-latihan/simpan", 'ProgramLatihanController@simpan');
});
// Route::get('program/1/mikro/1/hapus/{id}','ProgramController@deleteSiklusMikro');
// Route::post('/program/mikro/save', 'ProgramController@savesiklusMikro');

Route::post("/pilih-atlet", "ProgramController@simpanAtlet");

Route::get('/olahraga', 'CaborController@index');
Route::get('/pelatih', 'PelatihController@index');
Route::get('/list_makanan','ListMakananController@index');
Route::get('/latihan', 'LatihanController@index');
Route::post('/latihan/tambah','LatihanController@save');


Route::get('/latihan/{id}', 'LatihanController@detail');
Route::get('/latihan/hapus/{id_latihan}','LatihanController@hapus');
Route::get('/latihan/{id}/edit', 'LatihanController@edit');
Route::post('/latihan/update', 'LatihanController@update');
Route::get('/evaluasi', 'EvaluasiController@index');
