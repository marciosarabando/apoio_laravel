<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Secao;
use App\Cargo;

class Usuario extends Controller
{
    //Para customizar o caminho da página de login
    public function showFormRegistro()
    {
        $cargos = Cargo::all();
        $secoes = Secao::all();
        return view('auth.register', compact('cargos', 'secoes'));
    }
}
