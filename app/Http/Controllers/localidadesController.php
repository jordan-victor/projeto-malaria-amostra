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


        //Total Falciparum e LVC
        $tt_falciparum = Outroteste::where('id_lvc', '!=', 1)
                                    ->whereIn('res_exame', [2, 3, 7, 9])
                                    ->count();

        $lvc_falciparum =  Outroteste::where('id_lvc', '=', 1)
                                    ->whereIn('res_exame', [2, 3, 7, 9])
                                    ->count();
        
        //Total F+V e LVC
        $tt_fv = Outroteste::where('id_lvc', '!=', 1)
                            ->whereIn('res_exame', [5,6])
                            ->count();

        $lvc_fv = Outroteste::where('id_lvc', '=', 1)
                            ->whereIn('res_exame', [5,6])
                            ->count();
        
        //Total Vivax e LVC
        $tt_vivax = Outroteste::where('id_lvc', '!=', 1)
                                ->where('res_exame', '=', 4)
                                ->count();

        $lvc_vivax = Outroteste::where('id_lvc', '=', 1)
                                ->where('res_exame', '=', 4)
                                ->count();
                                    
        //Total Malariae e LVC
        $tt_malarie = Outroteste::where('id_lvc', '!=', 1)
                                ->where('res_exame', '=', 8)
                                ->count();

        $lvc_malarie = Outroteste::where('id_lvc', '=', 1)
                                ->where('res_exame', '=', 8)
                                ->count();

        //Total Ovale e LVC
        $tt_ovale = Outroteste::where('id_lvc', '!=', 1)
                                ->where('res_exame', '=', 10)
                                ->count();

        $lvc_ovale = Outroteste::where('id_lvc', '=', 1)
                                ->where('res_exame', '=', 10)
                                ->count();

        //Total Não Falciparum e LVC
        $tt_Nfalciparum = Outroteste::where('id_lvc', '!=', 1)
                                    ->where('res_exame', '=', 11)
                                    ->count();

        $lvc_Nfalciparum = Outroteste::where('id_lvc', '=', 1)
                                    ->where('res_exame', '=', 11)
                                    ->count();


        //Total autóctones(positivos dentro de Manaus)
        $tt_autoctones = Outroteste::where('id_lvc', '!=', 1)
                                    ->where('res_exame', '!=', 1)
                                    ->where('mun_infec', '=', 130260)//Só de Manaus
                                    ->count();

        //Total importados
        $tt_importados = Outroteste::where('id_lvc', '!=', 1)
                                    ->where('res_exame', '!=', 1)
                                    ->where('mun_infec', '!=', 130260)//Fora de Manaus
                                    ->count();
                                    
        //Total local não informado
        $tt_nInformado = Outroteste::where('id_lvc', '!=', 1)
                                    ->where('res_exame', '!=', 1)
                                    ->whereNull('mun_infec')//Município em branco null
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
            'tt_Nfalciparum'=>$tt_Nfalciparum,
            'tt_autoctones'=>$tt_autoctones,
            'tt_importados'=>$tt_importados,
            'lvc_falciparum'=>$lvc_falciparum,
            'lvc_vivax'=>$lvc_vivax,
            'lvc_fv'=>$lvc_fv,
            'lvc_malarie'=>$lvc_malarie,
            'lvc_ovale'=>$lvc_ovale,
            'lvc_Nfalciparum'=>$lvc_Nfalciparum,
            'tt_nInformado'=>$tt_nInformado
           ]
        );
    }
}
