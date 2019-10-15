<div class="input-field">
	<select name="equipamento_tipo_id" id="equipamento_tipo_id">
		<option value='0'>TIPO DE EQUIPAMENTO...</option>
		@foreach($equipamentos_tipos as $equipamento_tipo)
			@if(isset($registro->equipamento_tipo_id) && $registro->equipamento_tipo_id == $equipamento_tipo->id)
				<option value='{{ $equipamento_tipo->id }}' selected>{{ $equipamento_tipo->nome }}</option>
			@else
				<option value='{{ $equipamento_tipo->id }}'>{{ $equipamento_tipo->nome }}</option>
			@endif
		@endforeach
		
	</select>
		@if ($errors->has('equipamento_tipo_id'))
			<span>
				<strong>{{ $errors->first('equipamento_tipo_id') }}</strong>
			</span>
		@endif
</div>

<div class="input-field">
	<input type="text" name="marca_modelo" class="validade" value="{{ isset($registro->marca_modelo) ? $registro->marca_modelo : '' }}">
	<label>Marca / Modelo</label>
</div>

<div class="input-field">
	<input type="text" name="nr_serie" class="validade" value="{{ isset($registro->nr_serie) ? $registro->nr_serie : '' }}">
	<label>Número de Série</label>
</div>

<div class="input-field">
	<input type="text" name="obs" class="validade" value="{{ isset($registro->obs) ? $registro->obs : '' }}">
	<label>Observação</label>
</div>