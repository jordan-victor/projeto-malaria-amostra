<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data = date('Y');
    return view('home', ['data'=>$data]);
});
