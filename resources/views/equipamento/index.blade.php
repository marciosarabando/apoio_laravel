@extends('layouts.app')

@section('content')

    <div class='container'>
        <h2 class="center">Lista de Equipamentos</h2>

        @include('_caminho')
  
        <div class='row'>
        
        
            <table class="responsive-table">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Tipo</td>
                        <td>Marca / Modelo</td>
                        <td>Nr Série</td>
                        <td>Situação</td>
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
                            <td>
                                @if($equipamento->equipamento_status_id == 1)
                                    <font color='green'><b>
                                @else
                                    <font color='red'><b>
                                @endif
                                    {{ $equipamento->equipamento_status->descricao }}
                                
                                </b></font>

                            </td>
                            
                            <td>
                                    <form action="{{route('equipamento.destroy', [$equipamento->id])}}" method="post">
                                        <a title="Editar" class="btn orange" href="{{ route('equipamento.edit',$equipamento->id) }}"><i class="material-icons">mode_edit</i></a>
                                        {{ method_field('DELETE')}}
                                        {{ csrf_field() }}
                                        <button title="Deletar" class="btn red"><i class="material-icons">delete</i></button>
                                        @if($equipamento->equipamento_status_id == 1)
                                            <a class="btn green" href="{{ route('cautela.abreform', $equipamento->id) }}"><i class="material-icons">swap_vertical_circle</i></a>
                                        @endif
                                    </form>
                            </td>
                        <tr>
                    @endforeach
                </tbody>

            </table>

            <!-- Sistema de Paginação Simples do Laravel-->
            {{ $equipamentos->links() }}
      
            
        
        </div>

        <div class="row">
		
				<a class="btn blue" href="{{route('equipamento.create')}}">Adicionar</a>
	
		</div>

    </div>

    

@endsection