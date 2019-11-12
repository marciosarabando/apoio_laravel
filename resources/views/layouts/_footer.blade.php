<footer class="page-footer {{config('app.corSite')}}">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">{{config('app.logoSite')}}</h5>
          <p class="grey-text text-lighten-4">{{config('app.descricaoSite')}}</p>
        </div>

        <div class="col l3 s12">
          <h5 class="white-text">ÚTEIS</h5>
          <ul>
            <li><a class="white-text" href="http://portalsfpc.2rm.eb.mil.br" target='_blank'>Portal do SFPC/2</a></li>
            <li><a class="white-text" href="http://sigapce.2rm.eb.mil.br" target='_blank'>SIGAPCE</a></li>
            <li><a class="white-text" href="http://intranet.2rm.eb.mil.br" target='_blank'>Intranet 2ª RM</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">SISTEMAS</h5>
          <ul>
            <li><a class="white-text" href="#!">SIGMA</a></li>
            <li><a class="white-text" href="#!">SGTE</a></li>
            <li><a class="white-text" href="#!">SIGAPCE</a></li>
            <li><a class="white-text" href="#!">SICOVAB</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      © 2019 Copyright {{config('app.logoSite')}}
      <a class="orange-text text-lighten-3 right" href="{{ url('creditos') }}">{{config('app.autorSite')}}</a>
      </div>
    </div>
  </footer>