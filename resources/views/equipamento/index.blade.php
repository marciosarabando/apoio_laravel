@extends('layouts.app')

@section('content')

    <div class='container'>
        <h2 class="center">Lista de Equipamentos</h2>

        @include('_caminho')

        <div class='row'>
            <div class="col l6">

            </div>
            <div class="col l6">      
                    <form action="{{ route('equipamento.buscar') }}" method="post">
                    {{ csrf_field() }}
                        <div class="col l11">
                            <div class="input-field">
                                <input type="text" name="buscar_nr_serie" class="upper validade" value="{{ isset($registro->nr_serie) ? $registro->nr_serie : '' }}">
                                <label>Localizar por Nr de Série</label>
                            </div>
                        </div>
                        <br>
                        <div class="col l1">
                            <button class="btn blue"><i class="material-icons">find_in_page</i></button>
                        </div>
                    </form>
            </div>
        </div>

  
        <div class='row'>
        
        
            <table class="responsive-table">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Tipo</td>
                        <td>Marca / Modelo</td>
                        <td>Nr Série</td>
                        <td>Nr Patrimônio</td>
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
                            <td>{{$equipamento->nr_patrimonio}}</td>
                            <td>
                                @if($equipamento->equipamento_status_id == 1)
                                    <font color='green'><b>
                                @else
                                    <font color='red'><b>
                                @endif
                                    {{ $equipamento->equipamento_status->descricao }}
                                    
                                    @foreach($equipamento->cautelas as $cautela)
                                        @if($cautela->dt_descautela == null)
                                        para
                                        {{ $cautela->pessoa->cargo->nome }} {{ $cautela->pessoa->nome }}
                                        @endif
                                    @endforeach
                                    
                                </b></font>

                            </td>
                            
                            <td>
                                    <form action="{{route('equipamento.destroy', [$equipamento->id])}}" method="post">
                                        <a title="Abrir" class="btn blue" href="{{ route('equipamento.show',$equipamento->id) }}">Detalhes</a>
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