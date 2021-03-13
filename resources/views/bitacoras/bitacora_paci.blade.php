@extends('layouts.app')

@section('content')
<?php 
use App\Logon_log;
use App\Bitacora_Paciente;

       $Pacientes = DB::table('Bitacora_Paciente')->simplePaginate(5);
?>
  <div class="container">
<h2 class="all-tittles"> <center>BITACORA DE DATOS PACIENTES</center></h2>
<div class="div-table">
                <div class="div-table-row div-table-head">
                    <div class="div-table-cell">RFC NUEVO</div>
                    <div class="div-table-cell">RFC ANTIGUO</div>
                    <div class="div-table-cell">NOMBRE NUEVO</div>
                    <div class="div-table-cell">NOMBRE ANTIGUO</div>
                    <div class="div-table-cell">USUARIO</div>
                     <div class="div-table-cell">FECHA DE MODIFICACION</div>
                      <div class="div-table-cell">ACCION</div>
                       <div class="div-table-cell">TABLA</div>
                       <div class="div-table-cell">TIPO DE USUARIO</div>
                </div> 
               
                   @foreach($Pacientes as $key => $Paciente)
                 <div class="div-table-row">
                    <div class="div-table-cell">{{$Paciente->rfc_nuevo}}</div>
                    <div class="div-table-cell">{{$Paciente->rfc_viejo}}</div>
                    <div class="div-table-cell">{{$Paciente->nombre_nuevo}}</div>
                    <div class="div-table-cell">{{$Paciente->nombre_viejo}}</div>
                    <div class="div-table-cell">{{$Paciente->usuario}}</div>
                    <div class="div-table-cell">{{$Paciente->fecha}}</div>
                    <div class="div-table-cell">{{$Paciente->accion}}</div>
                    <div class="div-table-cell">{{$Paciente->tabla}}</div>
                    <div class="div-table-cell">{{$Paciente->tipo_usuario}}</div>
                </div>
                 @endforeach 
                </div>
               <div>{{$Pacientes->links()}}</div>
</div>

@endsection