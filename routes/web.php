<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


// Rota para abrir a página do dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
});