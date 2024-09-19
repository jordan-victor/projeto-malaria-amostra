<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Outroteste;
use App\Models\Unidade;
use App\Models\Distrito;
use App\Models\Localidade;
/*
class Total{
    public $latitude;
    public $longitude;
    
    public function __construct($latitude, $longitude){
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }
}
*/
class testeController extends Controller
{
    //VARIÁVEL GLOBAL, listar tipos de exame
    protected $tp_exames;
    public function __construct(){
        $this->tp_exames = Outroteste::select('tp_exame')
                                    ->distinct()->get();                                 
    }


    public function teste(){
        date_default_timezone_set('America/Manaus');
        $data = date('Y');

        //--------------------1. SEÇÃO 1(FILTROS)--------------------
        //Tipos de distrito
        $distritos = Distrito::all();
   













        //----------2. SEÇÃO (INDICADORES DE TOTAIS)---------------
         $tabela_positivos = Outroteste::select('id_lvc', 'res_exame', 'mun_infec', 'gestante', 'id_dimea', 'id_pacie')
                                        ->get();
        $array_tabela = [];
        foreach($tabela_positivos as $positivo){
            $registro = [
                'id_lvc'=>$positivo->id_lvc,
                'res_exame'=>$positivo->res_exame,
                'mun_infec'=>$positivo->mun_infec,
                'gestante'=>$positivo->gestante,
                'id_dimea'=>$positivo->id_dimea,
                'id_pacie'=>$positivo->id_pacie,
            ];
            array_push($array_tabela, $registro);
        }


        //2.1 Total notificações e lvc
        $notificacoes = count($array_tabela);

        $lvc_notificacoes = count(array_filter($array_tabela, function($array_tabela){
            return $array_tabela['id_lvc'] == 1;
        }));
                                       

        //2.2 Total positivos
        $positivos = count(array_filter($array_tabela, function($array_tabela){
            return $array_tabela['id_lvc'] != 1  &&  $array_tabela['res_exame'] != 1;
        }));
                           
        //2.3 Total LVC positiva
        $tt_lvc = count(array_filter($array_tabela, function($array_tabela){
            return $array_tabela['id_lvc'] == 1  &&  $array_tabela['res_exame'] != 1;
        }));
           
        //2.4 Total Falciparum e LVC
        $tt_falciparum = count(array_filter($array_tabela, function($array_tabela){
            return $array_tabela['id_lvc'] != 1  &&  in_array($array_tabela['res_exame'], [2, 3, 7, 9]);
        }));
        
        $lvc_falciparum = count(array_filter($array_tabela, function($array_tabela){
            return $array_tabela['id_lvc'] == 1  &&  in_array($array_tabela['res_exame'], [2, 3, 7, 9]);
        })); 
        
       
        //2.5 Total F+V e LVC
        $tt_fv = count(array_filter($array_tabela, function($array_tabela){
            return $array_tabela['id_lvc'] != 1  &&  in_array($array_tabela['res_exame'], [5, 6]);
        }));

        $lvc_fv = count(array_filter($array_tabela, function($array_tabela){
            return $array_tabela['id_lvc'] == 1  &&  in_array($array_tabela['res_exame'], [5, 6]);
        }));
        

        //2.6 Total Vivax e LVC
        $tt_vivax = count(array_filter($array_tabela, function($array_tabela){
            return $array_tabela['id_lvc'] != 1  &&  $array_tabela['res_exame'] == 4;
        }));

        $lvc_vivax = count(array_filter($array_tabela, function($array_tabela){
            return $array_tabela['id_lvc'] == 1  &&  $array_tabela['res_exame'] == 4;
        }));
        
                                    
        //2.7 Total Malariae e LVC
        $tt_malarie = count(array_filter($array_tabela, function($array_tabela){
            return $array_tabela['id_lvc'] != 1  &&  $array_tabela['res_exame'] == 8;
        }));

        $lvc_malarie = count(array_filter($array_tabela, function($array_tabela){
            return $array_tabela['id_lvc'] == 1  &&  $array_tabela['res_exame'] == 8;
        }));
        
       
        //2.8 Total Ovale e LVC
        $tt_ovale = count(array_filter($array_tabela, function($array_tabela){
            return $array_tabela['id_lvc'] != 1  &&  $array_tabela['res_exame'] == 10;
        }));

        $lvc_ovale = count(array_filter($array_tabela, function($array_tabela){
            return $array_tabela['id_lvc'] == 1  &&  $array_tabela['res_exame'] == 10;
        }));
                           

        //2.9 Total Não Falciparum e LVC
        $tt_Nfalciparum = count(array_filter($array_tabela, function($array_tabela){
            return $array_tabela['id_lvc'] != 1  &&  $array_tabela['res_exame'] == 11;
        }));
        

        $lvc_Nfalciparum = count(array_filter($array_tabela, function($array_tabela){
            return $array_tabela['id_lvc'] == 1  &&  $array_tabela['res_exame'] == 11;
        }));


        //2.10 Total autóctones(positivos dentro de Manaus) e lvc
        $tt_autoctones = count(array_filter($array_tabela, function($array_tabela){
            return $array_tabela['id_lvc'] != 1  &&  $array_tabela['res_exame'] != 1 && $array_tabela['mun_infec'] == 130260;
        }));
                                   

        $lvc_autoctones = count(array_filter($array_tabela, function($array_tabela){
            return $array_tabela['id_lvc'] == 1  &&  $array_tabela['res_exame'] != 1 && $array_tabela['mun_infec'] == 130260;
        }));
        

        //2.11 Total importados
        $tt_importados =  Outroteste::with('res_exame', 'id_lvc', 'mun_infec')
                                    ->where('id_lvc', '!=', 1)
                                    ->where('res_exame', '!=', 1)
                                    ->where('mun_infec', '!=', 130260)//Fora de Manaus
                                    ->count();     
        /*
            count(array_filter($array_tabela, function($array_tabela){
            return $array_tabela['id_lvc'] != 1  &&  $array_tabela['res_exame'] != 1 && $array_tabela['mun_infec'] != 130260;
        }));*/                                      

        $lvc_importados = Outroteste::with('res_exame', 'id_lvc', 'mun_infec')
                                    ->where('id_lvc', '=', 1)
                                    ->where('res_exame', '!=', 1)
                                    ->where('mun_infec', '!=', 130260)
                                    ->count();
                                    
        //2.12 Total local não informado
        $tt_nInformado = Outroteste::with('res_exame', 'id_lvc', 'mun_infec')
                                    ->where('id_lvc', '!=', 1)
                                    ->where('res_exame', '!=', 1)
                                    ->whereNull('mun_infec')//Município em branco null
                                    ->count();

        //2.13 Total de gestantes E LVC
        $tt_gestante = count(array_filter($array_tabela, function($array_tabela){
            return $array_tabela['id_lvc'] != 1  &&  $array_tabela['res_exame'] != 1 && in_array($array_tabela['gestante'], [1, 2, 3, 4]);
        }));

        $lvc_gestante = count(array_filter($array_tabela, function($array_tabela){
            return $array_tabela['id_lvc'] == 1  &&  $array_tabela['res_exame'] != 1 && in_array($array_tabela['gestante'], [1, 2, 3, 4]);
        }));
                        
        
        //2.14 Total idosos e LVC
        $tt_idoso = Outroteste::with('res_exame', 'id_lvc', 'id_pacie', 'id_dimea')
                                ->where('id_lvc', '!=', 1)
                                ->where('res_exame', '!=', 1)
                                ->where('id_pacie', '>=', 60)
                                ->where('id_dimea', '=', 'A')
                                ->count();
        
        $lvc_idoso = Outroteste::with('res_exame', 'id_lvc', 'id_pacie', 'id_dimea')
                                ->where('id_lvc', '=', 1)
                                ->where('res_exame', '!=', 1)
                                ->where('id_pacie', '>=', 60)
                                ->where('id_dimea', '=', 'A')
                                ->count();

        //2.15 Total crianças e LVC
        $tt_crianca = Outroteste::with('res_exame', 'id_lvc', 'id_pacie', 'id_dimea')
                                ->where('id_lvc', '!=', 1)
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
        
        $lvc_crianca = Outroteste::with('res_exame', 'id_lvc', 'id_pacie', 'id_dimea')
                                ->where('id_lvc', '=', 1)
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















        //-------------------------SEÇÃO 3(GRÁFICO POSITIVOS POR SEMANA)---------------------------
        //Semanas do ano
        $semanas = Outroteste::select('semana')
                            ->distinct()
                            ->get();

        //criando array espelho da tabela para pegar o total de positivos por semanas
        $tt_semanas = [];
        $tt_semana = Outroteste::select('semana', 'res_exame', 'id_lvc')
                                ->where('res_exame', '!=', 1)
                                ->where('id_lvc', '!=', 1)
                                ->get();

        $array_tt_semanas = [];
        foreach($tt_semana as $total){
            $tt_positivo = [
                'res_exame'=>$total->res_exame,
                'id_lvc'=>$total->id_lvc,
                'semana'=>$total->semana
            ];
            array_push($array_tt_semanas, $tt_positivo);
        }
        

        foreach($semanas as $i=>$semana){
            $registro = array_filter($array_tt_semanas, function($array_tt_semanas) use($i){
                return $array_tt_semanas['semana'] == $i+1;
            });
                                    
            array_push($tt_semanas, count($registro));
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

    





         

        





         
        //----------------SEÇÃO 4(TABELAS LOCAIS DE INFECÇÃO E UNIDADES NOTIFICANTES)-----------
        //4.1 TABELA LOCAIS PROVÁVEIS DE INFECÇÃO
        //4.1.1 Total positivos
        $cods_munIBGE = DB::table('outroteste as ot') 
                        ->leftjoin('localidades as local', function($join) {
                            $join->on('ot.mun_infec', '=', 'local.mun_ibge')
                                ->on('ot.loc_infec', '=', 'local.cod_local');
                        })
                        ->where('res_exame', '!=', 1)
                        ->where('id_lvc', '!=', 1)
                        ->get();//--------------------------------**GARGALO**----------------------------------------------------------------------------------------------------------------------------********
                        
        //4.1.2 criando Array códigos dos municípios e da localidade
        $qtd_positivos = [];
        foreach($cods_munIBGE as $cod_munIBGE){
            $qtd_positivo = $cod_munIBGE->mun_ibge.$cod_munIBGE->loc_infec;
            array_push($qtd_positivos, $qtd_positivo);
        }
        

        //4.1.3 criando Array LVC
        $totais_lvc = DB::table('outroteste as ot')
        ->leftjoin('localidades as local', function($join) {
            $join->on('ot.mun_infec', '=', 'local.mun_ibge')
                ->on('ot.loc_infec', '=', 'local.cod_local');
        })
        ->where('res_exame', '!=', 1)->get();
        
        $id_lvcs = [];
        foreach($totais_lvc as $total_lvc){
            $id_lvc = $total_lvc->id_lvc.$total_lvc->mun_ibge.$total_lvc->loc_infec;
            array_push($id_lvcs, $id_lvc);
        }


        //4.1.4 criando Array idosos(serve também para crianças)
        $totais_idosos = [];

        foreach($cods_munIBGE as $cod_munIBGE){
            $total_idoso = [
                "cod_municipio"=>$cod_munIBGE->mun_ibge,
                "cod_localidade"=>$cod_munIBGE->loc_infec,
                "idade"=>$cod_munIBGE->id_pacie,
                "dia_mes_ano"=>$cod_munIBGE->id_dimea
            ];

            array_push($totais_idosos, $total_idoso);
        }
        

        //4.1.5 criando Array gestantes
        $totais_gestantes = [];

        foreach($cods_munIBGE as $cod_munIBGE){
            $total_gestante = [
                "cod_municipio"=>$cod_munIBGE->mun_ibge,
                "cod_localidade"=>$cod_munIBGE->loc_infec,
                "gestante"=>$cod_munIBGE->gestante
            ];

            array_push($totais_gestantes, $total_gestante);
        }


        //4.1.6 criando Array res_exame para Falciparum
        $totais_falciparum = [];

        foreach($cods_munIBGE as $cod_munIBGE){
            $total_falciparum = [
                "cod_municipio"=>$cod_munIBGE->mun_ibge,
                "cod_localidade"=>$cod_munIBGE->loc_infec,
                "res_exame"=>$cod_munIBGE->res_exame
            ];

            array_push($totais_falciparum, $total_falciparum);
        }




        //4.2 TABELA UNIDADES NOTIFICANTES
        //Unidades notificantes
        $unidades_notif = Unidade::all();//leftJoin('outroteste', 'unidade_notificante.cod_unid', '=', 'outroteste.unid_noti')->get();

        //Notificações
        $notifics = Outroteste::where('res_exame', '!=', 1)
        ->where('id_lvc', '!=', 1)
        ->where('mun_infec', '=', 130260)
        ->get();

        //criando array unid_noti (array dos códigos de unidades notificantes)
        $array_unidadeNoti = [];

        foreach($notifics as $notific){
            $cod_notificacao = ["codigo"=>$notific->unid_noti, "res_exame"=>$notific->res_exame];
            array_push($array_unidadeNoti, $cod_notificacao);
        }
    
                          


        








        
        //-----------------SEÇÃO 5 (MAPA POSITIVOS POR LOCALIDADE)--------------------
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
            'distritos'=>$distritos,

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

            //tabelas
            'cods_munIBGE'=>$cods_munIBGE,
            'qtd_positivos'=>$qtd_positivos,
            'id_lvcs'=>$id_lvcs,
            'totais_idosos'=>$totais_idosos,
            'totais_gestantes'=>$totais_gestantes,
            'totais_falciparum'=>$totais_falciparum,
            'unidades_notif'=>$unidades_notif,
            'array_unidadeNoti'=>$array_unidadeNoti,

            //Gráficos e mapas
            'tt_semanas_string'=>$tt_semanas_string,
            'positivos_localidade'=>$positivos_localidade,
            'tt_positivos_ponto'=>$tt_positivos_ponto,
            'listaTotais'=>$listaTotais,
            'array_tt_2022'=>$array_tt_2022,
            'array_tt_2023'=>$array_tt_2023,
           ]
        );
    }
}
