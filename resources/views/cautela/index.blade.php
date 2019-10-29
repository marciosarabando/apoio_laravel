@extends('layouts.app')

@section('content')

    <div class='container'>
        
        <p class="flow-text">Lista de Cautelas</p>

        @include('_caminho')

        <div class='row'>
            <table class="responsive-table">
                <thead>
                    <tr>

                        <td>Id</td>

                        <td>Marca / Modelo</td>

                        <td>Nr Série</td>

                        <td>Cautelado para</td>
                        
                        <td>Data da Cautela</td>
                      
                        <td>Ação</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach($cautelas as $cautela)
                    <tr>
                            <td>{{$cautela->id}}</td>

                            <td>{{$cautela->equipamento->marca_modelo}}</td>

                            <td>{{$cautela->equipamento->nr_serie}}</td>

                            <td>{{$cautela->pessoa->cargo->nome}} {{$cautela->pessoa->nome}}</td>

                            <td>{{date("d/m/Y H:i", strtotime($cautela->dt_cautela))}}</td>                         

                            <td><a title="Abrir" class="btn green" href="{{ route('cautela.show',$cautela->id) }}">ABRIR</a></td>
                            
                        <tr>
                    @endforeach
                </tbody>

            </table>
        
        </div>

        <div class="row">
		
				<a class="btn blue" href="{{route('cautela.create')}}"><i class="material-icons">library_add</i> CAUTELAR EQUIPAMENTO</a>
				
	
		</div>



    </div>

@endsection