@extends('layouts.app')

@section('content')

    <div class='container'>
        <h2 class="center">Equipamentos Cautelados</h2>

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
                            <td>{{$cautela->dt_cautela}}</td>

                            <td>{{$cautela->equipamento->marca_modelo}}</td>
                          
                            <td>{{$cautela->equipamento->nr_serie}}</td>
                            
                            
                            
                            <td>{{$cautela->pessoa->cargo->nome}} {{$cautela->pessoa->nome}}</td>

                            <td>{{$cautela->obs}}</td>
                           
                            
                            <td><form action="{{route('cautela.destroy', [$cautela->id])}}" method="post">
                                    <a title="Editar" class="btn orange" href="{{ route('cautela.edit',$cautela->id) }}"><i class="material-icons">mode_edit</i></a>
                                    {{ method_field('DELETE')}}
                                    {{ csrf_field() }}
                                    <button title="Deletar" class="btn red"><i class="material-icons">delete</i></button>

                                </form></td>
                        <tr>
                    @endforeach
                </tbody>

            </table>
        
        </div>

        <div class="row">
		
				<a class="btn blue" href="{{route('cautela.create')}}">CAUTELAR EQUIPAMENTO</a>
	
		</div>



    </div>

@endsection