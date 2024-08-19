@extends('layouts.layoutPadrao')
@section('title', 'Dashboard')

@section('content')
<h1>Malariômetro {{$data}} - Positivos por Localidade</h1>




<!----------1. SEÇÃO DE FILTROS------------>
<main class="dashContainer">
  <section class="filtros card p-2 mb-3 row">
    <div class="col-1 d-flex-row" id="limpar">
      <i class="fa-solid fa-filter"></i>
      <p>Limpar</p>
    </div>

    <!-- filtro por Disas -->
    <div class="col">
      <h4>Distrito</h4>
      <select name="" id="" class="form-select">
        <option value="">Selecione o distrito</option>
        <option value="">1</option>
        <option value="">2</option>
        <option value="">3</option>
        <option value="">4</option>
        <option value="">5</option>
        <option value="">6</option>
        <option value="">7</option>
      </select>
    </div>
    
    <!-- filtro por unidades -->
    <div class="col">
      <h4>Unidade de Saúde</h4>
      <select name="" id="" class="form-select">
        <option value="">Selecione a unidade</option>
      </select>
    </div>
    
    <!-- filtro se a localidade é fluvial ou terrestre -->
     <div class="col">
      <h4>Tipo de localidade</h4>
      <select name="" id="" class="form-select">
        <option value="">Selecione o tipo</option>
      </select>
     </div>
    
    <!-- Filtro do tipo de coleta (gota espessa, Teste Rápido ou Técnicas Moleculares) -->
     <div class="col">
      <h4>Tipo de Exame (coleta)</h4>
      <select name="" id="" class="form-select">
        <option value="">Selecione o tipo</option>
      </select>
     </div>
  </section>







  <!------------2. SEÇÃO DOS INDICADORES E TOTAIS------------>
  <section class="shadow-none border-0 row d-flex flex-row gap-2 mb-3 bg-transparent">
    <!-- Seção Total de Notificações -->
    <div class="card subCard p-2 col-2 d-flex flex-column">
      <h4>Notificações</h4>

      <div class="d-flex justify-content-center">
        <div><img src="/img/imgs_localidade/Notificando.png" alt="icone das notificações"></div>
        <h4>70000</h4>
      </div>
      
      <p class="text-center">LVC:</p>
    </div>
    

    <!-- Seção total de positivos -->
    <div class="card subCard p-2 col-3 d-flex flex-column">
      <div class="d-flex justify-content-center">
        <div><img src="/img/imgs_localidade/positivo.png" alt="icone dos positivos"></div>
        <div>
          <h4>Positivos</h4>
          <h4>9999</h4>
        </div>
      </div>
    
      <div class="d-flex justify-content-center gap-5">
        <p>Falciparum <br><span>LVC:</span> 999</p>
        <p>F+V <br><span>LVC:</span> 999</p>
        <p>Vívax<br><span>LVC:</span> 999</p>
      </div>
    </div>


    <!-- Seção autóctones e importados -->
    <div class="card p-2 subCard col-2 d-flex flex-column">
      <div class="d-flex justify-content-center gap-1">
        <div><img src="/img/imgs_localidade/autoctones.png" alt="icone dos autóctones"></div>
        <div>
          <h4>Autóctones</h4>
          <p>70000 <span>LVC:</span></p>
        </div>
      </div>
      
      <div class="d-flex justify-content-center gap-1">
        <div><img src="/img/imgs_localidade/importados.png" alt="icone dos importados"></div>
        <div>
          <h4>Importados</h4>
          <p>70000 <span>LVC:</span></p> 
        </div>
      </div>
    </div>


    <!-- Seção dos grupos prioritários -->
    <div class="card p-2 subCard d-flex flex-column col">
      <h4 class="mt-0">Grupos Prioritários</h4>
      <div class="d-flex justify-content-start flex-column justify-content-center">
        <div class="d-flex w-100 justify-content-center justify-content-between">
          <div class="d-flex">
            <div><img src="/img/imgs_localidade/gestante.png" alt="icone gestante"></div>
            <p>Gestantes <br> <span>LVC:</span></p>
          </div>
          
          <div class="d-flex gap-1">
            <div><img src="/img/imgs_localidade/idosos.png" alt="icone idoso"></div>
            <p>Idosos <br> <span>LVC:</span></p>
          </div>
          
          <div class="d-flex gap-1">
            <div><img src="/img/imgs_localidade/criancas.png" alt="icone criança"></div>
            <p>Crianças <br> <span>LVC:</span></p>
          </div>
        </div>
      </div>
    </div>
  </section>










  <!------------3. SEÇÃO DOS GRÁFICOS E TABELAS------------>
  <section class="card row mb-3">
    <div class="positivosContainer w-100">
      <canvas id="positivos" height="100"></canvas>
    </div>
  </section>


  <section class="row d-flex flex-row gap-2">
    <!-- Seção Locais prováveis de infecção -->
    <div class="card col p-2" id="locInfec">
      <div id="infecHeader">
        <h4>Locais Prováveis de infecção</h4>
        <p><i class="fa-solid fa-square text-danger"></i> Autóctones</p>
        <button>Exibir local em mapa</button>
      </div>
      
      <div class="row p-3">
        <table class="tabela">
          <thead>
            <tr>
              <th style="">Cod+MunIBGE</th>
              <th style="">Nome local</th>
              <th style="padding-right: 5px;">Positivo</th>
              <th style="">Idoso</th>
              <th style="">Criança</th>
              <th style="">Gestante</th>
              <th style="">Falcip.</th>
            </tr>
          </thead>

          
          <tbody>
            <tr>
              <td>hefuhfuh</td>
              <td>efeefeff rggrg ssfvrrfve</td>
              <td>feffeef</td>
              <td>feeffef</td>
              <td>fefeeef</td>
              <td>effeefeef</td>
              <td>fefeeef</td>
            </tr>
            <tr>
              <td>hefuhfuh</td>
              <td>efeefvf rrrggrrreffefe</td>
              <td>feffeef</td>
              <td>feeffef</td>
              <td>fefeeef</td>
              <td>effeefeef</td>
              <td>fefeeef</td>
            </tr>
            <tr>
              <td>hefuhfuh</td>
              <td>efeeferrvrr fvrrrvrvrrffefe</td>
              <td>feffeef</td>
              <td>feeffef</td>
              <td>fefeeef</td>
              <td>effeefeef</td>
              <td>fefeeef</td>
            </tr>
            <tr>
              <td>hefuhfuh</td>
              <td>efeeferrrrv fvvfvfvfvffefe</td>
              <td>feffeef</td>
              <td>feeffef</td>
              <td>fefeeef</td>
              <td>effeefeef</td>
              <td>fefeeef</td>
            </tr>
            <tr>
              <td>hefuhfuh</td>
              <td>efeeffvvfvffvv fvfvvfeffefe</td>
              <td>feffeef</td>
              <td>feeffef</td>
              <td>fefeeef</td>
              <td>effeefeef</td>
              <td>fefeeef</td>
            </tr>
            <tr>
              <td>hefuhfuh</td>
              <td>efeeffvfvvfv ffvfeffefe</td>
              <td>feffeef</td>
              <td>feeffef</td>
              <td>fefeeef</td>
              <td>effeefeef</td>
              <td>fefeeef</td>
            </tr>
            <tr>
              <td>hefuhfuh</td>
              <td>efeeffvfvfv fv rrrrgrgeffefe</td>
              <td>feffeef</td>
              <td>feeffef</td>
              <td>fefeeef</td>
              <td>effeefeef</td>
              <td>fefeeef</td>
            </tr>
            <tr>
          </tbody>

          <tfoot>
            <tr>
              <th>Total</th>
              <th></th>
              <th>4.046</th>
              <th>349</th>
              <th>503</th>
              <th>41</th>
              <th>99</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>


    <!-- Seção Unidades Notificantes -->
    <div class="card col-5 p-2 d-flex flex-column">
      <h4 style="text-align:left">Unidades Notificantes</h4>
      <p style="font-size:12px; line-height:0px">(Origem das notificações positivas por localidade)</p> 
      
      <div id="tabela2" class="row px-3">
        <table class="tabela">
          <thead>
            <tr>
              <th style="">Cod+MunIBGE</th>
              <th style="">Nome</th>
              <th>Positivos</th>
              <th>Falcip.</th>
            </tr>
          </thead>

          
          <tbody>
            <tr>
              <td>hefuhfuh</td>
              <td>efeefeff rggrg ssfvrrfve</td>
              <td>feffeef</td>
              <td>feeffef</td>
            </tr>
            <tr>
              <td>hefuhfuh</td>
              <td>efeefvf rrrggrrreffefe</td>
              <td>feffeef</td>
              <td>feeffef</td>
            </tr>
            <tr>
              <td>hefuhfuh</td>
              <td>efeeferrvrr fvrrrvrvrrffefe</td>
              <td>feffeef</td>
              <td>feeffef</td>
            </tr>
            <tr>
              <td>hefuhfuh</td>
              <td>efeeferrrrv fvvfvfvfvffefe</td>
              <td>feffeef</td>
              <td>feeffef</td>
            </tr>
            <tr>
              <td>hefuhfuh</td>
              <td>efeeffvvfvffvv fvfvvfeffefe</td>
              <td>feffeef</td>
              <td>feeffef</td>
            </tr>
            <tr>
              <td>hefuhfuh</td>
              <td>efeeffvfvvfv ffvfeffefe</td>
              <td>feffeef</td>
              <td>feeffef</td>
            </tr>
            <tr>
              <td>hefuhfuh</td>
              <td>efeeffvfvfv fv rrrrgrgeffefe</td>
              <td>feffeef</td>
              <td>feeffef</td>
            </tr>
            <tr>
              <td>hefuhfuh</td>
              <td>efeeffvfvfv fv rrrrgrgeffefe</td>
              <td>feffeef</td>
              <td>feeffef</td>
            </tr>
            <tr>
              <td>hefuhfuh</td>
              <td>efeeffvfvfv fv rrrrgrgeffefe</td>
              <td>feffeef</td>
              <td>feeffef</td>
            </tr>
          </tbody>

          <tfoot>
            <tr>
              <th>Total</th>
              <th></th>
              <th>4.046</th>
              <th>99</th>
            </tr>
          </tfoot>
        </table>
      </div>
     
      
      <!-- Seção Gráfico da positividade -->
    </div>
  </section>
</main>




@endsection