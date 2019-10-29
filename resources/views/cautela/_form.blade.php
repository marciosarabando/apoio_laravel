<div class="input-field">
	<select name="equipamento_id" id="equipamento_id">
		<option value='0'>EQUIPAMENTO:</option>
		@foreach($equipamentos as $equipamento)
			@if(isset($registro->equipamento_id) && $registro->equipamento_id == $equipamento->id)
				<option value='{{ $equipamento->id }}' selected>{{ $equipamento->marca_modelo }}</option>
			@else
				@if($equipamento->equipamento_status_id == 1)
					<option value='{{ $equipamento->id }}'>{{ $equipamento->marca_modelo }} - {{ $equipamento->nr_serie }}</option>
				@endif
			@endif
		@endforeach
		
	</select>
		@if ($errors->has('equipamento_id'))
			<span>
				<strong>{{ $errors->first('equipamento_id') }}</strong>
			</span>
		@endif
</div>

<div class="input-field">
	<select name="pessoa_id" id="pessoa_id">
		<option value='0'>PARA:</option>
		@foreach($pessoas as $pessoa)
			@if(isset($registro->pessoa_id) && $registro->pessoa_id == $pessoa->id)
				<option value='{{ $pessoa->id }}' selected>{{ $pessoa->cargo->nome }} {{ $pessoa->nome }}</option>
			@else
				<option value='{{ $pessoa->id }}'>{{ $pessoa->cargo->nome }} {{ $pessoa->nome }}</option>
			@endif
		@endforeach
		
	</select>
		@if ($errors->has('pessoa_id'))
			<span>
				<strong>{{ $errors->first('pessoa_id') }}</strong>
			</span>
		@endif
</div>

<div class="input-field">
	<input type="text" name="obs" class="validade" value="{{ isset($registro->obs) ? $registro->obs : '' }}">
	<label>Observação</label>
</div>