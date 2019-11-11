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
  

    Route::resource('cautela','CautelaController');
    Route::put('cautela/descautela/{id}',['as'=>'cautela.descautela','uses'=>'CautelaController@descautela']);
    Route::get('cautela/nova/{equipamento_id}', ['as'=>'cautela.abreform','uses'=>'CautelaController@exibeFormCautelarEquipamento']);
    Route::get('cautela/termo/{equipamento_id}', ['as'=>'cautela.termo','uses'=>'CautelaController@geraTermoCautela']);
    Route::get('cautela/termodescautela/{equipamento_id}', ['as'=>'cautela.termodescautela','uses'=>'CautelaController@abreTermoDescautela']);
    Route::put('cautela/termo/salvar/{id}',['as'=>'cautela.salvartermo','uses'=>'CautelaController@salvarTermo']);
    Route::put('cautela/termodescautela/salvar/{id}',['as'=>'cautela.salvartermodescautela','uses'=>'CautelaController@salvarTermoDescautela']);
    Route::post('cautela/buscar', ['as'=>'cautela.buscar','uses'=>'CautelaController@buscarPorNome']);

    Route::resource('pessoa','PessoaController');

    Route::post('pessoa/buscar', ['as'=>'pessoa.buscar','uses'=>'PessoaController@buscar']);
   
    Route::post('equipamento/buscar', ['as'=>'equipamento.buscar','uses'=>'EquipamentoController@buscar']);

});