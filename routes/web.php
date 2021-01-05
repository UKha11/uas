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


Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');
    Route::resource('anggota', 'AnggotaController');
    Route::resource('event', 'EventController');
    Route::resource('simpanan', 'SimpananController');
    Route::put('event/{id}/hapuspeserta', 'EventController@hapusPeserta')->name('event.hapuspeserta');
});
