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
            <!--Filtros tabela-->
            <div class="filtros_res d-flex gap-4">
                <!--filtro pelo nome-->
                <form action="{{route('filtrar_caso')}}" method="GET" id="formPesquisarPaciente" name="form_pesquisa_paciente">
                    @csrf
                    <label for="pesquisar">Pesquisar paciente</label>
                    <div class="d-flex gap-1">
                        <input type="text" name="nome_paciente" id="nome_paciente" class="form-control" placeholder="Nome" required style="width: 250px;">
                        <button type="submit" class="btn" style="width: 100px; box-shadow:none">Pesquisar</button>  
                    </div>  
                </form>

                <!--Filtro por tipo de resultado-->
                <form action="" method="GET">
                    @csrf
                    <label for="filtro_resultado">Filtrar Resultado</label>
                    <select name="filtro_resultado" id="select_resultados" class="form-select" style="width: 250px;" required>
                        <option>Todos</option>
                        @foreach($resultados as $resultado)
                            @if($resultado->res_exame == '2')
                                <option value="{{$resultado->res_exame}}">Falciparum</option>
                            @elseif($resultado->res_exame == '3')
                                <option value="{{$resultado->res_exame}}">F+Fg</option>
                            @elseif($resultado->res_exame == '4')
                                <option value="{{$resultado->res_exame}}">Vivax</option>
                            @elseif($resultado->res_exame == '5')
                                <option value="{{$resultado->res_exame}}">F+V</option>
                            @elseif($resultado->res_exame == '6')
                                <option value="{{$resultado->res_exame}}">V+Fg</option>
                            @elseif($resultado->res_exame == '7')
                                <option value="{{$resultado->res_exame}}">Fg</option>
                            @endif  
                        @endforeach
                    </select>
                </form>
            </div>





            <!--Tabela-->
            <div class="tabelaContainer">
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th style="width:80px">COD NOTIF.</th>
                                <th>NOME</th>
                                <th style="width:120px">DATA NASC.</th>
                                <th style="width:120px">DATA NOTIF.</th>
                                <th style="width:120px">INÍCIO SINTOMA</th>
                                <th style="width:120px">INÍCIO TRATA.</th>
                                <!--<th>UNIDADE NOTIFIC.</th>-->
                                <th style="width:200px">TIPO EXAME</th>
                                <th style="width:130px">RESULTADO</th>
                                <th>LOCAL INFEC.</th>
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
                                        <td title="Visualizar ficha de notificação"><a href="#">{{$positivo->nm_paciente}}</a></td>
                                       


                                        @if($positivo->dt_nasci)
                                            <td>{{\Carbon\Carbon::parse($positivo->dt_nasci)->format('d/m/Y')}}</td>
                                        @else
                                            <td>-</td>
                                        @endif
                                        
                                        @if($positivo->dt_noti)
                                            <td>{{\Carbon\Carbon::parse($positivo->dt_noti)->format('d/m/Y')}}</td>
                                        @else
                                            <td>-</td>
                                        @endif
                                        
                                        @if($positivo->dt_sinto)
                                            <td>{{\Carbon\Carbon::parse($positivo->dt_sinto)->format('d/m/Y')}}</td>    
                                        @else
                                            <td>-</td>
                                        @endif
                                        
                                        @if($positivo->dt_trata)
                                            <td>{{\Carbon\Carbon::parse($positivo->dt_trata)->format('d/m/Y')}}</td>   
                                        @else
                                            <td>-</td>
                                        @endif
                                        


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
                                        @endif

                                        <td>{{$positivo->nm_local}}</td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>

                    @isset($msg)
                        <p class="text-center">{{$msg}} <i class="fa-solid fa-triangle-exclamation"></i></p>
                    @endisset
                    
                    <div class="container_paginacao">
                        @isset($positivos)
                            {{ $positivos->links('pagination::bootstrap-5') }}    
                        @endisset   
                    </div>
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