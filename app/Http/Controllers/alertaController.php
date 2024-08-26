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
        //$positivos = Outroteste::where('res_exame', '!=', 1)->paginate(20);
        $positivos = Outroteste::where('res_exame', '!=', 1)->get();

        return view('dashboards.alerta', ['data'=>$data, 'positivos'=>$positivos, 'msg'=>$msg]);
    }




    //FILTROS ACOMPANHAMENTO
    public function filtrar_caso(Request $request){
        date_default_timezone_set('America/Manaus');
        $data = date('Y');
        $msg = null;
    
        $inputFiltro = $request->cod_notific;
        $positivos = Outroteste::where('nm_paciente', 'like', '%'.$inputFiltro.'%')->get();

        if(isset($positivos)){
            $msg = "Paciente não encontrado";
        }

        return view('dashboards.alerta', ['data'=>$data, 'positivos'=>$positivos, 'msg'=>$msg]);
    }
}
