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

        //TENTATIVA DE 08/11/2019
        //Artigo: http://bencentra.com/code/2014/12/05/html5-canvas-touch-events.html

        //var canvas = document.getElementById('canvas');

        // Set up the canvas
        var canvas = document.getElementById("canvas");
        var ctx = canvas.getContext("2d");
        ctx.strokeStyle = "#222222";
        ctx.lineWith = 2;

        // Set up mouse events for drawing
        var drawing = false;
        var mousePos = { x:0, y:0 };
        var lastPos = mousePos;
        canvas.addEventListener("mousedown", function (e) {
                drawing = true;
        lastPos = getMousePos(canvas, e);
        }, false);
        canvas.addEventListener("mouseup", function (e) {
        drawing = false;
        }, false);
        canvas.addEventListener("mousemove", function (e) {
        mousePos = getMousePos(canvas, e);
        }, false);

        // Get the position of the mouse relative to the canvas
        function getMousePos(canvasDom, mouseEvent) {
        var rect = canvasDom.getBoundingClientRect();
        return {
            x: mouseEvent.clientX - rect.left,
            y: mouseEvent.clientY - rect.top
        };
        }

        // Get a regular interval for drawing to the screen
        window.requestAnimFrame = (function (callback) {
        return window.requestAnimationFrame || 
           window.webkitRequestAnimationFrame ||
           window.mozRequestAnimationFrame ||
           window.oRequestAnimationFrame ||
           window.msRequestAnimaitonFrame ||
           function (callback) {
        window.setTimeout(callback, 1000/60);
           };
        })();

        // Draw to the canvas
        function renderCanvas() {
        if (drawing) {
            ctx.moveTo(lastPos.x, lastPos.y);
            ctx.lineTo(mousePos.x, mousePos.y);
            ctx.stroke();
            lastPos = mousePos;
        }
        }

        // Allow for animation
        (function drawLoop () {
        requestAnimFrame(drawLoop);
        renderCanvas();
        })();

        
        // Set up touch events for mobile, etc
        canvas.addEventListener("touchstart", function (e) {
                mousePos = getTouchPos(canvas, e);
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
        }, false);
        canvas.addEventListener("touchend", function (e) {
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas.dispatchEvent(mouseEvent);
        }, false);
        canvas.addEventListener("touchmove", function (e) {
            //console.log('touchmove');
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousemove", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
        }, false);

        // Get the position of a touch relative to the canvas
        function getTouchPos(canvasDom, touchEvent) {
            var rect = canvasDom.getBoundingClientRect();
            return {
                x: touchEvent.touches[0].clientX - rect.left,
                y: touchEvent.touches[0].clientY - rect.top
            };
        }

        // Prevent scrolling when touching the canvas
        canvas.addEventListener("touchstart", function (e) {
        if (e.target == canvas) {
            e.preventDefault();
        }
        }, false);
        canvas.addEventListener("touchend", function (e) {
        if (e.target == canvas) {
            e.preventDefault();
        }
        }, false);
        canvas.addEventListener("touchmove", function (e) {
        if (e.target == canvas) {
            e.preventDefault();
        }
        }, false);

    }

    function limpa_assinatura()
    {
        clearCanvas();
    }

    function clearCanvas() {
        canvas = document.getElementById("canvas");
        canvas.width = canvas.width;
    }

    function salva_assinatura(){
        canvas = document.getElementById("canvas");
        var dataUrl = canvas.toDataURL();
        document.getElementById("txt_assinatura").value =  dataUrl;
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

        <!-- exibe mes por extenso -->
       
            @if(date("m", strtotime($cautela->dt_cautela)) == "1")
                <?php $mes = 'janeiro'?>
            @elseif(date("m", strtotime($cautela->dt_cautela))== 2)
                <?php $mes = 'fevereiro'?>
            @elseif(date("m", strtotime($cautela->dt_cautela)) == 3)
                <?php $mes = 'março'?>
            @elseif(date("m", strtotime($cautela->dt_cautela)) == 4)
                <?php $mes = 'abril'?>
            @elseif(date("m", strtotime($cautela->dt_cautela)) == 5)
                <?php $mes = 'maio'?>
            @elseif(date("m", strtotime($cautela->dt_cautela)) == 6)
                <?php $mes = 'junho'?>
            @elseif(date("m", strtotime($cautela->dt_cautela)) == 7)
                <?php $mes = 'julho'?>
            @elseif(date("m", strtotime($cautela->dt_cautela)) == 8)
                <?php $mes = 'agosto'?>
            @elseif(date("m", strtotime($cautela->dt_cautela)) == 9)
                <?php $mes = 'setembro'?>
            @elseif(date("m", strtotime($cautela->dt_cautela)) == 10)
                <?php $mes = 'outubro'?>
            @elseif(date("m", strtotime($cautela->dt_cautela)) == 11)
                <?php $mes = 'novembro' ?>
            @elseif(date("m", strtotime($cautela->dt_cautela)) == 12)
                <?php $mes = 'dezembro'?>
            @endif
        
        
        <br><br><br><br>
        Quartel General do Ibirapuera, {{date("d", strtotime($cautela->dt_cautela))}} de {{ $mes }} de {{date("Y", strtotime($cautela->dt_cautela))}}.
        <br><br>
        <img src="{{ $cautela->assinatura }}" alt="">
    </center>

    <br>

    <center>

        @if($cautela->assinatura == "")

            <canvas style="background:beige" id="canvas" class="canvas" width="600" height="100">
                Seu browser não suporta canvas, é hora de trocar!.
            </canvas>
            <br>
        @else
        
            <canvas id="canvas" hidden>
                Seu browser não suporta canvas, é hora de trocar!.
            </canvas>
        
        @endif
        
    
        <b>{{ $pessoa->nome }} - {{ $pessoa->cargo->nome }}</b>
        <br><br>
        
        @if($cautela->assinatura == null)

            <form action="{{route('cautela.salvartermo', [$cautela->id])}}" method="post">
                {{ method_field('PUT')}}
                {{ csrf_field() }}
                <input type="hidden" id="txt_assinatura" name="assinatura">
                <a class="btn red" onclick='limpa_assinatura()'>LIMPAR ASSINATURA</a> 
                <button class="btn green" onclick='salva_assinatura()'>FINALIZAR ASSINATURA</button>
            </form>
        @else
            <a class="btn blue" href="{{ route('cautela.show',$cautela->id) }}">FECHAR</a> 
        @endif
        

    </center>



</div>

</body>
</html>