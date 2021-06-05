<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
</head>

<body>
    <div class="container">
        <div class="">
            <div class="row">
                <div class="title-flat-form title-flat-blue">
                    <center>CONTROL DE PACIENTE DE OXÍGENO O CPAC DOMICILIARIO</center>
                </div><br><br>
                <font size="2"><b>
                        NÚMERO DE CONTROL INTERNO: <input type="text" value="{{$paciente->num_interno}}" size="10" style="width: 300px" />
                        <br>
                        NOMBRE DEL PACIENTE: <input type="text" value="{{$paciente->nombre}}" size="10" style="width: 300px" />
                        <br>
                        CÉDULA: <input type="text" value="{{$paciente->RFC}}" size="10" style="width: 200px" />
                        <br>
                        MÉDICO QUE INDICA EL SUMINISTRO: <input type="text" value="{{$paciente->medico}}" size="10" style="width: 300px" />
                        <br>
                        DOSIS INDICADA: <input type="text" value="{{$paciente->dosis}}" size="10" />
                        <br>
                        FECHA DE INICIO: <input type="text" value="{{$paciente->inicio}}" size="10" /> DIRECCIÓN: <input type="text" value="{{$paciente->calle}}" size="10" style="width: 300px" />
                        <br>
                        FECHA DE BAJA: <input type="text" value="{{$paciente->baja}}" size="10" /> TELÉFONO: <input type="text" value="{{$paciente->telefono}}" size="10" /></b></font>
                <br><br>
                <table border="0.5" cellpadding="1" cellspacing="0">
                    <tbody>
                        <tr>

                            <th>
                                <center>MES</center>
                            </th>

                            <th>
                                <center>NOMBRE/FIRMA DEL PACIENTE O FAMILIAR RESPONSABLE</center>
                            </th>

                            <th>
                                <center>SELLO DE LA JEFATURA DE CONSULTA EXTERNA</center>
                            </th>
                            <th>
                                <center>OBSERVACIONES</center>
                            </th>
                        <tr>

                            <th style="text-align: center;">ENERO</th>
                            <td style="height:50px"></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th style="text-align: center;">FEBRERO</th>
                            <td style="height:50px"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>

                            <th style="text-align: center;">MARZO</th>

                            <td style="height:50px"></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>

                            <th style="text-align: center;">ABRIL</th>
                            <td style="height:50px"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>

                            <th style="text-align: center;">MAYO</th>
                            <td style="height:50px"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th style="text-align: center;">JUNIO</th>
                            <td style="height:50px"></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th style="text-align: center;">JULIO</th>
                            <td style="height:50px"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th style="text-align: center;">AGOSTO</th>
                            <td style="height:50px"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th style="text-align: center;">SEPTIEMBRE</th>
                            <td style="height:50px"></td>
                            <td></td>
                            <td></td>
                        </tr>


                        <tr>
                            <th style="text-align: center;">OCTUBRE</th>
                            <td style="height:50px"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th style="text-align: center;">NOVIEMBRE</th>
                            <td style="height:50px"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th style="text-align: center;">DICIEMBRE</th>
                            <td style="height:50px"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tr>
                    </tbody>
                </table>
                </BR>
                </BR>
                </form>
            </div>
        </div>
    </div>
</body>

</html>