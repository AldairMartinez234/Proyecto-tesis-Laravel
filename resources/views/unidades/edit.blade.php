
<div class="container">
      <form action="{{route('unidades.update')}}" method="POST" >
               @method('PUT')
                @csrf
 <div class="modal fade" id="edit_unidades" tabindex="-1" role="dialog">
    <div class="modal-dialog" data-backdrop="static">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>Cerrar</span>
                </button>
        <div class="container-fluid"  style="margin: 0px 0;">
            <div class="page-header">
              <h3 class="text-center all-tittle">SISTEMA DE CONTROL DE OXIGENO MEDICINAL <br><small>Administración de unidade medicas</small></h3>
            </div>
        </div>
              <div class="text-center all-tittle">REGISTRO PARA CREAR UNA NUEVA UNIDA MEDICA</div>
            </div>
            <div class="modal-body">
              
                    <input type="hidden" name="id" id="id" value="">
                       <div class="form-group col-md-6">
                            <label>Unidad</label>
                                <input type="text" class="form-control" id="unidad" name="unidad" data-toggle="tooltip" data-placement="top">
                        </div>
                      

                        <div class="form-group col-md-6">
                            <label>Nombre del responsable</label>
                                <input id="nombre" type="text" class="form-control" name="nombre" value="" >  
                        </div>

                         <div class="form-group col-md-6">
                            <label>Telefono</label>
                                <input type="number" class="form-control" id="telefono" name="telefono" data-toggle="tooltip" data-placement="top">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Telefono (opcional)</label>
                                <input type="number" class="form-control" id="telefono2" name="telefono2" data-toggle="tooltip" data-placement="top">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Extension</label>
                                <input id="ext" type="number" class="form-control" name="ext" value="" >  
                        </div>

                        <div class="form-group col-md-6">
                            <label>Red</label>
                                <input id="red" type="number" class="form-control" name="red" value="" >  
                        </div>

                        <div class="form-group col-md-6">
                            <label>Red (opcional)</label>
                                <input id="red1" type="number" class="form-control" name="red1" value="" >  
                        </div>

                         <div class="form-group col-md-6">
                            <label>Telefono Particular</label>
                                <input type="number" class="form-control" id="tel_parti" name="tel_parti" data-toggle="tooltip" data-placement="top">
                        </div>

                         <div class="form-group col-md-6">
                            <label>Telefono Particular (opcional)</label>
                                <input type="number" class="form-control" id="tel_parti1" name="tel_parti1" data-toggle="tooltip" data-placement="top">
                        </div>  
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

