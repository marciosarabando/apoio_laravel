@extends('layouts.app')

@section('content')

    <div class='container'>
        
        <p class="flow-text">Lista de Cautelas</p>

        @include('_caminho')

        <div class='row'>
            <table>
                <thead>
                    <tr>
                        <td>Data da Cautela</td>
                        
                        <td>Marca / Modelo</td>
                        <td>Nr Série</td>
                        
                        <td>Cautelado para</td>
                        <td>Obs</td>
                        <td>Ação</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach($cautelas as $cautela)
                    <tr>
                            <td>{{date("d/m/Y H:i", strtotime($cautela->dt_cautela))}}</td>

                            <td>{{$cautela->equipamento->marca_modelo}}</td>
                          
                            <td>{{$cautela->equipamento->nr_serie}}</td>
                            
                            
                            
                            <td>{{$cautela->pessoa->cargo->nome}} {{$cautela->pessoa->nome}}</td>

                            <td>{{$cautela->obs}}</td>

                            <td><a title="Abrir" class="btn blue" href="{{ route('cautela.show',$cautela->id) }}"><i class="material-icons">folder_open</i></a></td>
                            
                        <tr>
                    @endforeach
                </tbody>

            </table>
        
        </div>

        <div class="row">
		
				<a class="btn blue" href="{{route('cautela.create')}}"><i class="material-icons">library_add</i> CAUTELAR EQUIPAMENTO</a>
				<a title="Incluir Pessoa" class="btn blue" href="{{route('pessoa.create')}}"><i class="material-icons">account_box</i> CADASTRAR PESSOA</a>
	
		</div>



    </div>

@endsection