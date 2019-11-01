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
            <div class="col s3"><b>OBSERVAÇÃO:</b></div>
            <div class="col s4"> {{ $equipamento->obs }}</div>
        </div>

        <div class="row">
            <div class="col s3"><b>SITUAÇÃO:</b></div>
            <div class="col s4"> {{  $equipamento->equipamento_status->descricao }}</div>
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
                    </tr>
                 
                @endforeach
               
            </tbody>
        </table>

        

</div>

@endsection