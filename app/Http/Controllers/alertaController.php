<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Outroteste;

class alertaController extends Controller
{
    public function showAlerta(){
        date_default_timezone_set('America/Manaus');
        $data = date('Y');
        $msg = null;

        //Tipos de resultado
        $resultados = DB::table('outroteste')
                        ->select('res_exame')
                        ->where('res_exame', '!=', 1)
                        ->distinct()->get();

                        
        return view('dashboards.alerta', ['data'=>$data, 'msg'=>$msg, 'resultados'=>$resultados]);
    }










    //1. MOSTRAR TODOS OS CASOS
    //Função mostrar todos os casos
    public function mostrarCasos(){
        date_default_timezone_set('America/Manaus');
        $data = date('Y');
        $msg = null;
        
        //Tipos de resultado
        $resultados = DB::table('outroteste')
                        ->select('res_exame')
                        ->where('res_exame', '!=', 1)
                        ->distinct()->get();


        //tabela dos casos positivos
        $positivos = DB::table('outroteste')
                                ->leftJoin('localidades', 'outroteste.loc_infec', '=', 'localidades.cod_local')
                                ->where('mun_ibge', '=', 130260)//Só de Manaus
                                ->where('res_exame', '!=', 1)
                                ->where('id_lvc', '!=', 1)
                                ->orderBy('id_not', 'desc')
                                ->paginate(20);
    
        return view('dashboards.alerta', ['data'=>$data, 'positivos'=>$positivos, 'msg'=>$msg, 'resultados'=>$resultados]);
    }










    //2. FILTROS ACOMPANHAMENTO DE CASOS
    //Função Filtrar pelo nome
    public function filtrar_nome(Request $request){
        date_default_timezone_set('America/Manaus');
        $data = date('Y');
        $msg = null;
    
        //Tipos de resultado
        $resultados = DB::table('outroteste')
                        ->select('res_exame')
                        ->where('res_exame', '!=', 1)
                        ->distinct()->get();
        

        //Nome pesquisado
        $inputPesquisa = $request->nome_paciente;
        $positivos = Outroteste::leftJoin('localidades', 'outroteste.loc_infec', '=', 'localidades.cod_local')
                                ->where('mun_ibge', '=', 130260)//Só de Manaus
                                ->where('nm_paciente', 'like', '%'.$inputPesquisa.'%')
                                ->where('res_exame', '!=', 1)
                                ->where('id_lvc', '!=', 1)
                                ->orderBy('id_not', 'desc')
                                ->paginate(20);
        $positivos->appends($request->all());//impede que o filtro seja desfeito quando mudamos de página na paginação


        if(count($positivos) == 0){
            $msg = "Paciente não encontrado";
        }

        return view('dashboards.alerta', ['data'=>$data, 'positivos'=>$positivos, 'msg'=>$msg, 'resultados'=>$resultados]);
    }











    //Função Filtrar por tipo de resultado
    public function filtrar_res(Request $request){
        date_default_timezone_set('America/Manaus');
        $data = date('Y');
        $msg_resultado = $request->tipo_resultado;

        if($msg_resultado == "todos"){
            $msg_resultado = "Todos";
        }
        elseif($msg_resultado == '2'){
            $msg_resultado = "Falciparum";
        }
        elseif($msg_resultado == '3'){
            $msg_resultado = "F+Fg";
        }
        elseif($msg_resultado == '4'){
            $msg_resultado = "Vivax";
        }
        elseif($msg_resultado == '5'){
            $msg_resultado = "F+V";
        }
        elseif($msg_resultado == '6'){
            $msg_resultado = "V+Fg";
        }
        elseif($msg_resultado == '7'){
            $msg_resultado = "Fg";
        }
        elseif($msg_resultado == '8'){
            $msg_resultado = "Malariae";
        }
        elseif($msg_resultado == '9'){
            $msg_resultado = "F+M";
        }
        elseif($msg_resultado == '10'){
            $msg_resultado = "Ovale";
        }
        elseif($msg_resultado == '11'){
            $msg_resultado = "Não Falciparum";
        }

    
        //Listar tipos de resultado
        $resultados = DB::table('outroteste')
                        ->select('res_exame')
                        ->where('res_exame', '!=', 1)
                        ->distinct()->get();
        

        //filtro por tipo na tabela
        $inputResultado = $request->tipo_resultado;
        
        if($inputResultado == "todos"){
            $positivos = Outroteste::leftJoin('localidades', 'outroteste.loc_infec', '=', 'localidades.cod_local')
                                    ->where('mun_ibge', '=', 130260)//Só de Manaus
                                    ->where('res_exame', '!=', 1)
                                    ->where('id_lvc', '!=', 1)
                                    ->orderBy('id_not', 'desc')
                                    ->paginate(20);
        }
        else{
            $positivos = Outroteste::leftJoin('localidades', 'outroteste.loc_infec', '=', 'localidades.cod_local')
                                    ->where('mun_ibge', '=', 130260)//Só de Manaus
                                    ->where('res_exame', '=', $inputResultado)
                                    ->where('res_exame', '!=', 1)
                                    ->where('id_lvc', '!=', 1)
                                    ->orderBy('id_not', 'desc')
                                    ->paginate(20);
            }

        $positivos->appends($request->all());//impede que o filtro seja desfeito quando mudamos de página na paginação

        return view('dashboards.alerta', ['data'=>$data, 'positivos'=>$positivos, 'resultados'=>$resultados,'msg_resultado'=>$msg_resultado]);
    }
}
