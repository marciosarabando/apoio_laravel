<nav class="{{config('app.corSite')}}">
  <div class="nav-wrapper container">
    <a href="/home" class="brand-logo">{{config('app.logoSite')}}</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      
      @if (Auth::guest())
          <li><a href="{{ url('/login') }}">LOGIN</a></li>
          <li><a href="{{ url('/usuario/cadastrar') }}">CADASTRO</a></li>
      @else
        <li><a href="{{ url('/home')}}">{{ Auth::user()->cargo->nome }} {{ Auth::user()->nm_guerra }}</a></li></li>
        <li>
            <a href="{{ url('/logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                SAIR
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>

      @endif
    </ul>
  </div>
</nav>
