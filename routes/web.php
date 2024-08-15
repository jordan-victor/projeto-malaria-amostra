<?php
use Illuminate\Support\Facades\Route;

//Rotas da Home
Route::get('/', function () {
    date_default_timezone_set('America/Manaus');
    $data = date('Y');

    return view('home', ['data'=>$data]);
})->name('home');






// Rota para abrir a página do dashboard
Route::get('/localidades', function(){
    date_default_timezone_set('America/Manaus');
    $data = date('Y');

    return view('dashboards.localidades', ['data'=>$data]);
})->name('localidades');