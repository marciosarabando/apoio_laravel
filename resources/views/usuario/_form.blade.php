<div class="input-field col s12">
<input type="text" name="login" value="{{ isset($registro->login) ? $registro->login : '' }}" class="validate" disabled>
<label>Login</label>
@if ($errors->has('login'))
    <span>
        <strong>{{ $errors->first('login') }}</strong>
    </span>
@endif
</div>

<div class="input-field col s12">
<select name="secao_id" id="secao_id">
    <option value='0'>SEÇÃO...</option>
   
    @foreach($secoes as $secao)
			@if(isset($registro->secao_id) && $registro->secao_id == $secao->id)
				<option value='{{ $secao->id }}' selected>{{ $secao->nome }}</option>
			@else
				<option value='{{ $secao->id }}'>{{ $secao->nome }}</option>
			@endif
		@endforeach
    
</select>
    @if ($errors->has('secao_id'))
        <span>
            <strong>{{ $errors->first('secao_id') }}</strong>
        </span>
    @endif
</div>



<div class="input-field col s12">
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


<div class="input-field col s12">
<input type="text" name="nm_guerra" value="{{ isset($registro->nm_guerra) ? $registro->nm_guerra : '' }}" class="validate">
<label>Nome de Guerra</label>
@if ($errors->has('nm_guerra'))
    <span>
        <strong>{{ $errors->first('nm_guerra') }}</strong>
    </span>
@endif
</div>
         