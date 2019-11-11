@extends('layouts.app')

@section('content')

<div class='container'>

<h3 class="center">{{ $equipamento->marca_modelo }} - {{ $equipamento->nr_serie }}</h3>

@include('_caminho')
        <div class="row">
            <div class="col s3"><b>TIPO:</b></div>
            <div class="col s4">{{ $equipamento->equipamento_tipo->nome }}</div>
        </div>

        <div class="row">
            <div class="col s3"><b>MARCA / MODELO:</b></div>
            <div class="col s4">{{ $equipamento->marca_modelo }}</div>
        </div>

        <div class="row">
            <div class="col s3"><b>NR SÉRIE:</b></div>
            <div class="col s4">{{ $equipamento->nr_serie }}</div>
        </div>

        <div class="row">
            <div class="col s3"><b>NR PATRIMÔNIO:</b></div>
            <div class="col s4">{{ $equipamento->nr_patrimonio }}</div>
        </div>

        <div class="row">
            <div class="col s3"><b>SITUAÇÃO:</b></div>
            <div class="col s4"> {{  $equipamento->equipamento_status->descricao }}</div>
        </div>

        <div class="row">
            <div class="col s3"><b>OBSERVAÇÃO:</b></div>
            <div class="col s4"> {{ $equipamento->obs }}</div>
        </div>

        <hr>
       
        <b>HISTÓRICO DE CAUTELAS</b>
        
        <table>
            <thead>
                <th>
                    CAUTELADO EM
                </th>
                <th>
                    CAUTELADO PARA
                </th>
                <th>
                    CAUTELA REALIZADA POR
                </th>
                <th>
                    OBSERVAÇÃO
                </th>
                <th>
                    DESCAUTELADO EM
                </th>
                <th>
                    <center>TERMOS</center>
                </th>
            </thead>
            <tbody>
                @foreach($equipamento->cautelas as $cautela)
                    <tr>
                        <td>{{date("d/m/Y H:i", strtotime($cautela->dt_cautela))}}</td>
                        
                        <td>{{ $cautela->pessoa->cargo->nome }} {{ $cautela->pessoa->nome }}</td>
                        <td>{{ $cautela->user->cargo->nome }} {{ $cautela->user->nm_guerra }}</td>
                        <td>{{ $cautela->obs }}</td>
                        <td>   
                                @if($cautela->dt_descautela <> null)
                                    {{date("d/m/Y H:i", strtotime($cautela->dt_descautela))}}
                                @else
                                    Cautelado
                                @endif
                        </td>
                        <td>
                            <center>   
                                @if($cautela->dt_descautela == null)
                                    <a title="Termo" class="btn orange" target='_blank' href="{{ route('cautela.termo',[$cautela->id]) }}">CAUTELA</a>
                                @else  
                                    <a title="Termo" class="btn orange" target='_blank' href="{{ route('cautela.termo',[$cautela->id]) }}">CAUTELA</a>                          
                                    <a title="Abrir Termo" class="btn red" target='_blank' href="{{route('cautela.termodescautela', [$cautela->id])}}">DEVOLUÇÃO</a>
                                @endif
                            </center>
                        </td>
                    </tr>
                 
                @endforeach
               
            </tbody>
        </table>

        

</div>

@endsection