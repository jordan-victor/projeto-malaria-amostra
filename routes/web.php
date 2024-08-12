<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data = date('Y');
    return view('home', ['data'=>$data]);
});


// Rota para abrir a página do dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
});