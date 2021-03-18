<!DOCTYPE html>
<html>
<SCRIPT LANGUAGE="JavaScript">
  
function salta(Sel){
if (Sel.ad.selectedIndex != 0){
document.location=Sel.ad.options[Sel.ad.selectedIndex].value
}}
</SCRIPT>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISTEMA DE CONTROL DE OXIGENO MEDICINAL</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('alertifyJS/css/alertify.min.css')}}">  
  <!-- Alertify theme default -->  
  <link rel="stylesheet" href="{{asset('alertifyJS/css/themes/default.min.css')}}"/>  
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.css')}}">
  <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="{{asset('css/sweet-alert.css')}}">
  <link rel="stylesheet" href="{{asset('css/material-design-iconic-font.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

  <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="{{asset('js/modernizr.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
  <script src="https://code.iconify.design/1/1.0.4/iconify.min.js"></script>
  <script src="{{asset('js/sweet-alert.min.js')}}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini" style="background-color: #222D32">
<div class="wrapper">
  <header class="main-header">
    <a href="/" class="logo">
      <span class="logo-mini"><font size="2"><b>SC</b>OMD</font></span>
      <span class="logo-lg"><font size="1">SISTEMA DE CONTROL DE OXIGENO MEDICINAL</font></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header"></li>
              <li>
                <!-- inner menu: contains the actual data 
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>-->
              </li>
            </ul>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <?php 
       use App\User; 
       use App\Paciente;
       use App\Unidad;  

       $users_count = User::all()->count();
       $pacientes_count = Paciente::all()->count(); 
       $unidades_count = Unidad::all()->count(); 

         $a = DB::select('SELECT sexo FROM users WHERE sexo = ?', ['Masculino']);
        
        $g='Femenino';
         
           if (Auth::user()->sexo==$g) { ?>
             
                   <img src="{{asset('img/do.png')}}" class="user-image" alt="User Image">
                
           <?php }elseif (Auth::user()->sexo=$a) { ?>

                   <img src="{{asset('img/da.png')}}" class="user-image" alt="User Image">
                
         <?php   }
      ?>
      <?php 

      ?>
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                 <?php 
           if (Auth::user()->sexo==$g) { ?>
             
                   <img src="{{asset('img/do.png')}}" class="img-circle" alt="User Image">
                
           <?php }elseif (Auth::user()->sexo=$a) { ?>

                   <img src="{{asset('img/da.png')}}" class="img-circle" alt="User Image">
                
         <?php   }
      ?>
      <?php 

      ?>
                <p>
                  {{ Auth::user()->name }} - {{ Auth::user()->rol }}
                  <small>{{ Auth::user()->email }}</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{ action('AuthController@log') }}" class="btn btn-default btn-flat">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <form class="main-sidebar">

    <section class="sidebar">
     
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header" style="background-color: #33414E; color: #fff;"><center><B><font size="2">MENU</B></font></center></li>
        
             @can('usuarios.index')
             <li>
          <a href="{{route('usuarios.index')}}" ><i class="glyphicon glyphicon-user"> </i>
                  <span>&nbsp;&nbsp; Usuarios
                  <span class="label label-danger pull-right">{{ $users_count ?? '0' }}</span></span>
          </a>
        </li>
        @endcan

         @can('pacientes.index')
        <li><a href="{{route('pacientes.index')}}"> <span class="iconify" data-icon="zmdi:male-female" data-inline="false"> </span>
          <span>&nbsp;&nbsp;&nbsp; Pacientes
        <span class="label label-danger pull-right">{{ $pacientes_count ?? '0' }}</span></span>
      </a>
    </li>
     @endcan

      @can('roles.index')
        <li><a href="{{route('roles.index')}}"><i class="glyphicon glyphicon-tasks"> </i>
          <span>&nbsp;&nbsp; Roles</span>
      </a>
    </li>
     @endcan
 
        @can('bitacora.index')
        <li><a href="{{asset('bitacora')}}"><i class="glyphicon glyphicon-hdd"> </i>
          <span>&nbsp;&nbsp; Bitacora</span>
      </a>
    </li>
     @endcan

        <li><a href="{{asset('unidades')}}"><i class="glyphicon glyphicon-heart"> </i>
          <span>&nbsp;&nbsp; Unidades Medicas
           <span class="label label-danger pull-right">{{ $unidades_count ?? '0' }}</span></span>
      </a>
    </li>
<!--
    <li><a href="https://control-de-oxigeno-issste.000webhostapp.com/Biometrico/setup.zip"> <i class="glyphicon glyphicon-download-alt"> </i>
          <span>&nbsp;&nbsp; Descargar Instalar del Lector</span>
      </a>
    </li>
    <li>
      <center>
      <a  data-toggle="modal" data-target="#Control"><button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top"> <i class="glyphicon glyphicon-globe"> </i> Modo Contingencia </button> </a>
      </center>
    </li>
    -->
  </ul>

        <!--
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
      </ul>
       -->
    </section>
  </form>
  <div id="crud" class="content-wrapper">
    <section  class="content container-fluid">

         @yield('content')

    </section>
  </div>
  @include('layouts.modo_contingencia')
  <footer class="main-footer">
    To the right 
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
     Default to the left 
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
    
  <!-- Plugin Sweet alert -->  
<script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>  
<script src="{{asset('alertifyJS/alertify.min.js')}}"></script>  
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- DataTables -->
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Creados -->
<script src="{{asset('js/input.js')}}"></script>
<script src="{{asset('js/tablets.js')}}"></script>
<script src="{{asset('js/modals.js')}}"></script>

<script type="text/javascript">
    $(".delete-confirm").click(function(e){
        e.preventDefault();
        Swal.fire({
      title: "¿Está seguro?",
      text: "Una vez eliminado, no podrá recuperar esta informacion!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, bórralo!'
    }).then((result) => {
        if (result.value) {
        Swal.fire(
          '!Eliminado!',
          'El usuario ha sido eliminado', 
          'success'
        )
         var id = $(this).attr('id');
         var url = '{{ route("usuarios.destroy", ":id") }}';
         url = url.replace(':id', id);
         
         $("#deleteForm").attr('action', url);
           $(this).closest('tr').remove(); 
        $.post(url,$("#deleteForm").serialize(), function(result){

           alertify.set('notifier','position', 'top-right');
           alertify.notify('Usuario Eliminado,¡EXITOSAMENTE!', 'success', 5, function(){});
        }).fail(function(){

           alertify.set('notifier','position', 'top-right');
           alertify.notify('Hubo un error al momento de guardar,¡Por favor repita la operacion!', 'error', 5, function(){});   
        });

        } else {
           alertify.set('notifier','position', 'top-right');
           alertify.notify('Operacion de eliminar,¡CANCELADA!', 'error', 5, function(){});
        }
      }); 
    });    
</script>
<script type="text/javascript">
   
    $(".delete-confirm1").click(function(e){
        e.preventDefault();
        Swal.fire({
      title: "¿Está seguro?",
      text: "Una vez eliminado, no podrá recuperar esta informacion!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, bórralo!'
    }).then((result) => {
        if (result.value) {
        Swal.fire(
          '!Eliminado!',
          'La Unidad Medica ha sido eliminado', 
          'success'
        )
         var id = $(this).attr('id');
         var url = '{{ route("unidades.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm1").attr('action', url);
          $(this).closest('tr').remove();  

        $.post(url,$("#deleteForm1").serialize(), function(result){
           alertify.set('notifier','position', 'top-right');
           alertify.notify('Unidad Medica Eliminada,¡EXITOSAMENTE!', 'success', 5, function(){});
        }).fail(function(){
           alertify.set('notifier','position', 'top-right');
           alertify.notify('Hubo un error al momento de guardar,¡Por favor repita la operacion!', 'error', 5, function(){});   
        });

        } else {
           alertify.set('notifier','position', 'top-right');
           alertify.notify('Operacion de eliminar,¡CANCELADA!', 'error', 5, function(){});
        }
      }); 
    });    
</script>
<script type="text/javascript">
   
    $(".delete-confirm2").click(function(e){
        e.preventDefault();
        Swal.fire({
      title: "¿Está seguro?",
      text: "Una vez eliminado, no podrá recuperar esta informacion!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, bórralo!'
    }).then((result) => {
        if (result.value) {
        Swal.fire(
          '!Eliminado!',
          'El Paciente ha sido eliminado', 
          'success'
        )
         var id = $(this).attr('id');
         var url = '{{ route("pacientes.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm2").attr('action', url);
          $(this).closest('tr').remove();  

        $.post(url,$("#deleteForm2").serialize(), function(result){
           alertify.set('notifier','position', 'top-right');
           alertify.notify('Paciente Eliminado,¡EXITOSAMENTE!', 'success', 5, function(){});
        }).fail(function(){
           alertify.set('notifier','position', 'top-right');
           alertify.notify('Hubo un error al momento de eliminar,¡Por favor repita la operacion!', 'error', 5, function(){});   
        });

        } else {
           alertify.set('notifier','position', 'top-right');
           alertify.notify('Operacion de eliminar,¡CANCELADA!', 'error', 5, function(){});
        }
      }); 
    });    
</script>

<script type="text/javascript">
   
    $(".delete-confirm3").click(function(e){
        e.preventDefault();
        Swal.fire({
      title: "¿Está seguro?",
      text: "Una vez eliminado, no podrá recuperar esta informacion!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, bórralo!'
    }).then((result) => {
        if (result.value) {
        Swal.fire(
          '!Eliminado!',
          'El Rol ha sido eliminado', 
          'success'
        )
         var id = $(this).attr('id');
         var url = '{{ route("roles.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm3").attr('action', url);
          $(this).closest('tr').remove();  

        $.post(url,$("#deleteForm3").serialize(), function(result){
           alertify.set('notifier','position', 'top-right');
           alertify.notify('Rol Eliminado,¡EXITOSAMENTE!', 'success', 5, function(){});
        }).fail(function(){
           alertify.set('notifier','position', 'top-right');
           alertify.notify('Hubo un error al momento de eliminar,¡Por favor repita la operacion!', 'error', 5, function(){});   
        });

        } else {
           alertify.set('notifier','position', 'top-right');
           alertify.notify('Operacion de eliminar,¡CANCELADA!', 'error', 5, function(){});
        }
      }); 
    });    
</script>

<script type="text/javascript">
   
    $(".delete-confirm4").click(function(e){
        e.preventDefault();
        Swal.fire({
      title: "¿Está seguro?",
      text: "Una vez eliminado, no podrá recuperar esta informacion!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, bórralo!'
    }).then((result) => {
        if (result.value) {
        Swal.fire(
          '!Eliminado!',
          'El Resumen medico ha sido eliminado', 
          'success'
        )
         var id = $(this).attr('id');
         var url = '{{ route("resumens.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm4").attr('action', url);
          $(this).closest('tr').remove();  

        $.post(url,$("#deleteForm4").serialize(), function(result){
           alertify.set('notifier','position', 'top-right');
           alertify.notify('El Resumen Medico a sido Eliminado,¡EXITOSAMENTE!', 'success', 5, function(){});
        }).fail(function(){
           alertify.set('notifier','position', 'top-right');
           alertify.notify('Hubo un error al momento de eliminar,¡Por favor repita la operacion!', 'error', 5, function(){});   
        });

        } else {
           alertify.set('notifier','position', 'top-right');
           alertify.notify('Operacion de eliminar,¡CANCELADA!', 'error', 5, function(){});
        }
      }); 
    });    
</script>

<script type="text/javascript">
   
    $(".delete-confirm5").click(function(e){
        e.preventDefault();
        Swal.fire({
      title: "¿Está seguro?",
      text: "Una vez eliminado, no podrá recuperar esta informacion!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, bórralo!'
    }).then((result) => {
        if (result.value) {
        Swal.fire(
          '!Eliminado!',
          'El Control de entrega ha sido eliminado', 
          'success'
        )
         var id = $(this).attr('id');
         var url = '{{ route("control.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm5").attr('action', url);
         $(this).closest('tr').remove();  

        $.post(url,$("#deleteForm5").serialize(), function(result){
           alertify.set('notifier','position', 'top-right');
           alertify.notify('El Control de entrega a sido Eliminado,¡EXITOSAMENTE!', 'success', 5, function(){});
        }).fail(function(){
           alertify.set('notifier','position', 'top-right');
           alertify.notify('Hubo un error al momento de eliminar,¡Por favor repita la operacion!', 'error', 5, function(){});   
        });

        } else {
           alertify.set('notifier','position', 'top-right');
           alertify.notify('Operacion de eliminar,¡CANCELADA!', 'error', 5, function(){});
        }
      }); 
    });    
</script>

<script>
  $(document).ready(function(){
    setInterval(
        function(){
          <?php 
        DB::update("UPDATE pacientes set contador=NOW(),estado = 'Activo' where estado = 'Activo'");
        $contin = DB::SELECT('SELECT fecha_fin FROM pacientes');
        $contador = DB::SELECT('SELECT contador FROM pacientes');

        if ($contin[0] == $contador[0]) {

            DB::update("UPDATE pacientes set contador=NOW(), modo = 'Modo Contingecia Acti'");

        }else{
           
            DB::update("UPDATE pacientes set contador=NOW(), modo = 'Modo Contingecia Activado'");
            
        }
         
         ?>
           alertify.set('notifier','position', 'top-right');
           alertify.notify('Lista de usuarios actulizada,¡EXITOSAMENTE!', 'success', 5, function(){});
        },50000
      );
  });
</script>

<script type="text/javascript">
  $(".alta").click(function (){
     var id = $(this).attr('id');
   alertify.confirm("Desea autorizar el suministro de oxigeno al paciente.",
  function(){
         
         var url = '{{ route("alta", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm6").attr('action', url);
        $.post(url,$("#deleteForm6").serialize(), function(result){
          alertify.set('notifier','position', 'top-right');
          alertify.success('Paciente Activo');
        }).fail(function(){
           alertify.set('notifier','position', 'top-right');
           alertify.notify('Hubo un error al momento de autorizar el servicio,¡Por favor repita la operacion!', 'error', 5, function(){});   
        });

        },
  function(){
    alertify.error('Cancelado');
  });
   });
</script>
<script type="text/javascript">
  
  $(".baja").click(function (){
     var id = $(this).attr('id');
      Swal.fire({
  title: 'Opciones para dar de baja un paciente',
  input: 'select',
  inputOptions: {
    'Alta medica': 'Alta medica',
    'Porque ya no lo tolera': 'Porque ya no lo tolera',
    'Defuncion': 'Defuncion'
  },
  inputPlaceholder: 'Seleccione una opcion...',
  showCancelButton: true,
  inputValidator: function (value) {
    return new Promise(function (resolve, reject) {
      if (value !== '') {
        resolve();
      } else {
        resolve('Necesitas seleccionar una opción');
      }
    });
  }
}).then(function (result) {
  if (result.value) {
    Swal.fire({
      icon: 'success',
      html: 'Usted seleccionó: ' + result.value
    });

    if (result.value == 'Alta medica') {
      var url = '{{ route("baja1", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm7").attr('action', url);
        $.post(url,$("#deleteForm7").serialize(), function(result){
          alertify.set('notifier','position', 'top-right');
          alertify.success('Paciente dado de baja');
        }).fail(function(){
           alertify.set('notifier','position', 'top-right');
           alertify.notify('Hubo un error al momento de autorizar el servicio,¡Por favor repita la operacion!', 'error', 5, function(){});   
        });
    }
    if (result.value == 'Porque ya no lo tolera') 
    {
      var url = '{{ route("baja2", ":id") }}';
         url = url.replace(':id', id);
         alert(url);
         $("#deleteForm7").attr('action', url);
        $.post(url,$("#deleteForm7").serialize(), function(result){
          alertify.set('notifier','position', 'top-right');
          alertify.success('Paciente dado de baja');
        }).fail(function(){
           alertify.set('notifier','position', 'top-right');
           alertify.notify('Hubo un error al momento de autorizar el servicio,¡Por favor repita la operacion!', 'error', 5, function(){});   
        });
    }
    if (result.value == 'Defuncion') 
    {
      var url = '{{ route("baja3", ":id") }}';
         url = url.replace(':id', id);
         alert(url);
         $("#deleteForm7").attr('action', url);
        $.post(url,$("#deleteForm7").serialize(), function(result){
          alertify.set('notifier','position', 'top-right');
          alertify.success('Paciente dado de baja');
        }).fail(function(){
           alertify.set('notifier','position', 'top-right');
           alertify.notify('Hubo un error al momento de autorizar el servicio,¡Por favor repita la operacion!', 'error', 5, function(){});   
        });
    }
  }
});
    });
</script>
</body>
</html>