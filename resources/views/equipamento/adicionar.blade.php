@extends('layouts.app')

@section('content')
<div class="container">
	<h2 class="center">Adicionar Equipamento</h2>

	@include('_caminho')
	
	<div class="row">
		<form action="{{ route('equipamento.store') }}" method="post">

			{{ csrf_field() }}
			@include('equipamento._form')

			<button class="btn green">Adicionar</button>

			
		</form>
			
	</div>
	
</div>
	

@endsection