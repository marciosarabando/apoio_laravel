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
            <div class="col s3"><b>CAUTELADO EM:</b></div>
            <div class="col s4">{{date("d/m/Y H:i", strtotime($cautela->dt_cautela))}}</div>
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
            <div class="col s3"><b>TERMO DE CAUTELA:</b></div>
            <div class="col s4"> <a title="Abrir Termo" target='_blank' href="{{route('cautela.termo', [$cautela->id])}}  ">VISUALIZAR</a> </div>
        </div>

        <div class="row">
            <div class="col s3"><b>OBSERVAÇÃO:</b></div>
            <div class="col s4"> {{ $cautela->obs }}</div>
        </div>

        <br>
        
            <a title="Abrir Termo" class="btn red" href="{{route('cautela.termodescautela', [$cautela->id])}}  ">DESCAUTELAR</a>
   
        

</div>

@endsection