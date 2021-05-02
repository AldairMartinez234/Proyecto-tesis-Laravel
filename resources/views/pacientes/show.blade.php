@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <fieldset
            style="border-radius: 5px; padding: 5px; min-height:150px; border:8px solid  #7E030A; background-color:#eeece1;">
            <legend align="center"
                style=" margin-left:20px;background-color:#7E030A; padding-left:10px; padding-top:5px; padding-right:120px; padding-bottom:5px; ; color:white; border-radius:15px; border:8px solid #eeece1; font-size:25px;">
                <b>Datos del paciente</b></legend>
            <div style="padding:  10px 90px 20px;">
                <p class="lead"><b> Nombre:</b> {{$vista_pacientes->nombre}}</p>
                <p class="lead"><b> RFC:</b> {{$vista_pacientes->RFC}}</p>
                <p class="lead"><b> Identificador:</b> {{$vista_pacientes->tipo}}</p>
                <p class="lead"><b> No.ISSSTE:</b> {{$vista_pacientes->noissste}}</p>
                <p class="lead"><b> Edad:</b> {{$vista_pacientes->edad}}</p>
                <p class="lead"><b> Sexo:</b> {{$vista_pacientes->sexo}}</p>
                <p class="lead"><b> Telefono:</b> {{$vista_pacientes->telefono}}</p>
                <p class="lead"><b> Celular:</b> {{$vista_pacientes->celular}}</p>
            </div>
        </fieldset>

        <fieldset
            style="border-radius: 5px; padding: 5px; min-height:150px; border:8px solid  #7E030A; background-color:#eeece1;">
            <legend align="center"
                style=" margin-left:20px;background-color:#7E030A; padding-left:10px; padding-top:5px; padding-right:120px; padding-bottom:5px; ; color:white; border-radius:15px; border:8px solid #eeece1; font-size:25px;">
                <b>Dirección del paciente</b></legend>
            <div style="padding:  10px 90px 20px;">
                <p class="lead"><b>Dirección:</b> {{$vista_pacientes->calle}}</p>
                <p class="lead"><b>Entidad:</b> {{$vista_pacientes->entidad}}</p>
                <p class="lead"><b>Codigo Postal:</b> {{$vista_pacientes->cp}}</p>
                <p class="lead"><b>Referencias:</b> {{$vista_pacientes->referencias}}</p>
            </div>
        </fieldset>
        <fieldset
            style="border-radius: 5px; padding: 5px; min-height:150px; border:8px solid  #7E030A; background-color:#eeece1;">
            <legend align="center"
                style=" margin-left:20px;background-color:#7E030A; padding-left:10px; padding-top:5px; padding-right:120px; padding-bottom:5px; ; color:white; border-radius:15px; border:8px solid #eeece1; font-size:25px;">
                <b>Datos del familiar</b></legend>
            <div style="padding:  10px 90px 20px;">
                <p class="lead"><b>Nombre:</b> {{$vista_pacientes->nombres}}</p>
                <p class="lead"><b>Dirección:</b> {{$vista_pacientes->direccion}}</p>
                <p class="lead"><b>Entidad:</b> {{$vista_pacientes->entidades}}</p>
                <p class="lead"><b>Codigo Postal:</b> {{$vista_pacientes->codigopostal}}</p>
                <p class="lead"><b>Referencias:</b> {{$vista_pacientes->referencia}}</p>
                <p class="lead"><b>Telefono:</b> {{$vista_pacientes->telefonos}}</p>
                <p class="lead"><b>Celular:</b> {{$vista_pacientes->celulares}}</p>
            </div>
        </fieldset>
        <br>
        <center>
            <a href="{{asset('pacientes')}}"><button type="button" class="btn btn-info"><span
                        class="glyphicon glyphicon-circle-arrow-left"></span> Regresar </button></a>
        </center>
    </div>
</div>
@endsection