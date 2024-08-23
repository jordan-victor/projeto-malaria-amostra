<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class notificacaoController extends Controller
{
    public function showNotificacao(){
        return view('notificacao');
    }
}
