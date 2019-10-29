@extends('layouts.app')

@section('content')

    <div class='container'>
        
    <p class="flow-text">Cadastro de Pessoas</p>

        @include('_caminho')

        <div class='row'>
            <div class="col l6">

            </div>
            <div class="col l6">
                    
                     
                    <form action="{{ route('pessoa.buscar') }}" method="post">
                    {{ csrf_field() }}
                        <div class="col l11">
                            <div class="input-field">
                                <input type="text" name="buscar_nome" class="upper validade" value="{{ isset($registro->nome) ? $registro->nome : '' }}">
                                <label>Localizar por Nome</label>
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
                                    <a class="btn green" href="{{ route('cautela.create') }}"><i class="material-icons">swap_vertical_circle</i></a>
                                </form>
                            </td>
                        <tr>
                    @endforeach
                </tbody>

            </table>
            <!-- Sistema de Paginação Simples do Laravel-->
            {{ $pessoas->links() }}
        
        </div>

        <div class="row">
		
				<a class="btn blue" href="{{route('pessoa.create')}}">CADASTRAR</a>
	
		</div>



    </div>

@endsection