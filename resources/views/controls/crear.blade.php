@extends('layouts.app')

@section('content')

<div class="container">
    <div class="page-header">
        <h1 class="all-tittles">SISTEMA DE CONTROL DE OXIGENO MEDICINAL <small>Administración de pacientes</small></h1>
    </div>
    <div class="">
        <div class="row">
            <div class="title-flat-form title-flat-blue">CONTROL DE PACIENTE DE OXÍGENO O CPAC DOMICILIARIO</div>
            <form method="POST" action="{{route('controls.crear', $paciente->id)}}">
                @method('POST')
                @csrf
                <pre style="background-color:#ECF0F5">
NÚMERO DE CONTROL INTERNO: <input type="number" name="num_control" size="10" style="border-radius: 5px; border: 1px solid #39c;"/>
    
NOMBRE DEL PACIENTE: <input type="text" name="name" value="{{$paciente->nombre}}" size="10" style="border-radius: 5px; border: 1px solid #39c; width: 300px;"/>

CÉDULA:              <input type="text" name="rfc" value="{{$paciente->RFC}}" size="10" style="border-radius: 5px; border: 1px solid #39c; width: 200px;"/>
    
MÉDICO QUE INDICA EL SUMINISTRO: <input type="text" name="medico" size="10" style="border-radius: 5px; border: 1px solid #39c; width: 300px;"/>
    
DOSIS INDICADA: <input type="text" name="dosis" style="border-radius: 5px; border: 1px solid #39c; width: 100px;"/>
    
FECHA DE INICIO: <input type="date" name="inicio"  style="border-radius: 5px; border: 1px solid #39c;"/>&nbsp; &nbsp; DIRECCIÓN: <input type="text"  value="{{$paciente->calle}}" size="10" style="border-radius: 5px; border: 1px solid #39c; width: 400px;"/>
    
FECHA DE BAJA: <input type="date" name="baja" size="10" style="border-radius: 5px; border: 1px solid #39c;"/> &nbsp; &nbsp;TELÉFONO: <input type="text" value="{{$paciente->telefono}}" size="10" style="border-radius: 5px; border: 1px solid #39c; width: 100px;"/></pre>

                <table border=".5">
                    <tbody>
                        <tr>

                            <th>
                                <center>MES</center>
                            </th>

                            <th style="width:400px">
                                <center>NOMBRE/FIRMA DEL PACIENTE O FAMILIAR RESPONSABLE</center>
                            </th>

                            <th style="width:400px">
                                <center>SELLO DE LA JEFATURA DE CONSULTA EXTERNA</center>
                            </th>
                            <th style="width:400px">
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
                <p class="text-center">
                    <a href="{{asset('pacientes')}}"><button type="button" class="btn btn-info"><span
                                class="glyphicon glyphicon-circle-arrow-left"></span> Regresar </button></a>
                    <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i>
                        {{ __('Guardar') }}</button>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection