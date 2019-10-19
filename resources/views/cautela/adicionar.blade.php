@extends('layouts.app')

@section('content')
<div class="container">
	<h2 class="center">Cautela de Equipamento</h2>

	@include('_caminho')
	
	<div class="row">
		<form action="{{ route('cautela.store') }}" method="post">

			{{ csrf_field() }}
			@include('cautela._form')

			<button class="btn green">Efetuar Cautela</button>

			
		</form>
			
	</div>
	
</div>
	

@endsection