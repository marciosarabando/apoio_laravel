@extends('layouts.app')

@section('content')

<div class='container'>
        
        <p class="flow-text">Detalhes da Cautela {{ $cautela->pessoa_id}}</p>

        @include('_caminho')

        <p><b>MATERIAL:</b> {{ $equipamento->marca_modelo }}</p>
        <p><b>NR SÉRIE:</b> {{ $equipamento->nr_serie }}</p>
        <p><b>CAUTELADO PARA:</b> {{ $cautela->pessoa->cargo->nome }} {{ $cautela->pessoa->nome }}</p>
        <p><b>DATA DA CAUTELA:</b> {{date("d/m/Y H:i", strtotime($cautela->dt_cautela))}}</p>
        <p><b>OBSERVAÇÃO:</b> {{ $cautela->obs }}</p>

        <br>

        <form action="{{route('cautela.descautela', [$cautela->id])}}" method="post">
            {{ method_field('PUT')}}
            {{ csrf_field() }}
            <button title="Descautelar" class="btn red">DESCAUTELAR</button>
        </form>
        

</div>

@endsection