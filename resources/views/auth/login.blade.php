@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <h3 class="center">Entrar no Sistema</h3>
      @if (session('status'))
          <div class="card">
              {{ session('status') }}
          </div>
      @endif
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="input-field col s12">
              <input type="text" name="login" value="{{ old('login') }}" class="validate" autofocus>
              <label>Login</label>
              @if ($errors->has('email'))
                  <span>
                      <strong>{{ $errors->first('login') }}</strong>
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

            <div class="col s12">
              <p>
                <input type="checkbox" id="lembrarSenha" name="remember" {{ old('remember') ? 'checked' : ''}} />
                <label for="lembrarSenha">Lembrar senha?</label>
              </p>
            </div>
            <div class="col s12">
              <br/>
              <button class="btn green">Entrar</button>
              <a href="{{ url('/password/reset') }}"  class="btn orange">Recuperar senha</a>
            </div>
          </form>
      </div>
  </div>

@endsection
