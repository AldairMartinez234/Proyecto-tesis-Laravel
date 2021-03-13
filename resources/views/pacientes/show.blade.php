@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">

  	<legend><b>DATOS COMPLETOS DEL PACIENTE</b></legend>
    <p class="lead">Nombre: {{$vista_pacientes->nombre}}</p>
    <p class="lead">RFC: {{$vista_pacientes->RFC}}</p>
    <p class="lead">IDENTIFICADOR: {{$vista_pacientes->tipo}}</p>
    <p class="lead">No.ISSSTE: {{$vista_pacientes->noissste}}</p>
    <p class="lead">Edad: {{$vista_pacientes->edad}}</p>
    <p class="lead">Sexo: {{$vista_pacientes->sexo}}</p>
    <p class="lead">Telefono: {{$vista_pacientes->telefono}}</p>
    <p class="lead">Celular: {{$vista_pacientes->celular}}</p>

    <legend><b>Dirección del paciente</b></legend>

    <p class="lead">Dirección: {{$vista_pacientes->calle}}</p>
    <p class="lead">Entidad: {{$vista_pacientes->entidad}}</p>
    <p class="lead">Codigo Postal: {{$vista_pacientes->cp}}</p>
    <p class="lead">Referencias: {{$vista_pacientes->referencias}}</p>

     <legend><b>Datos del familiar</b></legend>

    <p class="lead">Nombre: {{$vista_pacientes->nombres}}</p>
    <p class="lead">Dirección: {{$vista_pacientes->direccion}}</p>
    <p class="lead">Entidad: {{$vista_pacientes->entidades}}</p>
    <p class="lead">Codigo Postal: {{$vista_pacientes->codigopostal}}</p>
    <p class="lead">Referencias: {{$vista_pacientes->referencia}}</p>
    <p class="lead">Telefono: {{$vista_pacientes->telefonos}}</p>
    <p class="lead">Celular: {{$vista_pacientes->celulares}}</p>

   <a href="{{asset('pacientes')}}"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-circle-arrow-left"></span> Regresar </button></a>
  </div>
</div>
@endsection