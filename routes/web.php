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


// Route::get('home', 'ControllerSurat@suratjadi')->name('suratjadi');
Route::get('/','ControllerLogin@index')->name('/');
Route::get('home','ControllerLogin@home');

Route::post('loginpost','ControllerLogin@loginpost')->name('loginpost');

Route::resource('kampus','ControllerKampus');

Route::resource('penilaian','ControllerNilai');

// Route::get('/kampus', function () {
//     return view('kampus');
// });

// Route::get('/tambah_kampus', function () {
//     return view('tambah_kampus');
// });