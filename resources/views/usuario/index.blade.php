@extends('layouts.app')

@section('content')

    <div class='container'>
        
    <p class="flow-text">Usuários do Sistema</p>

        @include('_caminho')

        
  
        <div class='row'>
            <table class="responsive-table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>LOGIN</td>
                        <td>CARGO</td>
                        <td>NOME DE GUERRA</td>
                        <td>Ação</td>
                    </tr>
                </thead>

                <tbody>

                @foreach($usuarios as $usuario)
                    <tr>
                           
                            <td>{{$usuario->id}}</td>

                            <td>{{$usuario->login}}</td>

                            <td>{{$usuario->login}}</td>
                            
                            <td>{{$usuario->nm_guerra}}</td>
                             
                            <td>
                                <form action="{{route('usuario.destroy', [$usuario->id])}}" method="post">
                                    <a title="Editar" class="btn orange" href="{{ route('usuario.edit',$usuario->id) }}"><i class="material-icons">mode_edit</i></a>
                                    {{ method_field('DELETE')}}
                                    {{ csrf_field() }}
                                    <button title="Deletar" class="btn red"><i class="material-icons">delete</i></button>
                                    <a class="btn green" href="{{ route('usuario.create') }}"><i class="material-icons">swap_vertical_circle</i></a>
                                </form>
                            </td>
                        <tr>
                    @endforeach
                </tbody>

            </table>
            <!-- Sistema de Paginação Simples do Laravel-->
            
        
        </div>

        <div class="row">
		
				<a class="btn blue" href="{{route('pessoa.create')}}">CADASTRAR</a>
	
		</div>



    </div>

@endsection