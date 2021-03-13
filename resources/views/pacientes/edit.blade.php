@extends('layouts.app')

@section('content')
 <div class="container" >
            <div class="page-header">
              <h1 class="all-tittles">SISTEMA DE CONTROL DE OXIGENO MEDICINAL <small>Administración de usuarios</small></h1>
            </div>
        </div>
        <div class="container-fluid"  style="margin: 0px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="{{asset('img/d1.png')}}" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección para modificar a los usuarios. Para modificar solo debes de cambiar los campos del siguiente formulario solo los que desea modifcar. 
                </div>
            </div>
        </div>
<div class="container">
    <div class="container-flat-form">
    	<div class="row">
	<div class="title-flat-form title-flat-blue">REGISTRO PARA MODIFICAR PACIENTES</div>
      <form method="POST" action="{{route('pacientes.update',$paciente->id)}}">
      	@method('PUT')
        @csrf
          <div class="col-xs-11 col-sm-10 col-sm-offset-1">
        <legend>Datos del paciente</legend> 
<input type="hidden" name="paciente_id" id="paciente_id" value="{{$paciente->paciente_id}}">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="name" >{{ __('RFC: ')}}</label>
  <input type="text" name="RFC" class="form-control" id="RFC" required="" value="{{$paciente->RFC}}" />
    </div>
    
    <div class="form-group col-md-4">
      <label form="name">Tipo: </label>
<select class="form-control" name="tipo" required="">
    <option value="{{$paciente->tipo}}">{{$paciente->tipo}}</option>
    <option value="10-TRABAJADOR">10-TRABAJADOR</option>
    <option value="20-TRABAJADORA">20-TRABAJADORA</option>
    <option value="30-ESPOSA">30-ESPOSA</option>
    <option value="31-CONCUBINA">31-CONCUBINA</option> 
    <option value="32-MUJER">32-MUJER</option>
    <option value="40-ESPOSO">40-ESPOSO</option>
    <option value="41-CONCUBINO">41-CONCUBINO</option>
    <option value="50-PADRE">50-PADRE</option>
    <option value="51-ABUELO">51-ABUELO</option>
    <option value="60-MADRE">60-MADRE</option>
    <option value="61-ABUELA">61 ABUELA</option>
    <option value="70-HIJO">70-HIJO</option>
    <option value="71-HIJO DE CONYUGE">71 HIJO DE CONYUGE</option>
    <option value="80-HIJA">80-HIJA</option>
    <option value="81-HIJA DE CONYUGE">81-HIJA DE CONYUGE</option>
    <option value="90-PENSIONADO">90-PENSIONADO</option>
    <option value="91-PENSIONADA">91-PENSIONADA</option>
    <option value="92-FAMILIAR DE PENSIONADO">92-FAMILIAR DE PENSIONADO</option>
    <option value="95-ASEGURADO INSABI MASCULINO">95-ASEGURADO INSABI MASCULINO </option>
    <option value="96-ASEGURADO INSABI FEMENINO">96-ASEGURADO INSABI FEMENINO</option>  
</select>
    </div>
    <div class="form-group col-md-4">
      <label for="name">No.ISSSTE:</label>
      <input type="text" class="form-control" name="noissste" id="noissste" required="" value="{{$paciente->noissste}}">
    </div>
  </div>
  <div class="form-group col-md-5">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Escriba el nombre del paciente" id="nombre" required="" value="{{$paciente->nombre}}"> 
  </div>
   <div class="form-row">
    <div class="form-group col-md-1">
      <label for="edad">Edad</label>
      <input type="text" class="form-control" name="edad" id="edad" required="" value="{{$paciente->edad}}">
    </div>
    <div class="form-group col-md-2">
      <label for="sexo">Sexo</label>
      <select  class="form-control" name="sexo" id="sexo" required="" value="{{$paciente->sexo}}" >
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
      </select>
    </div>
  </div>
   <div class="form-row">
    <div class="form-group col-md-2">
      <label for="tel">Telefono</label>
      <input type="number" class="form-control" name="tel" value="{{$paciente->telefono}}" >
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Celular</label>
      <input type="number" class="form-control" name="cel" value="{{$paciente->celular}}">
    </div>
  </div>
  <br><br><br><br><br><br><br>
   <legend>Dirección</legend> 
 <?php 
use App\Sepomex;

$municipios = DB::SELECT("SELECT distinct municipio FROM sepomex where estado='morelos' ");

$municipio = DB::SELECT("SELECT distinct municipio FROM sepomex where estado='morelos' ");

 ?>
    <div class="form-group col-md-3">
       <label form="name">Municipio: </label>
    <select id="entidad" name="entidad" class="form-control">    
      <option value="{{$paciente->entidad}}">{{$paciente->entidad}}</option>
       @foreach($municipios as $municipios)
       <option value="{{ $municipios->municipio }}">{{ $municipios->municipio }}</option>
       @endforeach
   </select>
 </div>

    <div class="form-group col-md-2">
      <label for="cp">Codigo Postal</label>
      <input type="number" class="form-control" name="cp" data-toggle="tooltip" data-placement="top"  required="" value="{{$paciente->cp}}">
    </div>


  <div class="form-group col-md-7">
     <label for="direc">Dirección</label>
    <input type="text" class="form-control" name="calle" placeholder="Escriba la dirección" data-toggle="tooltip" data-placement="top"  required="" value="{{$paciente->calle}}">
  </div>

    <div class="form-group col-md-8">
    <label for="refe">Referencias</label>
    <input type="text"class="form-control" name="referencias" placeholder="" data-toggle="tooltip" data-placement="top"  required="" value="{{$paciente->referencias}}">
    </div>
<br><br><br><br><br><br><br><br>
    <legend>Datos del familiar o responsable</legend> 
  
  <div class="form-group col-md-4">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" name="namefami" placeholder="Escriba el nombre del paciente" data-toggle="tooltip" data-placement="top"  required=""value="{{$paciente->nombres}}">
  </div>

    <div class="form-group col-md-2">
     <label>Sexo: </label>
      <select id="inputState" class="form-control" data-toggle="tooltip" data-placement="top" name="sex"  required="" value="{{$paciente->sexos}}">
        <option>Masculino</option>
        <option>Femenino</option>
      </select>
    </div>

    <div class="form-group col-md-3">
      <label>Telefono</label>
      <input type="number" class="form-control" name="telfami" data-toggle="tooltip" data-placement="top"  required="" value="{{$paciente->telefonos}}">
    </div>

    <div class="form-group col-md-3">
      <label >Celular</label>
      <input type="number" class="form-control" name="celfami" data-toggle="tooltip" data-placement="top"  required="" value="{{$paciente->celulares}}">
    </div>

    <div class="form-group col-md-3">
       <label form="name">Municipio: </label>
    <select id="entifami" name="entifami" class="form-control">
      <option value="{{$paciente->entidades}}">{{$paciente->entidades}}</option>
       @foreach($municipio as $municipio)
       <option value="{{ $municipio->municipio }}">{{ $municipio->municipio }}</option>
       @endforeach
   </select>
 </div>

  <div class="form-group col-md-2">
      <label for="cp">Codigo Postal</label>
      <input type="number" class="form-control" name="cpfami" data-toggle="tooltip" data-placement="top"  required="" value="{{$paciente->codigopostal}}" >
    </div>

  <div class="form-group col-md-7">
    <label for="direccion1">Dirección</label>
    <input type="text" class="form-control" name="direcfami" placeholder="Escriba la dirección" data-toggle="tooltip" data-placement="top"  required="" value="{{$paciente->direccion}}">
  </div>

<div class="form-group col-md-9">
    <label for="referencias1">Referencias</label>
    <input type="text" class="form-control" name="refefami" placeholder="" data-toggle="tooltip" data-placement="top"  required="" value="{{$paciente->referencia}}">
  </div>

  </div>
  <br><br><br><br><br><hr><br>
  <br><br><br><hr><hr><hr><br>
  <br><br><br><hr><hr><br><br><br>
  <hr><br><br><br><br><hr><hr>
  <p class="text-center">
    <a href="{{asset('pacientes')}}"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-circle-arrow-left"></span> Regresar </button></a>
  <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> {{ __('Guardar Cambios') }}</button>
</p>
</form>
</div>
</div>
</div>
@endsection