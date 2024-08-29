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

        //Total notificações
        $notificacoes = Outroteste::count();
    
        //Total positivos
        $positivos = Outroteste::where('res_exame', '!=', 1)
                                ->where('id_lvc', '!=', 1)
                                ->count();
        
        //Total LVC positiva
        $tt_lvc = Outroteste::where('res_exame', '!=', 1)
                            ->where('id_lvc', '=', 1)
                            ->count();

        //Total Falciparum
        $tt_falciparum = Outroteste::where('id_lvc', '!=', 1)
                                    ->whereIn('res_exame', [2, 3, 7, 9])
                                    ->count();
        
        //Total F+V
        $tt_fv = Outroteste::where('id_lvc', '!=', 1)
                                    ->where('res_exame', '=', 5)
                                    ->orWhere('res_exame', '=', 6)
                                    ->count();

        //Total Vivax
        $tt_vivax = Outroteste::where('id_lvc', '!=', 1)
                                    ->where('res_exame', '=', 4)
                                    ->count();
                                    
        //Total Malariae
        $tt_malarie = Outroteste::where('id_lvc', '!=', 1)
                                    ->where('res_exame', '=', 8)
                                    ->count();

        //Total Ovale
        $tt_ovale = Outroteste::where('id_lvc', '!=', 1)
                                ->where('res_exame', '=', 10)
                                ->count();

        //Total Não Falciparum
        $tt_Nfalciparum = Outroteste::where('id_lvc', '!=', 1)
                                ->where('res_exame', '=', 11)
                                ->count();
        //-----------------Teste, apagar depois----------------------
        $teste = [1,2,3,4];
        //-----------------------------------------------------------
        return view('dashboards.localidades', [
            'data'=>$data,
            'teste'=>$teste,
            'notificacoes'=>$notificacoes,
            'positivos'=>$positivos,
            'tt_lvc'=>$tt_lvc,
            'tt_falciparum'=>$tt_falciparum,
            'tt_fv'=>$tt_fv,
            'tt_vivax'=>$tt_vivax,
            'tt_malarie'=>$tt_malarie,
            'tt_ovale'=>$tt_ovale,
            'tt_Nfalciparum'=>$tt_Nfalciparum
           ]
        );
    }
}
