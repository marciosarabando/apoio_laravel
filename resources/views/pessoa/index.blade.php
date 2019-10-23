@extends('layouts.app')

@section('content')

    <div class='container'>
        
    <p class="flow-text">Cadastro de Pessoas</p>

        @include('_caminho')
  
        <div class='row'>
            <table>
                <thead>
                    <tr>
                        <td>NOME</td>
                        <td>Seção</td>
                        <td>Observação</td>
                        <td>Ação</td>
                    </tr>
                </thead>

                <tbody>

                @foreach($pessoas as $pessoa)
                    <tr>
                           
                            <td>{{$pessoa->cargo->nome}} {{$pessoa->nome}}</td>

                            <td>{{$pessoa->secao}}</td>

                            <td>{{$pessoa->obs}}</td>
                             
                            <td>
                                <form action="{{route('pessoa.destroy', [$pessoa->id])}}" method="post">
                                    <a title="Editar" class="btn orange" href="{{ route('pessoa.edit',$pessoa->id) }}"><i class="material-icons">mode_edit</i></a>
                                    {{ method_field('DELETE')}}
                                    {{ csrf_field() }}
                                    <button title="Deletar" class="btn red"><i class="material-icons">delete</i></button>

                                </form>
                            </td>
                        <tr>
                    @endforeach
                </tbody>

            </table>
        
        </div>

        <div class="row">
		
				<a class="btn blue" href="{{route('pessoa.create')}}">CADASTRAR</a>
	
		</div>



    </div>

@endsection