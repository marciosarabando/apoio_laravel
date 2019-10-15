@extends('layouts.app')

@section('content')

    <div class='container'>
        <h2 class="center">Lista de Equipamentos</h2>

        @include('_caminho')
  
        <div class='row'>
            <table>
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Tipo</td>
                        <td>Marca / Modelo</td>
                        <td>Nr Série</td>
                        <td>Obs</td>
                        <td>Ação</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach($equipamentos as $equipamento)
                        <tr>
                            <td>{{$equipamento->id}}</td>
                          
                            <td>{{$equipamento->tipo_equipamento}}</td>
                            
                            <td>{{$equipamento->marca_modelo}}</td>
                            <td>{{$equipamento->nr_serie}}</td>
                            <td>{{$equipamento->obs}}</td>
                            <td>
                                <a title="Cautela" class="btn blue" href="{{route('equipamento.index', $equipamento->id)}}"><i class="material-icons">lock_outline</i></a>
                            </td>
                        <tr>
                    @endforeach
                </tbody>

            </table>
        
        </div>

        <div class="row">
		
				<a class="btn blue" href="{{route('equipamento.create')}}">Adicionar</a>
	
		</div>

    </div>

@endsection