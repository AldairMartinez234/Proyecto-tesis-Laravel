
<div class="container">
      @if ($errors->any())
                <div class="alert alert-danger" style="width: 400px; text-align: center;">
                <h6>Por favor corrige los siguientes errores:</h6>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
                </div>
                @endif      
 <div class="modal fade" id="Control" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" data-backdrop="static">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>Cerrar</span>
                </button>
        <div class="container-fluid"  style="margin: 0px 0;">
            <div class="page-header">
              <h3 class="text-center all-tittles">SISTEMA DE CONTROL DE OXIGENO MEDICINAL <small>Administración de pacientes</small></h3>
            </div>
        </div>
              <div class="text-center all-tittles">LISTA DE CONTROL DE ENTREGA</div>
            </div>
            <div class="modal-body">
              {{ csrf_field() }}
 <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
 <div class="box">
  <div class="box-body">
<table id="example2" class="table table-bordered table-striped table-hover" style="text-align: center;">
  <thead>
                <tr class="table-primary">
                    <th style="text-align: center;">Id</th>
                    <th style="text-align: center;">No.Interno</th>
                    <th style="text-align: center;">Nombre del paciente</th>
                    <th style="text-align: center;">Fecha</th>
                    <th style="text-align: center;">Control de entrega</th>
                    <th style="text-align: center;">Eliminar</th>
              
                    </tr> 
                     </thead>
               <tbody>
                @foreach($vista_resumens as $key => $control)
                <tr class="item{{$control->id}}">
                    <td>{{$control->paciente_id}}</td>
                    <td>{{$control->num_interno}}</td>
                    <td>{{$control->nombre}}</td>
                    <td>{{$control->fecha}}</td>
                    <td> <a href="/control_entrega/{{$control->id}}" class="btn btn-primary" target="_blank"> <i class="glyphicon glyphicon-print"> </i></a>
                           <a href="/control_oxigeno/{{$control->id}}" class="btn btn-primary" target="_blank"><i class="glyphicon glyphicon-eye-open"> </i></a>
                    </td>

                   <td>
                     <form action="" id="deleteForm5" method="post">
                         {{ csrf_field() }}
                         {{ method_field('DELETE') }}
                         <input type="hidden" name="id" id="id" value="{{$control->id}}">
                          <a type="button"  id="{{$control->id}}" data-toggle="modal" class='button delete-confirm5 btn btn-danger'>
                            <i class="glyphicon glyphicon-trash"></i></a>
                       </form>
                    </td>
                </tr> 
                     @endforeach
                   </tbody>
      </table>
     </div>
   </div>
                </div>
            </div>
        </div>
    </div>
</div>
