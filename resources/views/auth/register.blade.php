@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <h3 class="center">Cadastro do Sistema</h3>
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
          {{ csrf_field() }}

          <div class="input-field col s12">
            <select name="secao_id" id="secao_id">
              <option value='0'>SELECIONE...</option>
                @foreach($secoes as $secao)
                  <option value='{{$secao->id}}'>{{$secao->nome}}</option>
                @endforeach
            </select>
              @if ($errors->has('secao_id'))
                  <span>
                      <strong>{{ $errors->first('secao_id') }}</strong>
                  </span>
              @endif
          </div>

          <div class="input-field col s12">
            <input type="text" name="login" value="{{ old('login') }}" class="validate" autofocus>
            <label>Login</label>
            @if ($errors->has('login'))
                <span>
                    <strong>{{ $errors->first('login') }}</strong>
                </span>
            @endif
          </div>

          <div class="input-field col s12">
            <select name="cargo_id" id="cargo_id">
              <option value='0'>SELECIONE...</option>
              @foreach($cargos as $cargo)
                <option value='{{$cargo->id}}'>{{$cargo->descricao}}</option>
              @endforeach
            </select>
              @if ($errors->has('cargo_id'))
                  <span>
                      <strong>{{ $errors->first('cargo_id') }}</strong>
                  </span>
              @endif
          </div>


          <div class="input-field col s12">
            <input type="text" name="nm_guerra" value="{{ old('nm_guerra') }}" class="validate">
            <label>Nome de Guerra</label>
            @if ($errors->has('nm_guerra'))
                <span>
                    <strong>{{ $errors->first('nm_guerra') }}</strong>
                </span>
            @endif
          </div>
          <div class="input-field col s12">
            <input type="password"  name="password" value="{{ old('password') }}" class="validate">
            <label>Senha</label>
            @if ($errors->has('password'))
                <span>
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="input-field col s12">
            <input type="password"  name="password_confirmation" value="{{ old('password_confirmation') }}" class="validate">
            <label>Confirme a senha</label>
            @if ($errors->has('password_confirmation'))
                <span>
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
          </div>
          <div class="col s12">
            <br/>
            <button class="btn green">Cadastrar</button>
          </div>
      </form>
    </div>
</div>

@endsection
