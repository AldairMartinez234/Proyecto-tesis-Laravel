@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
  	<h2 class="">DIRECCION DEL PACIENTE</h2>
    <h2>Nombre: </h2>
    <p class="lead">DIRECCIÓN: {{$direccion->calle}}</p>
    <p class="lead">ENTIDAD: {{$direccion->entidad}}</p>
    <p class="lead">CODIGO POSTAL: {{$direccion->cp}}</p>
    <p class="lead">REFERENCIAS: {{$direccion->referencias}}</p>

   <a href="{{asset('pacientes')}}"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-circle-arrow-left"></span> Regresar </button></a>
  </div>
</div>
@endsection