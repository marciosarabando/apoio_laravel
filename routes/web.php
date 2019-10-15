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

//Grupo de Rotas Protegido a partir do prefixo /admin
//Todas as Rotas que fizerem apontamentos dentro de /admin estarão protegidas por autenticação
Route::group(['middleware' => 'auth', 'prefix' => 'home'], function () {

    Route::resource('equipamento','EquipamentoController');

    Route::get('equipamento/{id}', ['as'=>'equipamento','uses'=>'EquipamentoController@index']);
    Route::post('equipamento',['as'=>'equipamento.store','uses'=>'EquipamentoController@store']);
    Route::delete('equipamento/{equipamento}', ['as'=>'equipamento.destroy','uses'=>'EquipamentoController@destroy']);
  

});