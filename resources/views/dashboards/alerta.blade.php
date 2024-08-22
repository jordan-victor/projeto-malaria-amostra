@extends('layouts.layoutPadrao')
@section('title', 'Alerta Malária')

@section('content')
<h1>Acompanhamento de Casos</h1>

<div id="alertaContainer">
    <div class="card p-3">
        <!--CAMPO DE PESQUISA-->
        <section class="mb-5">
            <form action="{{route('buscarPaciente')}}" method="GET" id="formAlerta">
                @csrf
                <div class="d-flex flex-column justify-content-center">
                    <h4>Buscar Paciente</h4>
                    <input type="text" class="form-control" name="codConsulta" id="codConsulta" placeholder="Código da consulta">
                    <button type="submit" class="btn mt-2">Pesquisar</button> 
                </div>
            </form>
        </section>
        


        
        <!--SEÇÃO DE EXIBIÇÃO DE DADOS DO CASO PESQUISADO-->
        <h4>Dados do paciente</h4>
        <section class="dadosPaciente">
            <div class="d-flex flex-column justify-content-center mb-3">
                <p>Nome do paciente</p>
                <input type="text" class="form-control" name="codConsulta" id="codConsulta" placeholder="Código da consulta"> 
            </div>

            <div class="d-flex flex-column justify-content-center mb-3">
                <p>Data da notificação</p>
                <input type="text" class="form-control" name="codConsulta" id="codConsulta" placeholder="Código da consulta"> 
            </div>

            <div class="d-flex flex-column justify-content-center mb-3">
                <p>Buscar Paciente</p>
                <input type="text" class="form-control" name="codConsulta" id="codConsulta" placeholder="Código da consulta"> 
            </div>

            <div class="d-flex flex-column justify-content-center mb-3">
                <p>Tipo do exame</p>
                <input type="text" class="form-control" name="codConsulta" id="codConsulta" placeholder="Código da consulta"> 
            </div>

            <div class="d-flex flex-column justify-content-center mb-3">
                <p>Resultado (Código)</p>
                <input type="text" class="form-control" name="codConsulta" id="codConsulta" placeholder="Código da consulta"> 
            </div>

            <div class="d-flex flex-column justify-content-center mb-3">
                <p>Código da notificação</p>
                <input type="text" class="form-control" name="codConsulta" id="codConsulta" placeholder="Código da consulta"> 
            </div>

            <div class="d-flex flex-column justify-content-center mb-3">
                <p>Unidade notificante</p>
                <input type="text" class="form-control" name="codConsulta" id="codConsulta" placeholder="Código da consulta"> 
            </div>

            <div class="d-flex flex-column justify-content-center mb-3">
                <p>Local provável de infecção</p>
                <input type="text" class="form-control" name="codConsulta" id="codConsulta" placeholder="Código da consulta"> 
            </div>
        </section>
    </div>
</div>
@endsection