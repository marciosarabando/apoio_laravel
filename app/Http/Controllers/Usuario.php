<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Secao;
use App\Cargo;
use App\User;

class Usuario extends Controller
{
    //Para customizar o caminho da página de login
    public function showFormRegistro()
    {
        $cargos = Cargo::all();
        $secoes = Secao::all();
        return view('auth.register', compact('cargos', 'secoes'));
    }

    public function index()
    {
        $usuarios = User::all();

        $caminhos = [
            ['url' => '/home','titulo' => 'Home'],
            ['url' => '/home/usuario','titulo' => 'Usuários'],
        ];
        
        return view ('usuario.index', compact('caminhos','usuarios'));
    }

    public function edit($id)
    {
        $cargos = Cargo::all();
        $secoes = Secao::all();
        $registro = User::find($id);

        $caminhos = [
            ['url' => '/home','titulo' => 'Home'],
            ['url' => '/home/usuario','titulo' => 'Usuário'],
            ['url' => '','titulo' => 'Editar'],
        ];

        return view('usuario.editar', compact('caminhos' ,'cargos', 'secoes', 'registro'));
    }

    public function update(Request $request, $id)
    {
        User::find($id)->update($request->all());
        return redirect()->route('usuario.index');
    }




}
