@extends('layouts.app')

@section('content')

<?php
date_default_timezone_set("America/Mexico_City");
$fecha=date("d-m-Y H:i");

?>

<div class="container">
   <div class="page-header">
              <h1 class="all-tittles">SISTEMA DE CONTROL DE OXIGENO MEDICINAL <small>Administración de pacientes</small></h1>
            </div>
    <div class="">
      <div class="row">
      	 <div class="title-flat-form title-flat-blue">RESUMEN MEDICO</div>
      <form method="POST" action="{{route('resumens.update',$paciente->id)}}">
        @method('PUT')
        @csrf
<br><span style="float:right">
   <pre> Folio No. <input type="number" name="folio" size="10" style="border-radius: 5px; border: 1px solid #39c;" /></pre> </span>
    <br><br><br>
    <span style="float:right"> 
    <label>Fecha y hora: <input type="datatime" name="fecha"  value="<?=  $fecha ?>" style=" border-radius: 5px; border: 1px solid #39c; text-align: center;"></label>
</span>
     <br><br>
     <div class="form-row">
    <pre>      Unidad medica emisora: <input type="text" name="Unidad" class="form" size="10" style="width: 475px; border-radius: 5px; border: 1px solid #39c;" />      Clave:  <input type="text" name="clave" size="10" style="width: 320px; border-radius: 5px; border: 1px solid #39c;"/> 

      Nombre del paciente:   <input type="text" disabled name="nombre" value="{{$paciente->nombre}}" style="width: 530px; border-radius: 5px; border: 1px solid #39c;"/>      Num.Expediente:   <input type="text" name="num" size="10" style="width: 195px; border-radius: 5px; border: 1px solid #39c;"/>

      Motivo de la contrareferencia: <input type="text" name="contrareferencia" size="10" style="width: 475px; border-radius: 5px; border: 1px solid #39c;"/>  Tel: <input type="text" nname="tel" value="{{$paciente->telefono}}" size="10" disabled style="width: 140px; border-radius: 5px; border: 1px solid #39c;"/> Cel: <input type="text" disabled name="cel" value="{{$paciente->celular}}" size="10" style="width: 130px; border-radius: 5px; border: 1px solid #39c;"/>
    
      Total de interconsultas:   <input type="text" name="interconsultas" size="10" style="width: 80px; border-radius: 5px; border: 1px solid #39c;"/>   Total de consultas otorgadas:   <input type="text" name="consultas" size="10" style="width: 80px; border-radius: 5px; border: 1px solid #39c;"/>   Diagnostico de referencia:  <input type="text" name="diagnostico" size="10" style="width: 240px; border-radius: 5px; border: 1px solid #39c;"/>

      Diagnostico de contrareferencia:  <input type="text" name="contrare" size="10" style="width: 815px; border-radius: 5px; border: 1px solid #39c;"/> </pre>
</div>
<div class="form-row">
 <pre>      Unidad medica a la que se contrarefiere: <input type="text" name="contrarefiere" size="10" style="width: 490px; border-radius: 5px; border: 1px solid #39c;"/>  Nivel de atencion: <input type="text" name="atencion" size="10" style="width: 125px; border-radius: 5px; border: 1px solid #39c;"/>
    
      Unidad medica de Adscripcion del Paciente: <input type="text" name="adscripcion" size="10" style="width: 475px; border-radius: 5px; border: 1px solid #39c;"/>  Clave: <input type="text" name="clave2" size="10" style="width: 210px; border-radius: 5px; border: 1px solid #39c;"/>
    
      Servicio: <input type="text" name="servicio" size="10" style="width: 985px; border-radius: 5px; border: 1px solid #39c;"/></pre>
    </div>
    <center>
   <textarea name="comentarios" rows="30" cols="200" placeholder="Escribe aquí el resumen"></textarea>
   </center>
    <pre>      Requiere tratamiento farmacologico:              <input type="text" name="farmacologico" size="10" style="width : 25px; heigth : 5px; border-radius: 5px; border: 1px solid #39c;"/>   <input type="text" name="farmacologico2" size="10"  style="width : 25px; heigth : 5px; border-radius: 5px; border: 1px solid #39c;"/>                    Se dota medicamento al paciente:  <input type="text" name="medicamento" size="10"  style="width : 25px; heigth : 5px; border-radius: 5px; border: 1px solid #39c;"/>  <input type="text" name="medicamento2" size="10"  style="width : 25px; heigth : 5px; border-radius: 5px; border: 1px solid #39c;"/> 
    
      Medicamento Dotado para el periodo: <input type="text" name="dotado" size="10" style="width: 800px; border-radius: 5px; border: 1px solid #39c;"/>  </pre>
                                                                                                                    
 Indicaciones a seguir(incluir en caso necesario medicamento,dosis, tiempo de tratamiento,dotacion mensual) <br>
 <center>
  <textarea name="comentarios2" rows="20" cols="200" placeholder="Escribe aquí el resumen"></textarea>
  </center></span>
  <pre>          <label style="text-align: right;">Medico Especialista Tratante                         Responsable de la Unidad Medica Receptora                               Paciente</label>
          <label style="text-align: right;"></label>                                                          <label style="text-align: right;">y/o Responsable de Referencia</label>


  <label style="text-align: right;">______________________________________________</label>            <label style="text-align: right;">______________________________________________</label>              <label style="text-align: right;">_______________________________________</label>
               <label style="text-align: right;">Nombre,clave y firma</label>                                       <label style="text-align: right;">Nombre,clave y firma</label>                                       <label style="text-align: right;">Nombre y firma</label></pre>
    
     <p class="text-center">
      <a href="{{asset('pacientes')}}"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-circle-arrow-left"></span> Regresar </button></a>
   <button type="submit" class="btn btn-primary" ><i class="zmdi zmdi-floppy"></i> {{ __('Guardar') }}</button>
</p>
    </form>
</div>
</div>
</div>
</div>

@endsection