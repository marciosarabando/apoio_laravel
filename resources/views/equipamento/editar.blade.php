@extends('layouts.app')

@section('content')
<div class="container">
	<h2 class="center">Editar Equipamento</h2>

	@include('_caminho')
	
	<div class="row">
		<form action="{{ route('equipamento.update', $registro->id) }}" method="post">

			{{ csrf_field() }}
            {{ method_field('PUT') }}
			@include('equipamento._form')

			<button class="btn green">Salvar</button>

			
		</form>
			
	</div>
	
</div>
	

@endsection