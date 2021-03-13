@extends('layouts.app')

@section('content')

<div class="page-header">
              <h1 class="all-tittles">SISTEMA DE CONTROL DE OXIGENO MEDICINAL <small>BITACORAS</small></h1>
            </div>
 <div class="content">
<section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">BITACORA DE INICIO DE SESION</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table id="example1" class="table table-bordered table-striped table-hover" style="text-align: center;">
                <thead>
                <tr>
                  <th style="width: 10px; text-align: center;">ID</th>
                  <th style="text-align: center;">USUARIO</th>
                  <th style="text-align: center;">TIPO USUARIO</th>
                  <th style="text-align: center;">ENTRADA</th>
                  <th style="text-align: center;">SALIDA</th>
                 </tr> 
              </thead>
               <tbody>
                @foreach($Logon_logs as $Logon_log)
                <tr style="text-align: center;">
                  <td>{{$Logon_log->id}}</td>
                  <td>{{$Logon_log->usuario}}</td>
                  <td>{{$Logon_log->tipo_usuario}}</td>
                  <td>{{$Logon_log->login_ts}}</td>
                  <td>{{$Logon_log->logout_ts}}</td>
                </tr>
                 @endforeach 
             </tbody>
               </table>
            </div>
          </div>
        </div>

        <?php 

       $Pacientes= DB::SELECT('SELECT * FROM bitacora_paciente');
       ?>
      
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">BITACORA DE PACIENTES</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
          <table id="example6" class="table table-bordered table-striped table-hover" style="text-align: center;">
  <thead>
                <tr class="table-primary">
                  <th style="width: 10px; text-align: center;">ID</th>
                  <th style="text-align: center;">USUARIO</th>
                  <th style="text-align: center;">FECHA DE MODIFICACION</th>
                  <th style="text-align: center;">ACCION</th>
                  <th style="text-align: center;">TABLA</th>
                  <th style="text-align: center;">TIPO DE USUARIO</th>
                 </tr> 
              </thead>
               <tbody>
                @foreach($Pacientes as $key => $Paciente)
                <tr style="text-align: center;">
                  <td>{{$Paciente->id_bitacora}}</td>
                  <td>{{$Paciente->usuario}}</td>
                  <td>{{$Paciente->fecha}}</td>
                  <td>{{$Paciente->accion}}</td>
                  <td>{{$Paciente->tabla}}</td>
                  <td>{{$Paciente->tipo_usuario}}</td>
                </tr>
                 @endforeach 
             </tbody>
              </table>
            </div>
          </div>
        </div>

        

        <?php 
       $Direccion= DB::SELECT('SELECT * FROM bitacora_direccion');
?>
      
      
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">BITACORA DE DIRECCIONES</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
             <table id="example7" class="table table-bordered table-striped table-hover" style="text-align: center;">
                <thead>
                <tr class="table-primary">
                  <th style="width: 10px; text-align: center;">ID</th>
                  <th style="text-align: center;">USUARIO</th>
                  <th style="text-align: center;">FECHA DE MODIFICACION</th>
                  <th style="text-align: center;">ACCION</th>
                  <th style="text-align: center;">TABLA</th>
                  <th style="text-align: center;">TIPO DE USUARIO</th>
                </tr>
                   </thead>
               <tbody>
                @foreach($Direccion as $key => $Direccions)
                <tr style="text-align: center;">
                  <td>{{$Direccions->id_bitacora}}</td>
                  <td>{{$Direccions->usuario}}</td>
                  <td>{{$Direccions->fecha}}</td>
                  <td>{{$Direccions->accion}}</td>
                  <td>{{$Direccions->tabla}}</td>
                  <td>{{$Direccions->tipo_usuario}}</td>
                </tr>
                 @endforeach 
                         </tbody>
      </table>
            </div>
          </div>
        </div>

        <?php 
        $Pacientes = DB::SELECT('SELECT * FROM users');
?>  
<div class="col-md-6">
  <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">LISTA DE USUARIOS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
               <table id="example5" class="table table-bordered table-striped table-hover" style="text-align: center;">
                <thead>
                <tr class="table-primary">
                  <th style="width: 10px; text-align: center;">ID</th>
                  <th style="text-align: center;">NOMBRE</th>
                  <th style="text-align: center;">CORREO</th>
                  <th style="text-align: center;">ROL</th>
                  <th style="text-align: center;">ESTADO</th>
                </tr>
                    </thead>
               <tbody>
                 @foreach($Pacientes as $key => $Paciente)
                <tr style="text-align: center;">
                  <td>{{$Paciente->id}}</td>
                  <td>{{$Paciente->name}}</td>
                  <td>{{$Paciente->email}}</td>
                  <td>{{$Paciente->rol}}</td>
                  @if($Paciente->estado == "Activo")
                  <td class="badge bg-green">{{$Paciente->estado}}</td>
                  @else
                    <td class="badge bg-red">{{$Paciente->estado}}</td>
                    @endif
                </tr>
                 @endforeach 
                         </tbody>
      </table>
            </div>
          </div>
           </div> 
 
              <?php 
       $Pacientes = DB::SELECT('SELECT * FROM bitacora_familiar');
?>
      
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">BITACORA DE PACIENTES</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table id="example8" class="table table-bordered table-striped table-hover" style="text-align: center;">
                <thead>
                <tr class="table-primary">
                  <th style="width: 10px; text-align: center;">ID</th>
                  <th style="text-align: center;">USUARIO</th>
                  <th style="text-align: center;">FECHA DE MODIFICACION</th>
                  <th style="text-align: center;">ACCION</th>
                  <th style="text-align: center;">TABLA</th>
                  <th style="text-align: center;">TIPO DE USUARIO</th>
                </tr>
                    </thead>
               <tbody>
                @foreach($Pacientes as $key => $Paciente)
                <tr style="text-align: center;">
                  <td>{{$Paciente->id_bitacora}}</td>
                  <td>{{$Paciente->usuario}}</td>
                  <td>{{$Paciente->fecha}}</td>
                  <td>{{$Paciente->accion}}</td>
                  <td>{{$Paciente->tabla}}</td>
                  <td>{{$Paciente->tipo_usuario}}</td>
                </tr>
                 @endforeach
               </tbody>
              </table>
            </div>
          </div>
        </div>
</div>
</section>
</div>

@endsection