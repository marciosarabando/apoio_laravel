@extends('layouts.app')

@section('content')

<div class="container">
<br>
<p class="flow-text">Olá! Seja bem vindo, {{ Auth::user()->cargo->nome }} {{ Auth::user()->nm_guerra }}</p>
 

    <div class="row">
        <div class="col s12 m6">
            <div class="card purple darken-2">
                <div class="card-content white-text">
                    <span class="card-title">EQUIPAMENTOS</span>
                    <p>Cadastro de Equipamentos</p>
                </div>
                <div class="card-action">
                    <a href="{{route('equipamento.index')}}">Vizualizar</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
