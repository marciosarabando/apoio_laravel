@extends('layouts.app')

@section('content')

<div class='container'>
        
        <p class="flow-text">CAUTELA DO <b>{{ $equipamento->marca_modelo }}</b></p>

        @include('_caminho')
        <div class="row">
            <div class="col s3"><b>TIPO:</b></div>
            <div class="col s4">{{ $equipamento->equipamento_tipo->nome }}</div>
        </div>

        <div class="row">
            <div class="col s3"><b>NR SÉRIE:</b></div>
            <div class="col s4">{{ $equipamento->nr_serie }}</div>
        </div>

        <div class="row">
            <div class="col s3"><b>CAUTELADO PARA:</b></div>
            <div class="col s4">{{ $cautela->pessoa->cargo->nome }} {{ $cautela->pessoa->nome }}</div>
        </div>

        <div class="row">
            <div class="col s3"><b>CAUTELADO POR:</b></div>
            <div class="col s4"> {{ $cautela->user->cargo->nome }} {{ $cautela->user->nm_guerra }}</div>
        </div>

        <div class="row">
            <div class="col s3"><b>OBSERVAÇÃO:</b></div>
            <div class="col s4"> {{ $cautela->obs }}</div>
        </div>

        <br>

        <form action="{{route('cautela.descautela', [$cautela->id])}}" method="post">
            {{ method_field('PUT')}}
            {{ csrf_field() }}
            <button title="Descautelar" class="btn red">DESCAUTELAR</button>
            <a title="Criar documento" class="btn blue" href="{{route('cautela.termo', [$cautela->id])}}  ">TERMO DE CAUTELA</a>
        </form>

        
        

</div>

@endsection