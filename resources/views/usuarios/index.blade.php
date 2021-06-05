@extends('layouts.app')

@section('content')
<div id="tabla">
    <div class="container">
        <h2 class="text-center all-tittles">LISTA DE USUARIOS REGISTRADOS</h2>
        <hr size=10 noshade="noshade">
    </div>
    @can('usuarios.create')
    <a href="#" data-toggle="modal" data-target="#create"><button type="button" class="btn btn-success float-right"
            data-toggle="tooltip" data-placement="top"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>Agregar Nuevo
            Usuario</button></a>
    @endcan
    @if(session('important'))
    <div class="alert alert-success alert-dismissable">
        <a href="{{asset('usuarios')}}"><button type="button" class="close" data-dismiss="alert">&times;</button></a>
        {{session('important')}}
        @endif
    </div>
    @include('usuarios.create')
    <br>
    {{ csrf_field() }}
    <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box">
        <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover" style="text-align: center;">
                <thead>
                    <tr class="table-primary">
                        <th style="text-align: center;">Nombre</th>
                        <th style="text-align: center;">Puesto de trabajo</th>
                        <th style="text-align: center;">Sexo</th>
                        <th style="text-align: center;">Correo electronico</th>
                        <th style="text-align: center;">Estado</th>
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
                    {{ csrf_field() }}
                    @foreach($users as $user)
                    <tr class="item{{$user->id}}">
                        <td>{{$user->name}}</td>
                        <td>{{$user->rol}}</td>
                        <td>{{$user->sexo}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->estado}}</td>
                        @can('usuarios.show')
                        <td>
                            <a data-name="{{$user->name}}" data-email="{{$user->email}}"
                                data-tipo_usuario="{{$user->tipo_usuario}}" data-sexo="{{$user->sexo}}"
                                data-rol="{{$user->rol}}" data-id="{{$user->id}}" data-toggle="modal"
                                data-target="#vista"><button type="button" class="btn btn-info tooltips-general"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Cuenta desactivada, pulsa el botón para activarla"><i
                                        class="glyphicon glyphicon-user"></i></button></a>
                        </td>
                        @endcan
                        @can('usuarios.edit')
                        <td>
                            <a data-name="{{$user->name}}" data-email="{{$user->email}}"
                                data-tipo_usuario="{{$user->tipo_usuario}}" data-sexo="{{$user->sexo}}"
                                data-rol="{{$user->rol}}" data-id="{{$user->id}}" data-toggle="modal"
                                data-target="#edit"><button type="button" class="btn btn-success" data-toggle="tooltip"
                                    data-placement="top"><i class="glyphicon glyphicon-edit"></i></button></a>
                        </td>
                        @endcan
                        @can('usuarios.destroy')
                        <td>
                            <form action="" id="deleteForm" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="id" id="id" value="{{$user->id}}">
                                <a type="button" id="{{$user->id}}" data-toggle="modal"
                                    class='button delete-confirm btn btn-danger'>
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
    @include('usuarios.edit')
    @include('usuarios.show')

</div>
@endsection