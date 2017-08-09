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
Route::get('/program', 'ProgramController@index');
Route::get('/olahraga', 'CaborController@index');
Route::get('/pelatih', 'PelatihController@index');
Route::get('/list_makanan','ListMakananController@index');
Route::get('/latihan', 'LatihanController@index');
Route::get('/latihan/id', 'LatihanController@detail');
Route::get('/evaluasi', 'EvaluasiController@index');
