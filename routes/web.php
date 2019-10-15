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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/usuario/cadastrar', 'Usuario@showFormRegistro')->name('novousuario');

//Route::get('/novousuario', 'Auth\RegisterController@showFormRegistro')->name('novousuario');
//Route::post('/register', 'Auth\RegisterController@create')->name('register');
