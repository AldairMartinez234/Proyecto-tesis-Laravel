@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center all-tittles">LISTA DE UNIDADES MEDICAS</h2>
    <hr size=10 noshade="noshade">
    @can('usuarios.create')
    <a href="#" data-toggle="modal" data-target="#create_unidades"><button type="button"
            class="btn btn-success float-right" data-toggle="tooltip" data-placement="top"><i
                class="zmdi zmdi-account-add zmdi-hc-fw"></i>Agregar Nuevo Unidad Medica</button></a>
    @endcan
    @if(session('important'))
    <div class="alert alert-success alert-dismissable">
        <a href="{{asset('unidades')}}"><button type="button" class="close" data-dismiss="alert">&times;</button></a>
        {{session('important')}}
        @endif
    </div>
    @include('unidades.create')
    <br>
    {{ csrf_field() }}
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <div class="box">
        <div class="box-body ">
            <table id="example10" class="table table-bordered table-striped table-hover" style="text-align: center;">
                <thead>
                    <tr class="table-primary">
                        <th style="text-align: center;">Unidad</th>
                        <th style="text-align: center;">Nombre del responsable</th>
                        <th style="text-align: center;">Telefono</th>
                        <th style="text-align: center;">Extension</th>
                        <th style="text-align: center;">Telefono particular</th>
                        @can('usuarios.show')
                        <th style="text-align: center;">Datos</th>
                        @endcan
                        @can('usuarios.edit')
                        <th style="text-align: center;">Editar</th>
                        @endcan
                        @can('usuarios.destroy')
                        <th style="text-align: center;">Eliminar</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($unidades as $unidad)
                    <tr class="item{{$unidad->id}}">
                        <td>{{$unidad->unidad}}</td>
                        <td>{{$unidad->nombre}}</td>
                        <td>{{$unidad->telefono}}</td>
                        <td>{{$unidad->ext}}</td>
                        <td>{{$unidad->tel_particular}}</td>
                        @can('usuarios.show')
                        <td>
                            <a data-unidad="{{$unidad->unidad}}" data-nombre="{{$unidad->nombre}}"
                                data-telefono="{{$unidad->telefono}}" data-telefono2="{{$unidad->telefono2}}"
                                data-ext="{{$unidad->ext}}" data-red="{{$unidad->red}}" data-red1="{{$unidad->red1}}"
                                data-tel="{{$unidad->tel_particular}}" data-tel1="{{$unidad->tel_particular1}}"
                                data-id="{{$unidad->id}}" data-toggle="modal" data-target="#vista_unidades"><button
                                    type="button" class="btn btn-info tooltips-general" data-toggle="tooltip"
                                    data-placement="top" title="Cuenta desactivada, pulsa el botón para activarla"><i
                                        class="glyphicon glyphicon-user"></i></button></a>
                        </td>
                        @endcan
                        @can('usuarios.edit')
                        <td>
                            <a data-unidad="{{$unidad->unidad}}" data-nombre="{{$unidad->nombre}}"
                                data-telefono="{{$unidad->telefono}}" data-telefono2="{{$unidad->telefono2}}"
                                data-ext="{{$unidad->ext}}" data-red="{{$unidad->red}}" data-red1="{{$unidad->red1}}"
                                data-tel="{{$unidad->tel_particular}}" data-tel1="{{$unidad->tel_particular1}}"
                                data-id="{{$unidad->id}}" data-toggle="modal" data-target="#edit_unidades"><button
                                    type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top"><i
                                        class="glyphicon glyphicon-edit"></i></button></a>
                        </td>
                        @endcan
                        @can('usuarios.destroy')
                        <td>
                            <form action="" id="deleteForm1" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="id" id="id" value="{{$unidad->id}}">
                                <a class="button delete-confirm1 btn btn-danger" id="{{$unidad->id}}">
                                    <i class="glyphicon glyphicon-trash"></i></a>
                            </form>
                        </td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('unidades.edit')
    @include('unidades.show')

</div>
@endsection