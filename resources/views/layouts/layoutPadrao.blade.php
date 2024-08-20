<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Malária Manaus @yield('title')</title>

    
    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--FONTES E ÍCONES-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.2/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <!--ESTILOS-->
    <link rel="stylesheet" href="/css/geral.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/localidade.css">
</head>

<body id="body">
    <!--TODO O CONTEÚDO DAS OUTRAS PÁGINAS SERÃO IMPORTADOS PARA DENTRO DESSE CONTAINER-->
    <div class="corpo">
       <header>
            @include('layouts.navbar')
       </header>

        @yield('content')   
    </div>





   
   





   <footer>
        <div class="container">
            <img src="/img/geral/prefeitura.png" width="250px" alt="">
            
            <div>
                <p>&copy;{{$data}} - Prefeitura de Manaus</p>
                <p>Secretaria Municipal de Saúde - SEMSA</p>
                <p>Departamento do Distrito de Saúde Rural - DISAR</p>
                <p>Gerência de Inteligência de Dados Rural - GEIND-R</p> 
            </div>        
        </div>
   </footer>  
   
</body>
<!--biblioteca charts.js-->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-chart-geo@3"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/chartjs-chart-geo"></script>-->


<!--scripts js das páginas-->
<script src="/js/localidade.js"></script>


<!--bootstrap-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="/b_js/bootstrap.min.js"></script>
</html>