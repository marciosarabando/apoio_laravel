@extends('layouts.app')

@section('content')

    <div class='container'>
        
        <p class="flow-text">Lista de Cautelas</p>

        @include('_caminho')

        <div class='row'>
            <div class="col l6">

            </div>
            <div class="col l6">      
                    <form action="{{ route('cautela.buscar') }}" method="post">
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

                        <td>Id</td>

                        <td>Marca / Modelo</td>

                        <td>Nr Série</td>

                        <td>Cautelado para</td>
                        
                        <td>Data da Cautela</td>
                      
                        <td>Ações</td>
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

                            <td>
                                
                                @if($cautela->assinatura_cautela == null)
                                <a href="{{ route('cautela.termo', [$cautela->id]) }}"><span class="new badge red">Atenção: Falta assinatura do Termo! Clique para assinar.</span></a>
                                @else
                                    <a title="Abrir" class="btn blue" href="{{ route('cautela.show',$cautela->id) }}">DETALHES</a>
                                    <a title="Termo" target='_blank' class="btn orange" href="{{ route('cautela.termo', [$cautela->id]) }}">TERMO DE CAUTELA</a>                            
                                    <a title="Descautelar" class="btn red" href="{{route('cautela.termodescautela', [$cautela->id])}}  ">DESCAUTELAR</a>
                                @endif
                            </td>
                            
                        <tr>
                    @endforeach
                </tbody>

            </table>

            <!-- Sistema de Paginação Simples do Laravel-->
            {{ $cautelas->links() }}
        
        </div>

        <div class="row">
		
				<a class="btn blue" href="{{route('cautela.create')}}"><i class="material-icons">library_add</i> CRIAR CAUTELA</a>
				
	
		</div>



    </div>

@endsection