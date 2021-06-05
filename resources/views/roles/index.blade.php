@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center all-tittles">LISTA DE ROLES</h2>
    <hr size=10 noshade="noshade">
    @can('roles.create')
    <a data-toggle="modal" data-target="#create"><button type="button" class="btn btn-success float-right"
            data-toggle="tooltip" data-placement="top"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>Agregar Nuevo
            Rol</button></a>
    @endcan
    <br>
    @if(session('important'))
    <div class="alert alert-success alert-dismissable">
        <a href="{{asset('roles')}}"><button type="button" class="close" data-dismiss="alert">&times;</button></a>
    </div>
    {{session('important')}}
    @endif
    <br>
    {{ csrf_field() }}
    <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box">
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped table-hover" style="text-align: center;">
                <thead>
                    <tr class="table-primary">
                        <th style="text-align: center;">Id</th>
                        <th style="text-align: center;">Nombre</th>
                        <th style="text-align: center;">Descripcion</th>
                        @can('roles.show')
                        <th style="text-align: center;">Datos</th>
                        @endcan
                        @can('roles.edit')
                        <th style="text-align: center;">Editar</th>
                        @endcan
                        @can('roles.destroy')
                        <th style="text-align: center;">Eliminar</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $key => $roles)
                    <tr class="item{{$roles->id}}">
                        <td>{{$roles->id}}</td>
                        <td>{{$roles->name}}</td>
                        <td>{{$roles->description}}</td>

                        @can('roles.show')
                        <td>
                            <a data-name="{{$roles->name}}" data-description="{{$roles->description}}"
                                data-slug="{{$roles->slug}}" data-id="{{$roles->id}}" data-toggle="modal"
                                data-target="#vista_roles"><button type="button" class="btn btn-info tooltips-general"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Cuenta desactivada, pulsa el botón para activarla"><i
                                        class="glyphicon glyphicon-user"></i></button></a>
                        </td>
                        @endcan
                        @can('roles.edit')
                        <td>
                            <a data-name="{{$roles->name}}" data-description="{{$roles->description}}"
                                data-slug="{{$roles->slug}}" data-id="{{$roles->id}}" data-toggle="modal"
                                data-target="#vista_roles_edit"><button type="button" class="btn btn-success"
                                    data-toggle="tooltip" data-placement="top"><i
                                        class="glyphicon glyphicon-edit"></i></button></a>
                        </td>
                        @endcan
                        @can('roles.destroy')
                        <td>
                            <form action="" id="deleteForm3" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="id" id="id" value="{{$roles->id}}">
                                <a type="button" id="{{$roles->id}}" data-toggle="modal"
                                    class='button delete-confirm3 btn btn-danger'>
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

</div>

@include('roles.create')
@include('roles.edit')
@include('roles.show')


@endsection