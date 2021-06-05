@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h1 class="all-tittles">SISTEMA DE CONTROL DE OXIGENO MEDICINAL <small>Administración de pacientes</small></h1>
    </div>
</div>
<div class="container-fluid" style="margin: 0px 0;">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
            <img src="{{asset('img/d1.png')}}" alt="user" class="img-responsive center-box" style="max-width: 110px;">
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
            Bienvenido a la sección para modificar a los usuarios. Para modificar solo debes de cambiar los campos del
            siguiente formulario solo los que desea modifcar.
        </div>
    </div>
</div>
<div class="container">
    <div class="container-flat-form">
        <div class="row">
            <div class="title-flat-form title-flat-blue">REGISTRO PARA NUEVOS PACIENTES</div>
            <form method="POST" action="{{ route('pacientes.store',$tokens) }}">
                {{csrf_field()}}
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                <div class="col-xs-11 col-sm-10 col-sm-offset-1">
                    <legend>Datos del paciente</legend>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name">{{ __('RFC: ')}}</label>
                            <input type="text" name="RFC" class="form-control" id="RFC" required="" />
                        </div>

                        <div class="form-group col-md-4">
                            <label form="name">Tipo: </label>
                            <select class="form-control" name="tipo" required="">
                                <option value="" disabled="" selected="">Seleccione una opcion</option>
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
                            <input type="text" class="form-control" name="noissste" id="noissste" required="">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="nombre"
                            placeholder="Escriba el nombre del paciente" id="nombre" required="">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label for="edad">Edad</label>
                            <input type="text" class="form-control" name="edad" id="edad" required="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="sexo">Sexo</label>
                            <select class="form-control" name="sexo" id="sexo" required="">
                                <option value="" disabled="" selected="">Seleccione una opcion</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="tel">Telefono</label>
                            <input type="number" class="form-control" name="tel">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">Celular</label>
                            <input type="number" class="form-control" name="cel">
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
                            <option disabled="">Seleccionar municipio</option>
                            @foreach($municipios as $municipios)
                            <option value="{{ $municipios->municipio }}">{{ $municipios->municipio }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="cp">Codigo Postal</label>
                        <input type="number" class="form-control" name="cp" data-toggle="tooltip" data-placement="top"
                            required="">
                    </div>

                    <div class="form-group col-md-7">
                        <label for="direc">Dirección</label>
                        <input type="text" class="form-control" name="calle" placeholder="Escriba la dirección"
                            data-toggle="tooltip" data-placement="top" required="">
                    </div>

                    <div class="form-group col-md-8">
                        <label for="refe">Referencias</label>
                        <input type="text" class="form-control" name="referencias" placeholder="" data-toggle="tooltip"
                            data-placement="top" required="">
                    </div>
                    <br><br><br><br><br><br><br><br>
                    <legend>Datos del familiar o responsable</legend>

                    <div class="form-group col-md-4">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="namefami"
                            placeholder="Escriba el nombre del paciente" data-toggle="tooltip" data-placement="top"
                            required="">
                    </div>

                    <div class="form-group col-md-2">
                        <label>Sexo: </label>
                        <select id="inputState" class="form-control" data-toggle="tooltip" data-placement="top"
                            name="sex" required="">
                            <option value="" disabled="" selected="">Seleccione</option>
                            <option>Masculino</option>
                            <option>Femenino</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Telefono</label>
                        <input type="number" class="form-control" name="telfami" data-toggle="tooltip"
                            data-placement="top" required="">
                    </div>

                    <div class="form-group col-md-3">
                        <label>Celular</label>
                        <input type="number" class="form-control" name="celfami" data-toggle="tooltip"
                            data-placement="top" required="">
                    </div>

                    <div class="form-group col-md-3">
                        <label form="name">Municipio: </label>
                        <select id="entifami" name="entifami" class="form-control">
                            <option disabled="">Seleccionar municipio</option>
                            @foreach($municipio as $municipio)
                            <option value="{{ $municipio->municipio }}">{{ $municipio->municipio }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="cp">Codigo Postal</label>
                        <input type="number" class="form-control" name="cpfami" data-toggle="tooltip"
                            data-placement="top" required="">
                    </div>

                    <div class="form-group col-md-7">
                        <label for="direccion1">Dirección</label>
                        <input type="text" class="form-control" name="direcfami" placeholder="Escriba la dirección"
                            data-toggle="tooltip" data-placement="top" required="">
                    </div>

                    <div class="form-group col-md-9">
                        <label for="referencias1">Referencias</label>
                        <input type="text" class="form-control" name="refefami" placeholder="" data-toggle="tooltip"
                            data-placement="top" required="">
                    </div>

                </div>
                <br><br><br><br><br><br>
                <br><br><br><br><br><br>
                <br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br>
                <br>
                <p class="text-center">
                    <a href="{{asset('pacientes')}}"><button type="button" class="btn btn-info"><span
                                class="glyphicon glyphicon-circle-arrow-left"></span> Regresar </button></a>
                    <button type="reset" class="btn btn-info"><i class="zmdi zmdi-floppy"></i>
                        {{ __('Limpiar') }}</button>
                    <button type="submit" id="lector" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i>
                        {{ __('Guardar') }}</button>
                    <input type="button" id="activeSensorLocal" onclick="activarSensor('{{ $tokens }}')"
                        class="btn btn-danger guardar" value="Asociar Huella"></input>
                </p>
                <center>
                    <div id="fingerPrint"
                        style="border: solid 1px black;width: 18%;height: 290px;margin-top: 5px;display: none;">
                        <div style="display: block">
                            <img id="token" src="{{asset('img/finger.png')}}" style="width: 80%;margin-left: 9%;">
                        </div>
                        <div style="display: block;padding-left: 3px;">
                            <label id="_status" style="margin-left: 5px;">
                                Estado del sensor: Inactivo
                            </label>
                            <textarea id="_texto" cols="30" rows="3">
                        ---
                    </textarea>
                        </div>
                    </div>

                </center>
            </form>
        </div>
    </div>
</div>
<script>
function activarSensor(srn) {

    $.ajax({
        async: true,
        type: "GET",
        url: "{{route('pacientes.lector', $tokens)}}",
        data: "&token=" + srn,
        dataType: "json",
        success: function(data) {
            var json = JSON.parse(data);
            console.log(json);
            if (json["filas"] === 1) {
                $("#activeSensorLocal").attr("disabled", true);
                $("#fingerPrint").css("display", "block");
            }
        }
    });
}


$("#lector").attr("disabled", "disabled");
$(".guardar").on("click", function() {

    //En este caso esta simulado el valor de la variable **acc**
    //Aquí tendrías que obtener el valor para después compararlo 
    //y decidir si se inhabilita o no
    var acc = "Diferencias";

    //this hace referencia al botón al cual se le dio click
    if (acc == "Diferencias") {
        $("#lector").removeAttr("disabled");
    } else {
        $("#lector").attr("disabled", "disabled");
    }

});
</script>

<script>
var timestamp = null;
var token = localStorage.getItem("srnPc");

function cargar_push() {
    $.ajax({
        async: true,
        type: "GET",
        url: "http://192.168.1.77:8000/pacientes/httpush/" + timestamp + "/" + token,
        dataType: "json",
        success: function(url) {
            var json = JSON.parse(JSON.stringify(url));
            timestamp = json["timestamp"];
            imageHuella = json["imgHuella"];
            tipo = json["tipo"];
            id = json["id"];
            $("#_status").text(json["statusPlantilla"]);
            $("#_texto").text(json["texto"]);
            if (imageHuella !== null) {
                $("#token").attr("src", "data:image/png;base64," + imageHuella);
                if (tipo === "leer") {
                    $("#id").text(json["paciente_id"]);
                    $("#nombre").text(json["nombre"]);
                }
            }
            setTimeout("cargar_push()", 1000);
        }
    });
}

$.ajax({
    async: true,
    type: "GET",
    url: "http://192.168.1.77:8000/pacientes/httpush/" + timestamp + "/" + token,
    dataType: "json",
    success: function(url) {
        var json = JSON.parse(JSON.stringify(url));
        timestamp = json["timestamp"];
        imageHuella = json["imgHuella"];
        tipo = json["tipo"];
        id = json["id"];
        $("#_status").text(json["statusPlantilla"]);
        $("#_texto").text(json["texto"]);
        if (imageHuella !== null) {
            $("#token").attr("src", "data:image/png;base64," + imageHuella);
            if (tipo === "leer") {
                $("#id").text(json["paciente_id"]);
                $("#nombre").text(json["nombre"]);
            }
        }
        setTimeout("cargar_push()", 1000);
    }
});

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
</script>


@endsection