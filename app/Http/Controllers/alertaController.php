<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Outroteste;

class alertaController extends Controller
{
    public function showAlerta(){
        date_default_timezone_set('America/Manaus');
        $data = date('Y');
        $msg = null;

        return view('dashboards.alerta', ['data'=>$data, 'msg'=>$msg]);
    }





    //MOSTRAR TODOS OS CASOS
    public function mostrarCasos(){
        date_default_timezone_set('America/Manaus');
        $data = date('Y');
        $msg = null;
        
        $positivos = Outroteste::where('res_exame', '!=', 1)
                                ->where('id_lvc', '!=', 1)->paginate(20);

       //criar uma condição para converter o campo data de nascimento que está em branco para um traço " - "

        return view('dashboards.alerta', ['data'=>$data, 'positivos'=>$positivos, 'msg'=>$msg]);
    }




    //FILTROS ACOMPANHAMENTO DE CASOS
    public function filtrar_caso(Request $request){
        date_default_timezone_set('America/Manaus');
        $data = date('Y');
        $msg = null;
    
        $inputPesquisa = $request->nome_paciente;
        $positivos = Outroteste::where('nm_paciente', 'like', '%'.$inputPesquisa.'%')
                                ->where('res_exame', '!=', 1)
                                ->where('id_lvc', '!=', 1)->paginate(20);


        if(count($positivos) == 0){
            $msg = "Paciente não encontrado";
        }

        return view('dashboards.alerta', ['data'=>$data, 'positivos'=>$positivos, 'msg'=>$msg]);
    }
}
