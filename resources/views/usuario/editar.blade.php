@extends('layouts.app')

@section('content')
<div class="container">
    
    <p class="flow-text">Editar Usuário</p>

	@include('_caminho')
	
	<div class="row">
		<form action="{{ route('usuario.update', $registro->id) }}" method="post">

			{{ csrf_field() }}
            {{ method_field('PUT') }}
			@include('usuario._form')

			<button class="btn green">Salvar</button>

			
		</form>
			
	</div>
	
</div>
	

@endsection