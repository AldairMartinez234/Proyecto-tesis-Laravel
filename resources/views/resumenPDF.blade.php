<html>

<head>
    <title>Resumen Medico de {{$paciente->nombre}}</title>
</head>

<body>
    <div>
        <img src='img/ISSSTE_logo.png' width="180px" height="50px" style="float:left;">
        <span style="float:left;">
            <font size="2">&nbsp; &nbsp; SM-1-17 "Solicitud de Referencia y Contrarreferencia de Pacientes"<br>
                &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Orden de Conferencia de Pacientes</font>
        </span>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;<font size="1">
            Folio No. <input type="text" value="{{$paciente->folio}}"
                style="width:110px; border-right: 0; border-left: 0; border-top: 0;" /></font>
    </div>
    <span style="float:right">
        <font size="1">Fecha y hora: <input type="text" name="fecha" value="{{$paciente->fecha}}"
                style=" border-right: 0; border-left: 0; border-top: 0;"></font>
    </span>
    <br><br>

    <font size="1"><label>Unidad medica emisora:</label> <input type="text" name="folio"
            value="{{$paciente->unidadmedica}}"
            style="width:350px;  border-top: 0;  border-right: 0; border-left: 0; font:1;" />
        Clave: <input type="text" name="folio" value="{{$paciente->clave}}"
            style="width:190px;  border-top: 0; border-right: 0; border-left: 0;" />

        <label>Nombre del paciente: </label> <input type="text" value="{{$paciente->nombre}}"
            style="width:390px; border-top: 0; border-right: 0; border-left: 0;" /> Num.Expediente: <input type="text"
            value="{{$paciente->numexpediente}}" size="10"
            style="width:113px; border-top: 0; border-right: 0; border-left: 0;" />
        Motivo de la contrareferencia: <input type="text" value="{{$paciente->contrareferencia}}" size="10"
            style="width:390px; border-top: 0; border-right: 0; border-left: 0;" /> Tel: <input type="text"
            value="{{$paciente->telefono}}" style="width:137px; border-top: 0; border-right: 0; border-left: 0;" />

        Total de interconsultas: <input type="text" value="{{$paciente->interonsultas}}" size="10"
            style="width:40px; border-top: 0;  border-right: 0; border-left: 0;" /> Total de consultas otorgadas: <input
            type="text" value="{{$paciente->totalconsultas}}" size="10"
            style="width:40px; border-top: 0; border-right: 0; border-left: 0;" /> Diagostico de referencia: <input
            type="text" value="{{$paciente->diagnostico}}" size="10"
            style="width:245px; border-top: 0; border-right: 0; border-left: 0;" />

        Diagnostico de contrareferencia: <input type="text" value="{{$paciente->diag_contrareferencia}}" size="10"
            style="width:548px; border-top: 0; border-right: 0; border-left: 0;" />
    </font>

    <hr>

    <font size="1">Unidad medica a la que se contrarefiere: <input type="text"
            value="{{$paciente->unidadcontrarefiere}}" size="10"
            style="width:350px; border-top: 0; border-right: 0; border-left: 0;" /> Nivel de atencion: <input
            type="text" value="{{$paciente->nivelatencion}}" size="10"
            style="width:70px; border-top: 0; border-right: 0; border-left: 0;" />

        Unidad medica de Adscripcion del Paciente: <input type="text" value="{{$paciente->adscripcion}}" size="10"
            style="width:350px; border-top: 0; border-right: 0; border-left: 0;" /> Clave: <input type="text"
            value="{{$paciente->clavemedica}}" size="10"
            style="width:105px; border-top: 0; border-right: 0; border-left: 0;" />

        Servicio: <input type="text" value="{{$paciente->servicio}}" size="10"
            style="width:650px; border-top: 0; border-right: 0; border-left: 0;" />

        <hr>
        <textarea name="comentarios" style="height: 263px">{{$paciente->resumen}}</textarea>
    </font>
    <hr>

    <font size="1">Requiere tratamiento farmacologico: <input type="text" value="{{$paciente->tratamiento}}" size="10"
            style="width:50px; border-top: 0; border-right: 0; border-left: 0;" /> <input type="text"
            value="{{$paciente->tratamiento2}}" size="10"
            style="width:50px; border-top: 0; border-right: 0; border-left: 0;" /><b>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp; &nbsp;</b>Se dota medicamento al paciente: <input type="text"
            value="{{$paciente->medicamento}}" size="10"
            style="width:50px; border-top: 0; border-right: 0; border-left: 0;" /> </blockquote> <input type="text"
            value="{{$paciente->medicamento2}}" size="10"
            style="width:50px; border-top: 0; border-right: 0; border-left: 0;" />
        Medicamento Dotado para el periodo: <input type="text" value="{{$paciente->periodo}}" size="10"
            style="width:510px; border-top: 0; border-right: 0; border-left: 0;" />
        <br>
        Indicaciones a seguir(incluir en caso necesario medicamento,dosis, tiempo de tratamiento,dotacion mensual) <br>
        <textarea name="comentarios" style="height: 150px">{{$paciente->indicaciones}}</textarea>
    </font>

    <hr>
    <pre><font size="1">    <label style="text-align: right;">Medico Especialista Tratante        Responsable de la Unidad Medica Receptora          Paciente</label>
          <label style="text-align: right;"></label>                                    <label style="text-align: right;">y/o Responsable de Referencia</label>
          <br><br><br><br><br><br>                                                                                 <label>{{$paciente->nombre}}</label>
<label style="text-align: right;"> ___________________________________    _____________________________________    _____________________________</label></font>
<font size="1">         <label style="text-align: right;">Nombre,clave y firma</label>                    <label style="text-align: right;">Nombre,clave y firma</label>                   <label style="text-align: right;">Nombre y firma</label></font>  </pre>
</body>

</html>