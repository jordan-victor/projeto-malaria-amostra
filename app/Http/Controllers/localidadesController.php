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
        //--------------------1. SEÇÃO 1(FILTROS)--------------------










        //----------2. SEÇÃO 2(INDICADORES DE TOTAIS)---------------
        //2.1 Total notificações e lvc
        $notificacoes = Outroteste::count();
        $lvc_notificacoes = Outroteste::where('id_lvc', '=', 1)->count();


        //2.2 Total positivos
        $positivos = Outroteste::where('res_exame', '!=', 1)
                                ->where('id_lvc', '!=', 1)
                                ->count();
        
        
        //2.3 Total LVC positiva
        $tt_lvc = Outroteste::where('res_exame', '!=', 1)
                            ->where('id_lvc', '=', 1)
                            ->count();


        //2.4 Total Falciparum e LVC
        $tt_falciparum = Outroteste::where('id_lvc', '!=', 1)
                                    ->whereIn('res_exame', [2, 3, 7, 9])
                                    ->count();

        $lvc_falciparum =  Outroteste::where('id_lvc', '=', 1)
                                    ->whereIn('res_exame', [2, 3, 7, 9])
                                    ->count();
        
        //2.5 Total F+V e LVC
        $tt_fv = Outroteste::where('id_lvc', '!=', 1)
                            ->whereIn('res_exame', [5,6])
                            ->count();

        $lvc_fv = Outroteste::where('id_lvc', '=', 1)
                            ->whereIn('res_exame', [5,6])
                            ->count();
        
        //2.6 Total Vivax e LVC
        $tt_vivax = Outroteste::where('id_lvc', '!=', 1)
                                ->where('res_exame', '=', 4)
                                ->count();

        $lvc_vivax = Outroteste::where('id_lvc', '=', 1)
                                ->where('res_exame', '=', 4)
                                ->count();
                                    
        //2.7 Total Malariae e LVC
        $tt_malarie = Outroteste::where('id_lvc', '!=', 1)
                                ->where('res_exame', '=', 8)
                                ->count();

        $lvc_malarie = Outroteste::where('id_lvc', '=', 1)
                                ->where('res_exame', '=', 8)
                                ->count();

        //2.8 Total Ovale e LVC
        $tt_ovale = Outroteste::where('id_lvc', '!=', 1)
                                ->where('res_exame', '=', 10)
                                ->count();

        $lvc_ovale = Outroteste::where('id_lvc', '=', 1)
                                ->where('res_exame', '=', 10)
                                ->count();

        //2.9 Total Não Falciparum e LVC
        $tt_Nfalciparum = Outroteste::where('id_lvc', '!=', 1)
                                    ->where('res_exame', '=', 11)
                                    ->count();

        $lvc_Nfalciparum = Outroteste::where('id_lvc', '=', 1)
                                    ->where('res_exame', '=', 11)
                                    ->count();


        //2.10 Total autóctones(positivos dentro de Manaus) e lvc
        $tt_autoctones = Outroteste::where('id_lvc', '!=', 1)
                                    ->where('res_exame', '!=', 1)
                                    ->where('mun_infec', '=', 130260)//Só de Manaus
                                    ->count();

        $lvc_autoctones = Outroteste::where('id_lvc', '=', 1)
                                    ->where('res_exame', '!=', 1)
                                    ->where('mun_infec', '=', 130260)
                                    ->count();

        //2.11 Total importados
        $tt_importados = Outroteste::where('id_lvc', '!=', 1)
                                    ->where('res_exame', '!=', 1)
                                    ->where('mun_infec', '!=', 130260)//Fora de Manaus
                                    ->count();

        $lvc_importados = Outroteste::where('id_lvc', '=', 1)
                                    ->where('res_exame', '!=', 1)
                                    ->where('mun_infec', '!=', 130260)
                                    ->count();
                                    
        //2.12 Total local não informado
        $tt_nInformado = Outroteste::where('id_lvc', '!=', 1)
                                    ->where('res_exame', '!=', 1)
                                    ->whereNull('mun_infec')//Município em branco null
                                    ->count();

        //2.13 Total de gestantes E LVC
        $tt_gestante = Outroteste::where('id_lvc', '!=', 1)
                                    ->where('res_exame', '!=', 1)
                                    ->whereIn('gestante',[1, 2, 3, 4])
                                    ->count();

        $lvc_gestante = Outroteste::where('id_lvc', '=', 1)
                                    ->where('res_exame', '!=', 1)
                                    //->where('mun_infec', '=', 130260)                                 
                                    ->whereIn('gestante',[1, 2, 3, 4])
                                    ->count();

        
        //2.14 Total idosos e LVC
        $tt_idoso = Outroteste::where('id_lvc', '!=', 1)
                                ->where('res_exame', '!=', 1)
                                ->where('id_pacie', '>=', 60)
                                ->where('id_dimea', '=', 'A')
                                ->count();
        
        $lvc_idoso = Outroteste::where('id_lvc', '=', 1)
                                ->where('res_exame', '!=', 1)
                                ->where('id_pacie', '>=', 60)
                                ->where('id_dimea', '=', 'A')
                                ->count();

        //2.15 Total crianças e LVC
        /*
        $tt_crianca = Outroteste::where('id_lvc', '!=', 1)
                                ->where('res_exame', '!=', 1)
                                ->where('id_pacie', '<', 11)
                                ->where('id_dimea', '=', 'A')
                                ->orWhere('id_pacie', '<', 30)
                                ->where('id_dimea', '=', 'D')
                                ->orWhere('id_pacie', '<', 11)
                                ->where('id_dimea', '=', 'M')
                                ->count();
                                */

        echo $tt_crianca;
        $lvc_crianca = Outroteste::where('id_lvc', '=', 1)
                                ->where('res_exame', '!=', 1)
                                ->where('id_pacie', '<', 11)
                                ->where('id_dimea', '=', 'A')
                                ->orWhere('id_pacie', '<', 30)
                                ->where('id_dimea', '=', 'D')
                                ->orWhere('id_pacie', '<', 11)
                                ->where('id_dimea', '', 'M')
                                ->count();
                                


        //----------SEÇÃO 3(MAPAS, TABELAS E GRÁFICOS)-----------
        //-----------------Teste, apagar depois----------------------
        $teste = [1,2,3,4];
        //-----------------------------------------------------------
        return view('dashboards.localidades', [
            'data'=>$data,
            'teste'=>$teste,
            'notificacoes'=>$notificacoes,
            'lvc_notificacoes'=>$lvc_notificacoes,
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
            'tt_nInformado'=>$tt_nInformado,
            'lvc_autoctones'=>$lvc_autoctones,
            'lvc_importados'=>$lvc_importados,
            'tt_gestante'=>$tt_gestante,
            'lvc_gestante'=>$lvc_gestante,
            'tt_idoso'=>$tt_idoso,
            'lvc_idoso'=>$lvc_idoso
           ]
        );
    }
}
