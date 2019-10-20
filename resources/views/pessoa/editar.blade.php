@extends('layouts.app')

@section('content')
<div class="container">
    
    <p class="flow-text">Editar Pessoa</p>

	@include('_caminho')
	
	<div class="row">
		<form action="{{ route('pessoa.update', $registro->id) }}" method="post">

			{{ csrf_field() }}
            {{ method_field('PUT') }}
			@include('pessoa._form')

			<button class="btn green">Salvar</button>

			
		</form>
			
	</div>
	
</div>
	

@endsection