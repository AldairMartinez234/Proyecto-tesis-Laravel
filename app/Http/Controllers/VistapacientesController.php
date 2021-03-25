<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\vista_pacientes;
use Symfony\Component\HttpFoundation\JsonResponse;
use DB;

class VistapacientesController extends Controller
{
    public function index()
    {
		$paciente = vista_pacientes::all();
		
		 return response()->json($paciente, 200);	
	}

	public function municipios()
	{
      $paciente = DB::SELECT("SELECT distinct municipio FROM sepomex where estado='morelos'");
		
		 return response()->json($paciente, 200);	
	}

	public function muni($muni)
	{

      $paciente = DB::SELECT("SELECT * FROM vista_pacientes where entidad = ? ",[$muni]);
		
		 return response()->json($paciente, 200);	
	}

	public function paciente($id)
	{
		
      $paciente = DB::SELECT("SELECT * FROM vista_pacientes where id = ? ",[$id]);
		
		 return response()->json($paciente, 200);	
	}

	public function entregados($id,$codigo_entrega)
	{
		
      $paciente = DB::insert("INSERT INTO pedidos (entregados,paciente_id,codigo_entrega) values (?,?,?)",["Pedido entregado",$id,$codigo_entrega]);
		
		return response()->json($paciente, 200);	
	}

	public function busquedad($name)
	{

      $paciente = vista_pacientes::where('nombre', 'LIKE', "%$name%")->get();
		
		 return response()->json($paciente, 200);	
	}


	
}
