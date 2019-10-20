@extends('layouts.app')

@section('content')
<div class="container">
	<p class="flow-text">Cautela de Equipamento</p>

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