@extends('layouts.app')

@section('content')
<div class="container">
<h2 class="text-center all-tittles">LISTA DE PACIENTES</h2> 
<hr size=10 noshade="noshade">
@can('pacientes.create')
<a href="{{route('pacientes.create')}}"><button type="button" class="btn btn-success float-right" data-toggle="tooltip" data-placement="top"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Agregar paciente</button></a>
@endcan
@if(session('important'))
<div class="alert alert-warning alert-dismissable">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  {{session('important')}}
  @endif
  </div>
  <br>
   {{ csrf_field() }}
 <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
 <div class="box">
  <div class="box-body">
<table id="example3" class="table table-bordered table-striped table-hover" style="text-align: center;">
  <thead>
                <tr class="table-primary">
                    <th style="text-align: center;">RFC</th>
                    <th style="text-align: center;">No.ISSSTE</th>
                    <th style="text-align: center;">Nombre del paciente</th>
                    <th style="text-align: center;">Edad</th>
                    <th style="text-align: center;">Estado</th>
                     @can('pacientes.show')
                    <th style="text-align: center;">Datos</th>
                    @endcan   
                    <th style="text-align: center;">Opciones</th>
                    @can('pacientes.documentacion')
                    <th style="text-align: center;">Documentacion</th>
                     @endcan
                    @can('pacientes.destroy')
                    <th style="text-align: center;">Eliminar</th>
                    @endcan
                    @can('resumens.show')
                    <th style="text-align: center;">Tramite</th>
                    @endcan
                     @can('pacientes.alta')
                    <th style="text-align: center;">Alta</th>
                     @endcan
                     @can('pacientes.baja')
                    <th style="text-align: center;">Baja</th>
                     @endcan
                    </tr> 
              </thead>
               <tbody>
                @foreach($pacientes as $paciente)
             <tr class="item{{$paciente->id}}"> 
                    <td>{{$paciente->RFC}}</td>
                    <td>{{$paciente->noissste}}</td>
                    <td>{{$paciente->nombre}}</td>
                    <td>{{$paciente->edad}}</td>
                    <br>
                    @if($paciente->estado == "Activo")
                    <td><p class="badge bg-green">{{$paciente->estado}}</p></td>
                    @else
                    @if($paciente->estado == "Inactivo")
                    <td><p class="badge bg-red">{{$paciente->estado}}</p></td>
                    @else
                    <td><p class="badge bg-yellow">{{$paciente->estado}}</p></td>
                    @endif
                    @endif
                    @can('pacientes.show')
                    <td><a href="{{route('pacientes.show',$paciente->id)}}"><button type="button" class="btn btn-info tooltips-general" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-user"></i></button></a>
                    </td>
                    @endcan
                    <td>
                       <form>
                            <select class="selectpicker" data-width="fit" name="ad"  onchange="salta(this.form)">
                            <option  disabled="" selected="">Seleccione</option>
                            @can('pacientes.edit')
                            <option data-icon="glyphicon glyphicon-edit" value="{{route('pacientes.edit',$paciente->id)}}">Editar</option>
                            @endcan
                            @can('resumens.show')
                            <option data-icon="glyphicon glyphicon-list-alt"value="{{route('resumens.show',$paciente->id)}}">Resumen Medico</option>
                            @endcan
                            @can('controls.show')
                            <option data-icon="glyphicon glyphicon-file" value="{{route('controls.show',$paciente->id)}}">Control de entrega</option>
                            @endcan
                            </select>
                      </form>
                    </td>
                    @can('pacientes.documentacion')
                     <td> <a href="{{route('resumens.lista_resumen',$paciente->id)}}"><button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top"> <i class="glyphicon glyphicon-file"></i></button></a>
                     </td>
                     @endcan
                    @can('pacientes.destroy')
                     <td>
                     <form action="" id="deleteForm2" method="post">
                         {{ csrf_field() }}
                         {{ method_field('DELETE') }}
                         <input type="hidden" name="id" id="id" value="{{$paciente->id}}">
                          <a type="button"  id="{{$paciente->id}}" data-toggle="modal" class='button delete-confirm2 btn btn-danger'>
                            <i class="glyphicon glyphicon-trash"></i></a>
                       </form>
                    </td>                    
                    @endcan
                    @can('resumens.show')
                    <td> <a href="{{route('resumens.show',$paciente->id)}}"><button type="button"  class="btn btn-success" data-toggle="tooltip" data-placement="top">Continuar <i class="glyphicon glyphicon-arrow-right"></i></button></a>
                     </td>
                    @endcan
                    @can('pacientes.alta')
                     <td> 
                        <form action="" id="deleteForm6" method="post">
                         {{ csrf_field() }}
                         {{ method_field('DELETE') }}
                         <input type="hidden" name="id" id="id" value="{{$paciente->id}}">
                        <a type="button" id="{{$paciente->id}}" class="btn alta btn-success" data-toggle="modal" data-placement="top"> <i class="glyphicon glyphicon-check"></i></a>
                         </form>
                     </td>

                    @endcan
                    @can('pacientes.baja')
                     <td> 
                        <form action="" id="deleteForm7" method="post">
                         {{ csrf_field() }}
                         {{ method_field('DELETE') }}
                         <input type="hidden" name="id" id="id" value="{{$paciente->id}}">
                        <a type="button" id="{{$paciente->id}}" class="btn baja btn-warning" data-toggle="modal" data-placement="top"> <i class="glyphicon glyphicon-remove-sign"></i></a>
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
@endsection
