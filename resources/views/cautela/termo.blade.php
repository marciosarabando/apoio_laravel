<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Apoio/SFPC') }}</title>

    <!-- CSS  -->
    <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
    <link href="{{ asset('fonts/google/fonts.googleapis.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('css/apoio.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>

    <script>
        window.onload = function () {
            //todo conteúdo ficará aqui
            
            //Codigo para desenhar com o mouse
            /*
            var Draw = {
            obj : document.getElementById('canvas'),
            contexto : document.getElementById('canvas').getContext("2d"),
            _init:function(){
                Draw.obj.onmousemove = Draw._over;
                Draw.obj.onmousedown = Draw._ativa;
                Draw.obj.onmouseup = Draw._inativa;
                Draw.obj.onselectstart = function () { return false; };
            },
            _over:function(e){
                if(!Draw.ativo) return;
                console.log(e);
                Draw.contexto.beginPath();
                Draw.contexto.lineTo(Draw.x,Draw.y);
                Draw.contexto.lineTo(e.layerX, e.layerY);
                Draw.contexto.stroke();
                Draw.contexto.closePath();
                Draw.x = e.layerX;
                Draw.y = e.layerY;
            },
            _ativa:function(e){
                Draw.ativo = true;
                Draw.x = e.layerX;
                Draw.y = e.layerY;
            },
            _inativa:function(){
                Draw.ativo = false;
            }
        }
        Draw._init();
        */
        

        //Código para desenhar no Canvas com o Touch
        
        var Draw = {
            obj : document.getElementById('canvas'),
            contexto : document.getElementById('canvas').getContext("2d"),
            _init:function(){

                Draw.obj.addEventListener('touchstart', function(event) {
                    Draw._ativa(event.touches);
                }, false);
                Draw.obj.addEventListener('touchmove', function(event) {
                    Draw._over(event.touches);
                }, false);
                Draw.obj.addEventListener('touchend', function(event) {
                    Draw._inativa(event.touches);
                }, false);
            },
            _over:function(e){
                if(!Draw.ativo) return;
                //console.log(e);
                var touch = event.targetTouches[0];
                console.log(touch);
                Draw.contexto.beginPath();
                Draw.contexto.lineTo(Draw.x,Draw.y);
                Draw.contexto.lineTo(touch.pageX, touch.pageY);
                Draw.contexto.stroke();
                Draw.contexto.closePath();
                Draw.x = (touch.pageX);
                Draw.y = (touch.pageY);
            },
            _ativa:function(e){
                console.log('ativo');
                console.log(event);
                var touch = event.targetTouches[0];
                Draw.ativo = true;
                Draw.x = (touch.pageX);
                Draw.y = (touch.pageY);
            },
            _inativa:function(){
                Draw.ativo = false;
                console.log('nao ativo');
            }
        }
        Draw._init();
        
        //Previne o Movimento da Tela ao tocar o componente
        var canvas = document.getElementById('canvas');
        canvas.addEventListener('touchmove', function(event) {
        event.preventDefault();
        }, false);

        /*
        canvas.addEventListener('touchmove', function(event) {
        renderTouches(event.touches);
        }, false);

        var contexto = document.getElementById('canvas').getContext("2d");

        function renderTouches(e)
        {
            //console.log(e[0].clientX);
            //contexto.beginPath();
            //contexto.lineTo(e[0].clientX,e[0].clientY);
            //contexto.stroke();
            //contexto.closePath();
        }
   
        */

        

    }

    </script>
</head>
<body>
<div class='container'>


    <br>
    <br>
    <center>
        <img src="{{url('img/brasao2rm.png')}}" height='230'/>
        <br>
        <h5>TERMO DE CAUTELA DE EQUIPAMENTO</h5>
        
        <p>Eu, <b>{{ $pessoa->cargo->nome }} {{ $pessoa->nome }}</b> lotado na OM/Seção <b>{{ $pessoa->secao }}</b>, declaro ter recebido do Serviço de Fiscalização de Produtos Controlados da 2º Região Militar o seguinte equipamento:</p>
        <br>

        <div class='container'>
            <table class="responsive-table">
                <tr>
                    <td>
                        TIPO DE EQUIPAMENTO
                    </td>
                    <td>
                        MARCA / MODELO
                    </td>
                    <td>
                        PATRIMÔNIO
                    </td>
                    <td>
                        NR DE SÉRIE
                    </td>
                </tr>
                <tr>
                
                
                    <td>
                        <b>{{ $equipamento->equipamento_tipo->nome }}</b>
                    </td>

                    <td>
                        <b>{{ $equipamento->marca_modelo }}</b>
                    </td>

                    <td>
                    </td>

                    <td>
                        <b>{{ $equipamento->nr_serie }}</b>
                    </td>
            
                </tr>
            </table>
        </div>
        <br><br><br><br>
        Quartel General do Ibirapuera, ___ de ________________ de 2019.
    </center>

    <br>

    <center>
        <canvas style="background:beige" id="canvas" class="canvas" width="600" height="100">
            Seu browser não suporta canvas, é hora de trocar!.
        </canvas>
        <br>
        <b>{{ $pessoa->nome }} - {{ $pessoa->cargo->nome }}</b>

        <br><br>

        <a class="btn green">GERAR TERMO</a>

    </center>



</div>

</body>
</html>