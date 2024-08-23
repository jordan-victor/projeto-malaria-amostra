@extends('layouts.layoutPadrao')
@section('title', 'Alerta Malária')

@section('content')
<h1>Acompanhamento de Casos</h1>

<div id="alertaContainer">
    <div class="dadosContainer">
        <!--BOTÃO MOSTRAR TODOS OS CASOS-->
        <section class="mb-3 p-2">
            <form action="{{route('casos')}}" method="GET" id="formAlerta">
                @csrf
                <div class="d-flex flex-column justify-content-center">
                    <button type="submit" class="btn mt-2">Mostrar casos</button> 
                </div>
            </form>
        </section>
        


        

        




        <!--SEÇÃO DE EXIBIÇÃO DE DADOS DOS PACIENTES-->
        <section class="card dadosPaciente p-2">
            <h4>DADOS DOS PACIENTES</h4>
            <!--Filtro tabela-->
            <form action="" method="GET" id="formPesquisarPaciente">
                <label for="pesquisar">Pesquisar paciente</label>
                <div class="d-flex gap-1">
                    <input type="text" name="" id="pesquisar" class="form-control" placeholder="Código da Notificação" required style="width: 300px;">
                    <button type="submit" class="btn" style="width: 100px; box-shadow:none">Pesquisar</button>  
                </div>  
            </form>


            <!--Tabela-->
            <div class="tabelaContainer">
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>COD NOTIFIC.</th>
                                <th>NOME</th>
                                <th>DATA NOTIFIC.</th>
                                <!--<th>UNIDADE NOTIFIC.</th>-->
                                <th>TIPO EXAME</th>
                                <th>RESULTADO</th>
                                <!-- <th>LOCAL INFEC.</th> -->
                                <!-- <th>DISA DE INFEC.</th>
                                <th>DISA DE ACOMPANHAMENTO</th>
                                <th>ATENDIDO NA UBS?</th>
                                <th>LVC 1</th>
                                <th>LVC 2</th>
                                <th>LVC 3</th> -->
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>34373665</td>
                                <td>JORDAN VICTOR BARREIROS DA COSTA</td>
                                <td>23/08/2024</td>
                                <td>TIPO EXAME</td>
                                <td>POSITIVO</td>
                            </tr>
                            <tr>
                                <td>34373665</td>
                                <td>JORDAN VICTOR BARREIROS DA COSTA</td>
                                <td>23/08/2024</td>
                                <td>TIPO EXAME</td>
                                <td>POSITIVO</td>
                            </tr>
                            <tr>
                                <td>34373665</td>
                                <td>JORDAN VICTOR BARREIROS DA COSTA</td>
                                <td>23/08/2024</td>
                                <td>TIPO EXAME</td>
                                <td>POSITIVO</td>
                            </tr>
                            <tr>
                                <td>34373665</td>
                                <td>JORDAN VICTOR BARREIROS DA COSTA</td>
                                <td>23/08/2024</td>
                                <td>TIPO EXAME</td>
                                <td>POSITIVO</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!---------->

            <!--
            <div>
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
            </div>
        -->
        </section>
    </div>
</div>
@endsection