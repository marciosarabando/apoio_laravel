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
            ['url' => '/home/usuario','titulo' => 'Usuarios'],
        ];
        
        return view ('usuario.index', compact('caminhos','usuarios'));
    }
}
