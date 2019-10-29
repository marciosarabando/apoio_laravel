<div class="input-field">
	<select name="cargo_id" id="cargo_id">
		<option value='0'>CARGO...</option>
		@foreach($cargos as $cargo)
			@if(isset($registro->cargo_id) && $registro->cargo_id == $cargo->id)
				<option value='{{ $cargo->id }}' selected>{{ $cargo->descricao }}</option>
			@else
				<option value='{{ $cargo->id }}'>{{ $cargo->descricao }}</option>
			@endif
		@endforeach
		
	</select>
		@if ($errors->has('cargo_id'))
			<span>
				<strong>{{ $errors->first('cargo_id') }}</strong>
			</span>
		@endif
</div>

<div class="input-field">
	<input type="text" name="nome" class="upper validade" value="{{ isset($registro->nome) ? $registro->nome : '' }}">
	<label>NOME</label>
</div>

<div class="input-field">
	<input type="text" name="secao" class="upper validade" value="{{ isset($registro->secao) ? $registro->secao : '' }}">
	<label>SEÇÃO</label>
</div>

<div class="input-field">
	<input type="text" name="obs" class="upper validade" value="{{ isset($registro->obs) ? $registro->obs : '' }}">
	<label>Observação</label>
</div>