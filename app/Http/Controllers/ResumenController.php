<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\Resumen;
use App\vista_resumen;
use App\vista_resumens;
use App\vista_documentos;
use App\vista_control;
use App\vista_pacientes;
use DB;

class ResumenController extends Controller
{
    
    public function index()
    {
      return view('resumens.lists_resumens',['vista_resumens' => vista_resumen::all()]);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
    
    }

    public function show($id)
    {
        return view('resumens.index',['paciente' => Paciente::findOrFail($id)]);
    }

    public function edit($id)
    {  
        $resumens = vista_resumens::findOrFail($id);
         return view('resumens.editar')->with('resumens',$resumens);
    }

    public function update(Request $request, $id)

    {
        /*$request->validate([
        'RFC' => 'required', 
        'nombre' => 'required',
        'sexo' => 'required',
        'tipo'=> 'required',
        'edad'=> 'required',
        'noissste'=> 'required',
        'tel' => 'required', 
        'cel' => 'required',
        'RFC' => 'required', 
        'nombre' => 'required',
        'sexo' => 'required',
        'tipo'=> 'required',
        'edad'=> 'required',
        'noissste'=> 'required',
        'tel' => 'required', 
        'cel' => 'required',
    ]);*/

    $resumen = new Resumen();
    $resumen->folio = $request->folio;
    $resumen->fecha = $request->fecha;
    $resumen->unidadmedica = $request->Unidad;
    $resumen->clave= $request->clave;
    $resumen->numexpediente = $request->num;
    $resumen->contrareferencia = $request->contrareferencia;
    $resumen->interonsultas = $request->interconsultas;
    $resumen->totalconsultas = $request->consultas;
    $resumen->diagnostico = $request->diagnostico;
    $resumen->diag_contrareferencia = $request->contrare;
    $resumen->unidadcontrarefiere = $request->contrarefiere;
    $resumen->nivelatencion= $request->atencion;
    $resumen->adscripcion = $request->adscripcion;
    $resumen->clavemedica = $request->clave2;
    $resumen->servicio= $request->servicio;
    $resumen->resumen = $request->comentarios;
    $resumen->tratamiento = $request->farmacologico;
    $resumen->tratamiento2 = $request->farmacologico2;
    $resumen->medicamento= $request->medicamento;
    $resumen->medicamento2 = $request->medicamento2;
    $resumen->periodo= $request->dotado;
    $resumen->indicaciones = $request->comentarios2;
    $resumen->paciente_id = $id;
    $resumen->save();

    $vista = DB::select('select*from vista_resumen where paciente_id = ?', [$id]);
    $control = DB::select('select*from vista_control where paciente_id = ?', [$id]);

       return view('resumens.lists_resumens')->with('vista_resumen',$vista)->with('vista_resumens',$control);
    }

     public function modificar(Request $request, $id)

    {
        $resumen = Resumen::findOrFail($id);
    $resumen->folio = $request->folio;
    $resumen->fecha = $request->fecha;
    $resumen->unidadmedica = $request->Unidad;
    $resumen->clave= $request->clave;
    $resumen->numexpediente = $request->num;
    $resumen->contrareferencia = $request->contrareferencia;
    $resumen->interonsultas = $request->interconsultas;
    $resumen->totalconsultas = $request->consultas;
    $resumen->diagnostico = $request->diagnostico;
    $resumen->diag_contrareferencia = $request->contrare;
    $resumen->unidadcontrarefiere = $request->contrarefiere;
    $resumen->nivelatencion= $request->atencion;
    $resumen->adscripcion = $request->adscripcion;
    $resumen->clavemedica = $request->clave2;
    $resumen->servicio= $request->servicio;
    $resumen->resumen = $request->comentarios;
    $resumen->tratamiento = $request->farmacologico;
    $resumen->tratamiento2 = $request->farmacologico2;
    $resumen->medicamento= $request->medicamento;
    $resumen->medicamento2 = $request->medicamento2;
    $resumen->periodo= $request->dotado;
    $resumen->indicaciones = $request->comentarios2;
    $resumen->update();

   return view('resumens.lists_resumens',['vista_resumen' => vista_resumen::all()]);
    }

    public function destroy($id)
    {
        $resumens = Resumen::findOrFail($id);
        $resumens->delete();
    }

    public function imprimir_resumen($id)
    {
        $paciente = vista_resumen::findOrFail($id);
        $pdf = \PDF::loadView('resumenPDF', compact('paciente',$paciente));
        return $pdf->stream('Resumen Medico '.$paciente->nombre.' '.$paciente->id.'.pdf');
    }

    public function imprimir_resumens($id)
    {
        $paciente = vista_resumens::findOrFail($id);
        $pdf = \PDF::loadView('resumenPDF', compact('paciente',$paciente));
        return $pdf->stream('Resumen Medico '.$paciente->nombre.' '.$paciente->id.'.pdf');
    }

    public function lista_resumen($id)
    {
        $vista = DB::select('select*from vista_resumen where paciente_id = ?', [$id]);
        $control = DB::select('select*from vista_control where paciente_id = ?', [$id]);

       return view('resumens.lists_resumens')->with('vista_resumen',$vista)->with('vista_resumens',$control);
    }

    public function ver($id)
    {
        $resumens = vista_resumens::findOrFail($id);
         return view('resumens.edit')->with('resumens',$resumens);
    }
}
