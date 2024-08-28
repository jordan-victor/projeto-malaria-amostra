<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Outroteste;

class localidadesController extends Controller
{
    public function showLocalidades(){
        date_default_timezone_set('America/Manaus');
        $data = date('Y');

        $notificacoes = Outroteste::count();
    
        $positivos = Outroteste::where('res_exame', '!=', 1)
                                ->where('id_lvc', '!=', 1)
                                ->count();
        //-----------------Teste, apagar depois----------------------
        $teste = [1,2,3,4];
        //-----------------------------------------------------------
        return view('dashboards.localidades', ['data'=>$data, 'teste'=>$teste, 'notificacoes'=>$notificacoes, 'positivos'=>$positivos]);
    }
}
