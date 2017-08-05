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
