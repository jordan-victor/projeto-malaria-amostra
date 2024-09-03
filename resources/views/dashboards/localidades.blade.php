@extends('layouts.layoutPadrao')
@section('title', 'Dashboard')

@section('content')
<h1>Malariômetro {{$data}} - Positivos por Localidade</h1>




<!----------1. SEÇÃO DE FILTROS------------>
<main class="dashContainer">
  <section class="filtros card p-2 mb-3 row">
    <div class="row d-flex" title="Limpar filtros">
        <div id="limpar">
          <p><i class="fa-solid fa-filter fs-5"></i> Limpar filtros</p>
        </div>
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
        <option>Selecione o tipo</option>
        @foreach($tp_exames as $tp_exame)
          @if($tp_exame->tp_exame == '1')
            <option value="{{$tp_exame->tp_exame}}">Gota espessa/Esfregaço</option>
          @elseif($tp_exame->tp_exame == '2')
            <option value="{{$tp_exame->tp_exame}}">Teste rápido</option>
          @elseif($tp_exame->tp_exame == '3')
            <option value="{{$tp_exame->tp_exame}}">Técnicas moleculares</option>
          @endif
        @endforeach
      </select>
     </div>
  </section>







  <!------------2. SEÇÃO DOS INDICADORES E TOTAIS------------>
  <section class="shadow-none border-0 row d-flex flex-wrap gap-2 mb-3 bg-transparent">
    <!-- Seção Total de Notificações -->
    <div class="card subCard p-2 d-flex flex-column" style="flex:1">
      <h4>Notificações</h4>

      <div class="d-flex justify-content-center">
        <div><img src="/img/imgs_localidade/Notificando.png" alt="icone das notificações"></div>
        <h4 class="tt_res">{{number_format($notificacoes, 0, '', '.')}}</h4>
      </div>
      
      <p class="text-center">LVC: {{number_format($lvc_notificacoes, 0, '', '.')}}</p>
    </div>
    

    <!-- Seção total de positivos e LVC-->
    <div class="card subCard p-2 col-4 d-flex flex-column">
      <div class="d-flex gap-3 justify-content-center">
        <div class="d-flex justify-content-center">
          <div><img src="/img/imgs_localidade/positivo.png" alt="icone dos positivos"></div>
          <div>
            <h4>Positivos</h4>
            <h4 class="tt_res">{{number_format($positivos, 0, '', '.')}}</h4>
          </div>
        </div>

        <div class="d-flex justify-content-center">
          <div><img src="/img/imgs_localidade/laminas.png" alt="icone dos positivos"></div>
          <div>
            <h4>LCV positiva</h4>
            <h4 class="tt_res">{{number_format($tt_lvc, 0, '', '.')}}</h4>
          </div>
        </div>
      </div>


      <div class="d-flex justify-content-center justify-content-between text-center">
        <p>Falciparum <br> {{number_format($tt_falciparum,'0', '', '.')}} <br><span style="font-size:13px">LVC: {{number_format($lvc_falciparum,'0', '', '.')}}</span></p>
        <p>Vívax<br> {{number_format($tt_vivax, 0, '', '.')}} <br><span style="font-size:13px">LVC: {{number_format($lvc_vivax, 0, '', '.')}}</span></p>
        <p>F+V <br> {{number_format($tt_fv, 0, '', '.')}} <br><span style="font-size:13px">LVC: {{number_format($lvc_fv, 0, '', '.')}}</span></p>
        <p>Malariae <br> {{number_format($tt_malarie, 0, '', '.')}} <br><span style="font-size:13px">LVC: {{number_format($lvc_malarie, 0, '', '.')}}</span></p>
        <p>Ovale <br> {{number_format($tt_ovale, 0, '', '.')}} <br><span style="font-size:13px">LVC: {{number_format($lvc_ovale, 0, '', '.')}}</span></p>
          <p>N.Falciparum <br> {{number_format($tt_Nfalciparum, 0, '', '.')}} <br><span style="font-size:13px">LVC: {{number_format($lvc_Nfalciparum, 0, '', '.')}}</span></p>
      </div>
    </div>


    <!-- Seção autóctones e importados -->
    <div class="card p-2 subCard col-2 d-flex flex-column justify-content-center gap-3" id="auto_e_impo" style="position:relative">
      <div class="d-flex justify-content-center gap-1">
        <div><img src="/img/imgs_localidade/autoctones.png" alt="icone dos autóctones"></div>
        <div>
          <h4>Autóctones</h4>
          <div class="d-flex justify-content-between align-items-center">
            <div style="line-height:15px">{{number_format($tt_autoctones, 0, '', '.')}}</div>
            <div style="font-size:13px;">LVC: {{$lvc_autoctones}}</div>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-center gap-1">
        <div><img src="/img/imgs_localidade/importados.png" alt="icone dos importados"></div>
        <div>
          <h4>Importados</h4>
          <div class="d-flex justify-content-between align-items-center">
            <div style="line-height:15px">{{number_format($tt_importados, 0, '', '.')}}</div>
            <div style="font-size:13px">LVC: {{$lvc_importados}}</div>
          </div> 
        </div>
      </div>

      <div class="d-flex justify-content-center gap-1">
        <div><img src="/img/imgs_localidade/nao-informado.png" alt="icone dos importados" style="width:50px!important"></div>
        <div>
          <h4>Não informado</h4>
          <div class="d-flex justify-content-center align-items-center">
            <div style="line-height:15px">{{number_format($tt_nInformado, 0, '', '.')}}</div>
          </div> 
        </div>
      </div>
     
    </div>


    <!-- Seção dos grupos prioritários -->
    <div class="card p-2 subCard d-flex flex-column col-4">
      <h4><i class="fa-solid fa-filter fs-5"></i> Grupos Prioritários</h4>
          
      <div class="d-flex justify-content-start flex-column justify-content-center">
        <div class="d-flex gap-1 w-100 justify-content-center justify-content-between">
          <div class="d-flex gap-1 prioritario" title="Filtrar ">
            <div><img src="/img/imgs_localidade/gestante.png" alt="icone idoso"></div>
            <p>Gestantes <br> {{$tt_gestante}} <br><span style="font-size:13px"> LVC: {{$lvc_gestante}}</span></p>
          </div>
          
          <div class="d-flex gap-1 prioritario" title="Filtrar idosos">
            <div><img src="/img/imgs_localidade/idosos.png" alt="icone idoso"></div>
            <p>Idosos <br> {{$tt_idoso}} <br><span style="font-size:13px">LVC: {{$lvc_idoso}}</span></p>
          </div>
          
          <div class="d-flex gap-1 prioritario" title="Filtrar crianças">
            <div><img src="/img/imgs_localidade/criancas.png" alt="icone criança"></div>
            <p>Crianças <br> {{$tt_crianca}} <br><span style="font-size:13px">LVC: {{$lvc_crianca}}</span></p>
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


  <section class="row d-flex flex-row gap-2 mb-3">
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
              <th>Cod+MunIBGE</th>
              <th>Nome local</th>
              <th>Positivo <i class="fa-solid fa-sort-down fs-6"></i></th>
              <th>Idoso <i class="fa-solid fa-sort-down fs-6"></i></th>
              <th>Criança <i class="fa-solid fa-sort-down fs-6"></i></th>
              <th>Gestante <i class="fa-solid fa-sort-down fs-6"></i></th>
              <th>Falcip. <i class="fa-solid fa-sort-down fs-6"></i></th>
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
              <th>Positivos <i class="fa-solid fa-sort-down fs-6"></i></th>
              <th>Falcip. <i class="fa-solid fa-sort-down fs-6"></i></th>
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
    </div>
  </section>









  <!--MAPA DE LOCALIDADES-->
  <section class="row card p-2">
    <h4 style="text-align:left">Positivos por localidade (Coordenada Geográfica)</h4>

    <div class="mapaContainer">
      <div id="mapaLocalidades" style="height: 500px;"></div>
    </div>
  </section>
</main>









<!--------------------FUNÇÕES JS---------------------------->
<script>
  //FUNÇÃO QUE GERA O GRÁFICO POSITIVIDADE POR SEMANA
  function dashLocalidade(){
      //gerando as 52 labels de semanas
      let semanas = []
      let i = 0
      while(i<52){
          i++
          semanas.push(i)
      }

      //teste com dados falsos, apagar depois
      let datas = []
      let datas2 = []
      let datas3 = []

      let cont = 0
      let data = 1000
      let data2 = 2100
      let data3 = 1600

      while(cont<52){
          cont++

          data = data + 300
          data2 = data2 + 150
          data3 = data3 + 124

          if(data > 7000){
              data = 3400
          }
          if(data2 > 5600){
              data2 = 3100
          }
          if(data3 > 6200){
              data3 = 2400
          }

          datas.push(data)
          datas2.push(data2)
          datas3.push(data3)
      }
      //---------------------------------------------


      //gerando o gráfico
      var ctxPie = document.getElementById('positivos').getContext('2d');
      var pieChart = new Chart(ctxPie, {
          type: 'line',
          data: {
              labels: semanas,

              //Configurações dos dados
              datasets: [
                  {
                      label: 'positivos 2024',
                      data: {{'['.$tt_semanas_string.']'}},//Total de Positivos de cada semana
                      backgroundColor: [
                        '#DC3545',
                          
                      ],
                      borderColor: [
                        '#DC3545',
                      ],
                      borderWidth: 1
                  },
              ],
          },



          //ESTILIZAÇÃO GERAL DO GRÁFICO
          options: {
              plugins: {
                  title: {
                      display: true,
                      text: 'Positividade por semana',
                      color: '#2a9e7f',
                      font: {
                          size: 21,
                          family:'arial',
                      },
                      padding: {
                          top: 10,
                          bottom: 30
                      },
                  }
              },
              scales: {
                  x: {
                      grid: {
                          display: false, // Remove as linhas verticais de grade
                      },
                  },
                  y: {
                      beginAtZero: false
                  }
              }
          }
      });
  }









  //FUNÇÃO PARA GERAR O MAPA DE LOCALIDADES
  function mapaLocalidades(){ 
      // Inicialize o mapa e defina a visualização inicial
      const mapa = L.map('mapaLocalidades').setView([-3.1190275, -60.0217314], 11); // Coordenadas de Manaus

      // Adicione uma camada de mapa (Tile Layer)
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors'
      }).addTo(mapa);

      // Adicione marcadores (pontos) no mapa
      let latitude = "-3.145377"
      let longitude = "-60.054570"
      let positivo = 20
      
      const marker4 = L.marker([latitude, longitude]).addTo(mapa).bindPopup(`Latitude: ${latitude}<br>Longitude: ${longitude}<br> Positivos: ${positivo}`);   
  }

  dashLocalidade()
  mapaLocalidades()
</script>
@endsection