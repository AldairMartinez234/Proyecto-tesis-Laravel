@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
  	<h2 class="">DATOS COMPLETOS DEL FAMILIAR</h2>
    <h2>Nombre: {{$datos__familiars->nombre}}</h2>
    <p class="lead">Sexo: {{$datos__familiars->sexo}}</p>
    <p class="lead">Telefono: {{$datos__familiars->telefono}}</p>
    <p class="lead">Celular: {{$datos__familiars->celular}}</p>

   <legend><B>DIRECCION</B></legend> 
    <p class="lead">DIRECCIÓN: {{$datos__familiars->calle}}</p>
    <p class="lead">ENTIDAD: {{$datos__familiars->entidad}}</p>
    <p class="lead">CODIGO POSTAL: {{$datos__familiars->cp}}</p>
    <p class="lead">REFERENCIAS: {{$datos__familiars->referencias}}</p>
    
   <a href="{{asset('pacientes')}}"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-circle-arrow-left"></span> Regresar </button></a>
  </div>
</div>
@endsection