<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FiltroRequest;
use app\Cao_Fatura;
use Illuminate\Support\facade\redirect;
use Carbon\Carbon;
Use Response;
use Illuminate\Support\Collection;
use raw;
use Illuminate\Support\Facades\DB;

class ListadoController extends Controller
{
    public function __construct()

    {

    }

     public function show()

    {

    }

   	public function index(Request $parametros_busqueda)

    {
// Consulta para filtrar nombres
    		$consultores=DB::table('cao_usuario as u')
    		->join('permissao_sistema as p','u.co_usuario','p.co_usuario')
    		->where('p.co_sistema','1')
    		->where('p.in_ativo','S')
    		->wherein('p.co_tipo_usuario',[0,1,2])
    		->orderby('u.no_usuario')
    		->get()
    		;

    	if ($parametros_busqueda)

    	{
    	
 //Recibo nombres y fechas   

    	$fechai=$parametros_busqueda->añoi.'-'.$parametros_busqueda->mesi.'-01';
		$fechaf=$parametros_busqueda->añof.'-'.$parametros_busqueda->mesf.'-31';
		$filtro_nombres=$parametros_busqueda->GET('consul');

//consulta para totales por fecha------------------------------------------------------------
    	$totales=DB::table('cao_fatura')
		->join('cao_os','cao_os.co_os','cao_fatura.co_os')
		->join('cao_usuario','cao_usuario.co_usuario','cao_os.co_usuario')
		->join('cao_salario','cao_salario.co_usuario','cao_usuario.co_usuario')
		->select('cao_usuario.no_usuario',
			DB::raw('sum(cao_fatura.valor-(cao_fatura.valor*(cao_fatura.total_imp_inc/100))) as totliquida'),
			DB::raw('sum(cao_salario.brut_salario) as totfixo'),
			DB::raw('sum((cao_fatura.valor-(cao_fatura.valor*(cao_fatura.total_imp_inc/100)))*(cao_fatura.comissao_cn/100)) as totcomissao'),
			DB::raw('sum((cao_fatura.valor-(cao_fatura.valor*(cao_fatura.total_imp_inc/100)))-(cao_salario.brut_salario+((cao_fatura.valor-(cao_fatura.valor*(cao_fatura.total_imp_inc/100)))*(cao_fatura.comissao_cn/100)))) as totlucro'))
		->where('cao_fatura.data_emissao','>=',$fechai)
		->where('cao_fatura.data_emissao','<=',$fechaf)
		->groupBy('cao_usuario.no_usuario')
		->get();

//consulta para valores individuales por fecha
		$liquida=DB::table('cao_fatura')
		->join('cao_os','cao_os.co_os','cao_fatura.co_os')
		->join('cao_usuario','cao_usuario.co_usuario','cao_os.co_usuario')
		->join('cao_salario','cao_salario.co_usuario','cao_usuario.co_usuario')
		->select('cao_usuario.no_usuario',
			DB::raw('substr(cao_fatura.data_emissao,1,7) as mes'),
			DB::raw('sum(cao_fatura.valor-(cao_fatura.valor*(cao_fatura.total_imp_inc/100))) as valor'),
			DB::raw('sum(cao_salario.brut_salario) as brut_salario'),
			DB::raw('sum(((cao_fatura.valor-(cao_fatura.valor*(cao_fatura.total_imp_inc/100)))*(cao_fatura.comissao_cn/100))) as comissao_cn'),
			DB::raw('sum(((cao_fatura.valor-(cao_fatura.valor*(cao_fatura.total_imp_inc/100)))-(cao_salario.brut_salario+((cao_fatura.valor-(cao_fatura.valor*(cao_fatura.total_imp_inc/100)))*(cao_fatura.comissao_cn/100))))) as lucro'))
		->where('cao_fatura.data_emissao','>=',$fechai)
		->where('cao_fatura.data_emissao','<=',$fechaf)
		->groupBy('cao_usuario.no_usuario','mes')

		->get();
	

// Enviamos resultados a la vista		
		return view('lista.consultores.index',["liquida"=>$liquida,"filtro_nombres"=>$filtro_nombres,"totales"=>$totales,"consultores"=>$consultores]);
    	}else{
    	

    	
    	}
    	
    }

}
