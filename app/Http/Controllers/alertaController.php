<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class alertaController extends Controller
{
    public function showAlerta(){
        date_default_timezone_set('America/Manaus');
        $data = date('Y');

        return view('dashboards.alerta', ['data'=>$data]);
    }
}
