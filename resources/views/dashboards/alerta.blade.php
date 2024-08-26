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
            <form action="{{route('filtrar_caso')}}" method="GET" id="formPesquisarPaciente">
                @csrf
                <label for="pesquisar">Pesquisar paciente</label>
                <div class="d-flex gap-1">
                    <input type="text" name="cod_notific" id="pesquisar" class="form-control" placeholder="Nome do paciente" required style="width: 300px;">
                    <button type="submit" class="btn" style="width: 100px; box-shadow:none">Pesquisar</button>  
                </div>  
            </form>


            <!--Tabela-->
            <div class="tabelaContainer">
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th style="width:100px">COD NOTIFIC.</th>
                                <th>NOME</th>
                                <th style="width:130px">DATA NOTIFIC.</th>
                                <!--<th>UNIDADE NOTIFIC.</th>-->
                                <th style="width:200px">TIPO EXAME</th>
                                <th style="width:130px">RESULTADO</th>
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
                            @isset($positivos)
                                @foreach($positivos as $positivo)
                                    <tr>
                                        <td>{{$positivo->cod_noti}}</td>
                                        <td>{{$positivo->nm_paciente}}</td>
                                        <td>{{$positivo->dt_noti}}</td>


                                        @if($positivo->tp_exame == '1')
                                            <td>Gota espessa/Esfregaço</td>
                                        @elseif($positivo->tp_exame == '2')
                                            <td>Teste rápido</td>
                                        @elseif($positivo->tp_exame == '3')
                                            <td>Técnicas moleculares</td>
                                        @endif


                                        @if($positivo->res_exame == '2')
                                            <td>Falciparum</td>
                                        @elseif($positivo->res_exame == '3')
                                            <td>F+Fg</td>
                                        @elseif($positivo->res_exame == '4')
                                            <td>Vivax</td>
                                        @elseif($positivo->res_exame == '5')
                                            <td>F+V</td>
                                        @elseif($positivo->res_exame == '6')
                                            <td>V+Fg</td>
                                        @elseif($positivo->res_exame == '7')
                                            <td>Fg</td>
                                        @elseif($positivo->res_exame == '8')
                                            <td>Malariae</td>
                                        @elseif($positivo->res_exame == '9')
                                            <td>F+M</td>
                                        @elseif($positivo->res_exame == '10')
                                            <td>Ovale</td>
                                        @elseif($positivo->res_exame == '11')
                                            <td>Não Falciparum</td>
                                        elseif(empty($positivo->res_exame))
                                           <td>-</td> 
                                        @endif
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>

                    @empty($msg)
                        <p>{{$msg}}</p>
                    @endempty
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