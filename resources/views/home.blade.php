@extends('layouts.layoutPadrao')
@section('content')


<main id="home">
    <header class="container">
        <h1 style="line-height:70px">MONITORAMENTO DIGITAL</h1>
        <section class="cards1">
            <a href="{{route('localidades')}}">
                <div class="carta">
                    <img src="/img/home/localidades.png" alt="Malariômetro Localidades" width="150">
                </div>
            </a>

            <div class="imgHome logo">
                <!--<img src="/img/home/familia.png" alt="Ilustração de uma família">-->
                <img src="/img/home/animacao.gif" alt="Logo">
            </div>

            <div class="carta">
                <img src="/img/home/notificantes.png" alt="Unidades Notificantes" width="150">
            </div>
        </section>



        <section class="cards2">
            <a href="{{route('alerta')}}">
                <div class="carta">
                    <img src="/img/home/alerta.png" alt="Alerta Malária" style="width: 160px;">
                </div>
            </a>
            

            <div class="carta">
                <img src="/img/home/indicadores.png" alt="Malariômetro Localidades" width="150">
            </div>
        </section>



        <section class="cards3">
            <div class="carta">
                <img src="/img/home/criadouros.png" alt="Criadouros" width="150">
            </div>

            <a href="{{route('ficha-notificacao')}}">
                <div class="carta">
                    <img src="/img/home/notificacao.png" alt="Malariômetro Localidades" width="150">
                </div>
            </a>
        </section>
    </header>
    
</main>
@endsection