<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\vista_pacientes;
use App\Control_Entrega;
use App\vista_control;
use App\vista_pdf;
use App\vista_documentos;


class ControlController extends Controller
{
    public function index()
    {
        return view('resumens.lists_resumens',['vista_resumens' => vista_pacientes::all()]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('controls.index',['paciente' => vista_pacientes::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('controls.edit',['paciente' => vista_control::findOrFail($id)]);
    }
    
    public function update(Request $request, $id)
    {
        $control = new Control_Entrega();
        $control->num_interno = $request->num_control;
        $control->medico = $request->medico;
        $control->dosis = $request->dosis;
        $control->inicio= $request->inicio;
        $control->baja = $request->baja;
        $control->fecha = $request->inicio;
        $control->paciente_id = $id;
        $control->save();

    return redirect('/pacientes');
    }

    public function destroy($id)
    {
        dd('Si jala');
    }

     public function imprimir_control($id)
    {
        $paciente = vista_pdf::findOrFail($id);
        $pdf = \PDF::loadView('controls/controlPDF', compact('paciente',$paciente));
        return $pdf->stream('Control de Oxigeno '.$paciente->nombre.' '.$paciente->id.'.pdf');
    }

    public function imprimir_controls($id)
    {
        $paciente = vista_pdf::findOrFail($id);
        $pdf = \PDF::loadView('controls/controlPDF', compact('paciente',$paciente));
        return $pdf->stream('Control de Oxigeno '.$paciente->nombre.' '.$paciente->id.'.pdf');
    }

    public function lista_control($id)
    {
    

    }
}
