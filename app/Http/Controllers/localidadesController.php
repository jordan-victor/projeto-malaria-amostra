<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Outroteste;


class Total{
    public $latitude;
    public $longitude;
    
    public function __construct($latitude, $longitude){
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }
}

class localidadesController extends Controller
{
    //VARIÁVEL GLOBAL, listar tipos de exame
    protected $tp_exames;
    public function __construct(){
        $this->tp_exames = Outroteste::select('tp_exame')
                                    ->distinct()->get();                                 
    }


    public function showLocalidades(){
        date_default_timezone_set('America/Manaus');
        $data = date('Y');
        //--------------------1. SEÇÃO 1(FILTROS)--------------------
       











        //----------2. SEÇÃO (INDICADORES DE TOTAIS)---------------
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
        $tt_crianca = Outroteste::where('id_lvc', '!=', 1)
                                ->where('res_exame', '!=', 1)
                                ->where(function($query) {
                                    $query->where(function($query) {
                                        $query->where('id_pacie', '<=', 11)
                                            ->where('id_dimea', '=', 'A');
                                    })
                                    ->orWhere(function($query) {
                                        $query->where('id_pacie', '<=', 30)
                                            ->where('id_dimea', '=', 'D');
                                    })
                                    ->orWhere(function($query) {
                                        $query->where('id_pacie', '<=', 11)
                                            ->where('id_dimea', '=', 'M');
                                    });
                                })
                                ->count();
        
        $lvc_crianca = Outroteste::where('id_lvc', '=', 1)
                                ->where('res_exame', '!=', 1)
                                ->where(function($query) {
                                    $query->where(function($query) {
                                        $query->where('id_pacie', '<=', 11)
                                            ->where('id_dimea', '=', 'A');
                                    })
                                    ->orWhere(function($query) {
                                        $query->where('id_pacie', '<=', 30)
                                            ->where('id_dimea', '=', 'D');
                                    })
                                    ->orWhere(function($query) {
                                        $query->where('id_pacie', '<=', 11)
                                            ->where('id_dimea', '=', 'M');
                                    });
                                })
                                ->count();










        //----------SEÇÃO 3(MAPAS, TABELAS E GRÁFICOS)-----------
        //Total de notificações de cada semana
        $semanas = Outroteste::select('semana')
                            ->distinct()
                            ->get();
        
        $tt_semanas = [];

        foreach($semanas as $indice=>$semana){
            $registro = Outroteste::where('semana', '=', $indice+1)//usando o indice de cada elemeto do array para comparar e filtrar a semana
                                    ->where('res_exame', '!=', 1)
                                    ->where('id_lvc', '!=', 1)
                                    ->count();
                                    
            array_push($tt_semanas, $registro);
        }

        //Positivos por localidade, ano atual
        $tt_semanas_string = implode(',', $tt_semanas);//Convertendo o array de totais de semanas em string para depois ser usado no chars.js
        

        //Positivos ano 2022
        $positivos2022 = DB::table('posit_ano_anterior')->select('ano_2022')->get();
        $totais_2022 = [];

        foreach($positivos2022 as $positivo2022){
            array_push($totais_2022, $positivo2022->ano_2022); 
        }
        
        $array_tt_2022 = implode(',', $totais_2022);

         //Positivos ano 2023
         $positivos2023 = DB::table('posit_ano_anterior')->select('ano_2023')->get();
         $totais_2023 = [];
 
         foreach($positivos2023 as $positivo2023){
             array_push($totais_2023, $positivo2023->ano_2023); 
         }
         
         $array_tt_2023 = implode(',', $totais_2023);
 



        //Mapa positivos por localidade
        $positivos_localidade = DB::table('outroteste as ot')
                                    ->select('ot.id_not', 'local.nm_local', 'local.latitude', 'local.longitude', 'id_lvc', 'res_exame', 'id_mun_loc',  'loc_infec')
                                    ->Leftjoin('localidades as local', function($join) {
                                        $join->on('ot.mun_infec', '=', 'local.mun_ibge')
                                            ->on('ot.loc_infec', '=', 'local.cod_local');
                                    })
                                    ->where('res_exame', '!=', 1)
                                    ->where('id_lvc', '!=', 1)
                                    //->where('mun_infec', '=', 130260)//Só de Manaus
                                    ->get();
       

        //Total positivos de cada ponto no mapa
        $tt_positivos_ponto = [];

        foreach($positivos_localidade as $indice=>$positivo_localidade){
            $novoTotal = $positivo_localidade->loc_infec;
            array_push($tt_positivos_ponto, $novoTotal);
        }
    
        $listaTotais =  implode(',', $tt_positivos_ponto);
       

        return view('dashboards.localidades', [
            //filtros
            'tp_exames'=>$this->tp_exames,

            //indicadores dos totais
            'data'=>$data,
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
            'lvc_idoso'=>$lvc_idoso,
            'tt_crianca'=>$tt_crianca,
            'lvc_crianca'=>$lvc_crianca,

            //Gráficos, mapas e tabelas
            'tt_semanas_string'=>$tt_semanas_string,
            'positivos_localidade'=>$positivos_localidade,
            'tt_positivos_ponto'=>$tt_positivos_ponto,
            'listaTotais'=>$listaTotais,
            'array_tt_2022'=>$array_tt_2022,
            'array_tt_2023'=>$array_tt_2023
           ]
        );
    }
}
