@extends('layouts.app')

@section('content')

<div class="container">


<br>
<p class="flow-text">Olá! Seja Bem vindo, {{ Auth::user()->cargo->nome }} {{ Auth::user()->nm_guerra }}</p>
 

    <div class="row">

        <div class="col s12 m6">
            <div class="card green">
                <div class="card-content white-text">
                    <span class="card-title">CAUTELA</span>
                    <p>Controle de Cautela de Equipamentos</p>
                </div>
                <div class="card-action">
                    <a href="{{route('cautela.index')}}">Vizualizar</a>
                </div>
            </div>
        </div>

        <div class="col s12 m6">
            <div class="card green">
                <div class="card-content white-text">
                    <span class="card-title">EQUIPAMENTO</span>
                    <p>Cadastro de Equipamentos</p>
                </div>
                <div class="card-action">
                    <a href="{{route('equipamento.index')}}">Vizualizar</a>
                </div>
            </div>
        </div>


        <div class="col s12 m6">
            <div class="card green">
                <div class="card-content white-text">
                    <span class="card-title">PESSOA</span>
                    <p>Cadastro de Pessoas</p>
                </div>
                <div class="card-action">
                    <a href="{{route('equipamento.index')}}">Vizualizar</a>
                </div>
            </div>
        </div>
    
        


    </div>



</div>
@endsection
