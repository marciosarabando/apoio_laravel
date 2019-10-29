@extends('layouts.app')

@section('content')
<div class="container">
    
    <p class="flow-text">Adicionar Pessoa</p>

	@include('_caminho')

	@if($message = Session::get('success'))
        <a class="flow-text">
            {{$message}}
		</a>
	@endif
	
	<div class="row">
		<form action="{{ route('pessoa.store') }}" method="post">

			{{ csrf_field() }}
			@include('pessoa._form')

			<button class="btn green">Adicionar</button>

			
		</form>
			
	</div>
	
</div>
	

@endsection