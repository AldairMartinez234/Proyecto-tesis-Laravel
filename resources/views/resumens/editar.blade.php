@extends('layouts.app')

@section('content')


<div class="container">
    <div class="page-header">
        <h1 class="all-tittles">SISTEMA DE CONTROL DE OXIGENO MEDICINAL <small>Administración de pacientes</small></h1>
    </div>
    <div class="">
        <div class="row">
            <div class="title-flat-form title-flat-blue">RESUMEN MEDICO</div>
            <form method="POST" action="{{route('resumens.modificar',$resumens->id)}}">
                @method('PUT')
                @csrf
                <br><span style="float:right">
                    <pre> Folio No. <input type="number"  value="{{$resumens->folio}}" name="folio" size="10" style="border-radius: 5px; border: 1px solid #39c;" /></pre>
                </span>
                <br><br><br>
                <span style="float:right">
                    <label>Fecha y hora: <input type="datatime" name="fecha" value="{{$resumens->fecha}}" disabled
                            style=" border-radius: 5px; border: 1px solid #39c; text-align: center;"></label>
                </span>
                <br><br>
                <div class="form-row">
                    <pre>      Unidad medica emisora: <input type="text"  name="Unidad" value="{{$resumens->unidadmedica}}"  class="form" size="10" style="width: 475px; border-radius: 5px; border: 1px solid #39c;" />      Clave:  <input type="text"value="{{$resumens->clave}}"  name="clave" size="10" style="width: 320px; border-radius: 5px; border: 1px solid #39c;"/> 

      Nombre del paciente:   <input type="text"  name="nombre" value="{{$resumens->nombre}}" disabled style="width: 530px; border-radius: 5px; border: 1px solid #39c;"/>      Num.Expediente:   <input type="text"  value="{{$resumens->numexpediente}}" name="num" size="10" style="width: 195px; border-radius: 5px; border: 1px solid #39c;"/>

      Motivo de la contrareferencia: <input type="text" value="{{$resumens->contrareferencia}}"  name="contrareferencia" size="10" style="width: 475px; border-radius: 5px; border: 1px solid #39c;"/>  Tel: <input type="text"   name="tel" value="{{$resumens->telefono}}" disabled="" size="10"  style="width: 140px; border-radius: 5px; border: 1px solid #39c;"/> 
    
      Total de interconsultas:   <input type="text"   value="{{$resumens->interonsultas}}" name="interconsultas" size="10" style="width: 80px; border-radius: 5px; border: 1px solid #39c;"/>   Total de consultas otorgadas:   <input type="text" value="{{$resumens->totalconsultas}}"  name="consultas" size="10" style="width: 80px; border-radius: 5px; border: 1px solid #39c;"/>   Diagnostico de referencia:  <input type="text" value="{{$resumens->diagnostico}}"  name="diagnostico" size="10" style="width: 240px; border-radius: 5px; border: 1px solid #39c;"/>

      Diagnostico de contrareferencia:  <input type="text"  value="{{$resumens->diag_contrareferencia}}" name="contrare" size="10" style="width: 815px; border-radius: 5px; border: 1px solid #39c;"/> </pre>
                </div>
                <div class="form-row">
                    <pre>      Unidad medica a la que se contrarefiere: <input type="text" value="{{$resumens->unidadcontrarefiere}}"  name="contrarefiere" size="10" style="width: 490px; border-radius: 5px; border: 1px solid #39c;"/>  Nivel de atencion: <input type="text" value="{{$resumens->nivelatencion}}"  name="atencion" size="10" style="width: 125px; border-radius: 5px; border: 1px solid #39c;"/>
    
      Unidad medica de Adscripcion del Paciente: <input type="text" value="{{$resumens->adscripcion}}"  name="adscripcion" size="10" style="width: 475px; border-radius: 5px; border: 1px solid #39c;"/>  Clave: <input type="text" value="{{$resumens->clavemedica}}"  name="clave2" size="10" style="width: 210px; border-radius: 5px; border: 1px solid #39c;"/>
    
      Servicio: <input type="text"  value="{{$resumens->servicio}}" name="servicio" size="10" style="width: 985px; border-radius: 5px; border: 1px solid #39c;"/></pre>
                </div>
                <center>
                    <textarea name="comentarios" rows="30" cols="200"
                        placeholder="Escribe aquí el resumen">{{$resumens->resumen}}</textarea>
                </center>
                <pre>      Requiere tratamiento farmacologico:              <input type="text" value="{{$resumens->tratamiento}}"  name="farmacologico" size="10" style="width : 25px; heigth : 5px; border-radius: 5px; border: 1px solid #39c;"/>   <input type="text" value="{{$resumens->tratamiento2}}"  name="farmacologico2" size="10"  style="width : 25px; heigth : 5px; border-radius: 5px; border: 1px solid #39c;"/>                    Se dota medicamento al paciente:  <input type="text" value="{{$resumens->medicamento}}"  name="medicamento" size="10"  style="width : 25px; heigth : 5px; border-radius: 5px; border: 1px solid #39c;"/>  <input type="text"  name="medicamento2" value="{{$resumens->medicamento2}}" size="10"  style="width : 25px; heigth : 5px; border-radius: 5px; border: 1px solid #39c;"/> 
    
      Medicamento Dotado para el periodo: <input type="text"  value="{{$resumens->periodo}}"  name="dotado" size="10" style="width: 800px; border-radius: 5px; border: 1px solid #39c;"/>  </pre>

                Indicaciones a seguir(incluir en caario medicamento,dosis, tiempo de tratamiento,dotacion mensual) <br>
                <center>
                    <textarea name="comentarios2" rows="20" cols="200"
                        placeholder="Escribe aquí el resumen">{{$resumens->indicaciones}}</textarea>
                </center></span>
                <pre>          <label style="text-align: right;">Medico Especialista Tratante                         Responsable de la Unidad Medica Receptora                               Paciente</label>
          <label style="text-align: right;"></label>                                                          <label style="text-align: right;">y/o Responsable de Referencia</label>


  <label style="text-align: right;">______________________________________________</label>            <label style="text-align: right;">______________________________________________</label>              <label style="text-align: right;">_______________________________________</label>
               <label style="text-align: right;">Nombre,clave y firma</label>                                       <label style="text-align: right;">Nombre,clave y firma</label>                                       <label style="text-align: right;">Nombre y firma</label></pre>

                <p class="text-center">
                    <a href="{{asset('pacientes')}}"><button type="button" class="btn btn-info"><span
                                class="glyphicon glyphicon-circle-arrow-left"></span> Regresar </button></a>
                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i>
                        Guardar cambios</button>
                </p>
            </form>
        </div>
    </div>
</div>
</div>

@endsection