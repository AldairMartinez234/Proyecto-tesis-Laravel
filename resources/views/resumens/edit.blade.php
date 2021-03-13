@extends('layouts.app')

@section('content')


<div class="container">
   <div class="page-header">
              <h1 class="all-tittles">SISTEMA DE CONTROL DE OXIGENO MEDICINAL <small>Administración de pacientes</small></h1>
            </div>
    <div class="">
      <div class="row">
      	 <div class="title-flat-form title-flat-blue">RESUMEN MEDICO</div>
      <form>
        @csrf
<br><span style="float:right">
   <pre> Folio No. <input type="number" disabled value="{{$resumens->folio}}" name="folio" size="10" style="border-radius: 5px; border: 1px solid #39c;" /></pre> </span>
    <br><br><br>
    <span style="float:right"> 
    <label>Fecha y hora: <input type="datatime" disabled name="fecha"  value="{{$resumens->fecha}}" style=" border-radius: 5px; border: 1px solid #39c; text-align: center;"></label>
</span>
     <br><br>
     <div class="form-row">
    <pre>      Unidad medica emisora: <input type="text" disabled name="Unidad" value="{{$resumens->unidadmedica}}"  class="form" size="10" style="width: 475px; border-radius: 5px; border: 1px solid #39c;" />      Clave:  <input type="text"value="{{$resumens->clave}}" disabled name="clave" size="10" style="width: 320px; border-radius: 5px; border: 1px solid #39c;"/> 

      Nombre del paciente:   <input type="text" disabled name="nombre" value="{{$resumens->nombre}}" style="width: 530px; border-radius: 5px; border: 1px solid #39c;"/>      Num.Expediente:   <input type="text" disabled value="{{$resumens->numexpediente}}" name="num" size="10" style="width: 195px; border-radius: 5px; border: 1px solid #39c;"/>

      Motivo de la contrareferencia: <input type="text" value="{{$resumens->contrareferencia}}" disabled name="contrareferencia" size="10" style="width: 475px; border-radius: 5px; border: 1px solid #39c;"/>  Tel: <input type="text"  disabled name="tel" value="{{$resumens->telefono}}" size="10" disabled style="width: 140px; border-radius: 5px; border: 1px solid #39c;"/> 
    
      Total de interconsultas:   <input type="text"  disabled value="{{$resumens->interonsultas}}" name="interconsultas" size="10" style="width: 80px; border-radius: 5px; border: 1px solid #39c;"/>   Total de consultas otorgadas:   <input type="text" value="{{$resumens->totalconsultas}}" disabled name="consultas" size="10" style="width: 80px; border-radius: 5px; border: 1px solid #39c;"/>   Diagnostico de referencia:  <input type="text" value="{{$resumens->diagnostico}}" disabled name="diagnostico" size="10" style="width: 240px; border-radius: 5px; border: 1px solid #39c;"/>

      Diagnostico de contrareferencia:  <input type="text" disabled value="{{$resumens->diag_contrareferencia}}" name="contrare" size="10" style="width: 815px; border-radius: 5px; border: 1px solid #39c;"/> </pre>
</div>
<div class="form-row">
 <pre>      Unidad medica a la que se contrarefiere: <input type="text" value="{{$resumens->unidadcontrarefiere}}" disabled name="contrarefiere" size="10" style="width: 490px; border-radius: 5px; border: 1px solid #39c;"/>  Nivel de atencion: <input type="text" value="{{$resumens->nivelatencion}}" disabled name="atencion" size="10" style="width: 125px; border-radius: 5px; border: 1px solid #39c;"/>
    
      Unidad medica de Adscripcion del Paciente: <input type="text" value="{{$resumens->adscripcion}}" disabled name="adscripcion" size="10" style="width: 475px; border-radius: 5px; border: 1px solid #39c;"/>  Clave: <input type="text" value="{{$resumens->clavemedica}}" disabled name="clave2" size="10" style="width: 210px; border-radius: 5px; border: 1px solid #39c;"/>
    
      Servicio: <input type="text" disabled value="{{$resumens->servicio}}" name="servicio" size="10" style="width: 985px; border-radius: 5px; border: 1px solid #39c;"/></pre>
    </div>
    <center>
   <textarea disabled name="comentarios" rows="30" cols="200" placeholder="Escribe aquí el resumen">{{$resumens->resumen}}</textarea>
   </center>
    <pre>      Requiere tratamiento farmacologico:              <input type="text" value="{{$resumens->tratamiento}}" disabled name="farmacologico" size="10" style="width : 25px; heigth : 5px; border-radius: 5px; border: 1px solid #39c;"/>   <input type="text" value="{{$resumens->tratamiento2}}" disabled name="farmacologico2" size="10"  style="width : 25px; heigth : 5px; border-radius: 5px; border: 1px solid #39c;"/>                    Se dota medicamento al paciente:  <input type="text" value="{{$resumens->medicamento}}" disabled name="medicamento" size="10"  style="width : 25px; heigth : 5px; border-radius: 5px; border: 1px solid #39c;"/>  <input type="text" disabled name="medicamento2" value="{{$resumens->medicamento2}}" size="10"  style="width : 25px; heigth : 5px; border-radius: 5px; border: 1px solid #39c;"/> 
    
      Medicamento Dotado para el periodo: <input type="text"  value="{{$resumens->periodo}}" disabled name="dotado" size="10" style="width: 800px; border-radius: 5px; border: 1px solid #39c;"/>  </pre>
                                                                                                                    
 Indicaciones a seguir(incluir en caso necesario medicamento,dosis, tiempo de tratamiento,dotacion mensual) <br>
 <center>
  <textarea disabled name="comentarios2" rows="20" cols="200" placeholder="Escribe aquí el resumen">{{$resumens->indicaciones}}</textarea>
  </center></span>
   <pre>          <label style="text-align: right;">Medico Especialista Tratante                         Responsable de la Unidad Medica Receptora                               Paciente</label>
          <label style="text-align: right;"></label>                                                          <label style="text-align: right;">y/o Responsable de Referencia</label>


  <label style="text-align: right;">______________________________________________</label>            <label style="text-align: right;">______________________________________________</label>              <label style="text-align: right;">_______________________________________</label>
               <label style="text-align: right;">Nombre,clave y firma</label>                                       <label style="text-align: right;">Nombre,clave y firma</label>                                       <label style="text-align: right;">Nombre y firma</label></pre>
    
     <p class="text-center">
      <a href="{{asset('pacientes')}}"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-circle-arrow-left"></span> Regresar </button></a>
      <a href="{{route('resumens.edit', $resumens->id)}}" class="btn btn-primary">Editar &nbsp;<i class="glyphicon glyphicon-edit"> </i></a>
</p>
    </form>
</div>
</div>
</div>
</div>

@endsection