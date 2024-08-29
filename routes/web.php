<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\alertaController;
use App\Http\Controllers\notificacaoController;
use App\Http\Controllers\localidadesController;





//Rotas da Home
Route::get('/', function () {
    date_default_timezone_set('America/Manaus');
    $data = date('Y');

    return view('home', ['data'=>$data]);
})->name('home');






//Rota para abrir a página do dashboard localidade
Route::get('/localidades', [localidadesController::class, 'showLocalidades'])->name('localidades');





//Rotas da tela Alerta Malária
Route::get('/alerta', [alertaController::class, 'showAlerta'])->name('alerta');
Route::get('/casos', [alertaController::class, 'mostrarCasos'])->name('casos');
Route::get('/filtrar_nome', [alertaController::class, 'filtrar_nome'])->name('filtrar_nome');
Route::get('filtrar_res', [alertaController::class, 'filtrar_res'])->name('filtrar_res');





//Rotas da tela Notificações
Route::get('/notificacao', [notificacaoController::class, 'showNotificacao'])->name('notificacao');
