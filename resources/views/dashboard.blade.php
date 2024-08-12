@extends('layouts.layoutPadrao')
@section('title', 'Dashboard')

@section('content')
<h1>Malariômetro 2024 - Positivos por Localidade</h1>




<!----------1. SEÇÃO DE FILTROS------------>
<main class="dashContainer">
  <section class="filtros card p-2">
    <!-- filtro por Disas -->
    <div>
      <p>Distrito</p>
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
    <div>
      <p>Unidade de Saúde</p>
      <select name="" id="" class="form-select">
        <option value="">Selecione a unidade</option>
      </select>
    </div>
    

    <!-- filtro se a localidade é fluvial ou terrestre -->
     <div>
      <p>Tipo de localidade</p>
      <select name="" id="" class="form-select">
        <option value="">Selecione o tipo</option>
      </select>
     </div>
    

    <!-- Filtro do tipo de coleta (gota espessa, Teste Rápido ou Técnicas Moleculares) -->
     <div>
      <p>Tipo de Exame (coleta)</p>
      <select name="" id="" class="form-select">
        <option value="">Selecione o tipo</option>
      </select>
     </div>
  </section>







  <!------------2. SEÇÃO DOS INDICADORES E TOTAIS------------>
  <!-- Seção Total de Notificações -->
 <img src="" alt="icone das notificações">
 <p>Notificações</p>
 <p>Total de notificações</p>
 <p>LVC:</p>

 <!-- Seção total de positivos -->
  <img src="" alt="icone dos positivos">
  <p>Positivos</p>
  <p>Total de positivos</p>
  <p>LVC:</p>
  <p>Falciparum</p><p>LVC: </p>
  <p>F+V</p><p>LVC: </p>
  <p>Vívax</p><p>LVC: </p>

 <!-- Seção autóctones e importados -->
  <img src="" alt="icone dos autóctones">
  <p>Autóctones</p>
  <p>LVC</p>

  <img src="" alt="icone dos importados">
  <p>Importados</p>
  <p>LVC</p>

  <!-- Seção dos grupos prioritários -->
  <img src="" alt="icone gestante">
  <p>Gestantes</p>
  <p>LVC:</p>

  <img src="" alt="icone idoso ">
  <p>Idosos</p>
  <p>LVC:</p>

  <img src="" alt="icone criança">
  <p>Crianças</p>
  <p>LVC:</p>











  <!------------3. SEÇÃO DOS GRÁFICOS E TABELAS------------>
  <!-- Seção Gráfico da positividade -->
  <p>Positividade por Semana Epidemiológica</p>

  <!-- Seção Locais prováveis de infecção -->
  <p>Locais Prováveis de Infecção</p>
  <!-- Seção Unidades Notificantes -->
  <p>Unidades Notificantes</p>
</main>




@endsection