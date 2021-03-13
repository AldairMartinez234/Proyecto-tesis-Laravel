
<div class="container">    
 <div class="modal fade" id="Control" tabindex="-1" role="dialog">
    <div class="modal-dialog" data-backdrop="static">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>Cerrar</span>
                </button>
        <div id="div1" class="container-fluid"  style="margin: 0px 0;">
            <div class="page-header">
              <h3 class="text-center all-tittle">SISTEMA DE CONTROL DE OXIGENO MEDICINAL<br><small>Administración de pacientes</small></h3>
            </div>
        </div>
              <div class="text-center all-tittle">ACTIVACION DE MODO CONTINGENCIA</div>
            </div>
            {{ csrf_field() }}
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="modal-body">
              <form action="{{route('addcontingencia')}}" method="POST" >
               @method('PUT')
                @csrf
              <label for="start">Fecha de inicio:</label>
               <input type="date" id="inicio" name="inicio" value="" min="2020-01-01" max="">
               <label for="start">Fecha de fin:</label>
               <input type="date" id="fin" name="fin" value="" min="2020-01-01" max="">
            </div>
            <div class="modal-footer">
                <p class="text-center">
                                <button type="submit" class="btn btn-primary" ><i class="zmdi zmdi-floppy" ></i>
                                    {{ __('Guardar') }}
                                </button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">
              <span class="glyphicon glyphicon-remove"></span>Cerrar
            </button>
                        </p>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
