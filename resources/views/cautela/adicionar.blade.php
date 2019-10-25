@extends('layouts.app')

@section('content')
<div class="container">
	<p class="flow-text">Cautela de Equipamento</p>

	@include('_caminho')
	
	<div class="row">
		<div class="col l11">
			<form action="{{ route('cautela.store') }}" method="post">
				{{ csrf_field() }}
				@include('cautela._form')

				<button class="btn green">Efetuar Cautela</button>
				
			</form>
		</div>

		<div class="col l1">
			<div class="row">
				<div class="col l1">
					<br>
					<a title="Incluir Equipamento" class="btn blue" href="{{route('equipamento.create')}}"><i class="material-icons">add</i></a>
				</div>
			</div>

			<div class="row">
				<div class="col l1">
					
					<a title="Incluir Pessoa" class="btn blue" href="{{route('pessoa.create')}}"><i class="material-icons">add</i></a>
				</div>
			</div>

		</div>



	</div>


	
</div>
	

@endsection