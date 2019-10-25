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
                          
                            <td>{{$equipamento->equipamento_tipo->nome}}</td>
                            
                            <td>{{$equipamento->marca_modelo}}</td>
                            <td>{{$equipamento->nr_serie}}</td>
                            <td>{{$equipamento->obs}}</td>
                            
                            <td><form action="{{route('equipamento.destroy', [$equipamento->id])}}" method="post">
                                    
                                    <a title="Editar" class="btn orange" href="{{ route('equipamento.edit',$equipamento->id) }}"><i class="material-icons">mode_edit</i></a>
                                    {{ method_field('DELETE')}}
                                    {{ csrf_field() }}
                                    <button title="Deletar" class="btn red"><i class="material-icons">delete</i></button>
                                    @if($equipamento->st_cautelado == 0)
                                        <a class="btn blue" href="{{ route('cautela.abreform', $equipamento->id) }}"><i class="material-icons">swap_vertical_circle</i> CAUTELAR</a>
                                    @endif

                                </form></td>
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