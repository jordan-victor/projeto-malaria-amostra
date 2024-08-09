@extends('layouts.layoutPadrao')
@extends('layouts.navbar')

@section('title', 'Dashboard')

@section('content')

<h1>Malariômetro 2024 - Positivos por Localidade</h1>

<!-- filtro por Disas -->
  <p>Distrito</p>
  <p><i>Caixa de seleção</i></p>

<!-- filtro por unidades -->
  <p>Unidade de Saúde</p>
  <p><i>Caixa de seleção</i></p>

<!-- filtro se a localidade é fluvial ou terrestre -->
  <p>Tipo de localidade</p>
  <p><i>Caixa de seleção</i></p>

<!-- Filtro do tipo de coleta (gota espessa, Teste Rápido ou Técnicas Moleculares) -->
  <p>Tipo de Exame (coleta)</p>
  <p><i>Caixa de seleção</i></p>

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

<!-- Seção Gráfico da positividade -->
  <p>Positividade por Semana Epidemiológica</p>

<!-- Seção Locais prováveis de infecção -->
  <p>Locais Prováveis de Infecção</p>
<!-- Seção Unidades Notificantes -->
  <p>Unidades Notificantes</p>






@endsection