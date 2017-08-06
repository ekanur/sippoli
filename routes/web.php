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

Route::get('/', function () {
    return view('layout');
});

Route::get('/profilatlet', function () {
    return view('atlet/profilatlet');
});

Route::get('/profilatlet/tambah', function () {
    return view('atlet/inputatlet');
});
Route::get('/olahraga', 'CaborController@index');

Route::get('/pelatih', 'PelatihController@index');
Route::get('/list_makanan','ListMakananController@index');
Route::get('/latihan', 'LatihanController@index');
Route::get('/latihan/id', 'LatihanController@detail');
