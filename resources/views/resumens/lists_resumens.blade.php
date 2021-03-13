@extends('layouts.app')

@section('content')
<div class="container">
<h2 class="text-center all-tittles">LISTA DE DOCUMENTACION</h2> 
<hr size=10   noshade="noshade">
<a  data-toggle="modal" data-target="#Control"><button type="button" class="btn btn-success float-right" data-toggle="tooltip" data-placement="top"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>Control de Entrega</button></a>
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
<table id="example4" class="table table-bordered table-striped table-hover" style="text-align: center;">
  <thead>
                <tr class="table-primary">
                    <th style="text-align: center;">Identificador</th>
                    <th style="text-align: center;">No.Folio</th>
                    <th style="text-align: center;">Nombre del paciente</th>
                    <th style="text-align: center;">Fecha</th>
                    <th style="text-align: center;">Resumen Medico</th>
                    <th style="text-align: center;">Eliminar</th>
               </tr> 
              </thead>
               <tbody>
                @foreach($vista_resumen as $key => $vista)
                <tr class="item{{$vista->id}}">
                    <td>{{$vista->RFC}}</td>
                    <td>{{$vista->folio}}</td>
                    <td>{{$vista->nombre}}</td>
                    <td>{{$vista->fecha}}</td>
                    <td> <a href="{{route('resumens.imprimirs',$vista->id)}}" class="btn btn-primary" target="_blank"> <i class="glyphicon glyphicon-print"> </i></a>
                           <a href="{{route('resumens.ver',$vista->id)}}" class="btn btn-primary" target="_blank">Ver &nbsp;<i class="glyphicon glyphicon-eye-open"> </i></a>
                    </td>

                     <td>
                     <form action="" id="deleteForm4" method="post">
                         {{ csrf_field() }}
                         {{ method_field('DELETE') }}
                         <input type="hidden" name="id" id="id" value="{{$vista->id}}">
                          <a type="button"  id="{{$vista->id}}" data-toggle="modal" class='button delete-confirm4 btn btn-danger'>
                            <i class="glyphicon glyphicon-trash"></i></a>
                       </form>
                    </td>
                </tr> 
                   
                   @endforeach
               </tbody>
      </table>
     </div>
   </div>
                @include('resumens.list_control')
</div>

@endsection
