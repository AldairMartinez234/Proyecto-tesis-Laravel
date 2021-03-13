
<div class="container">                  
<div class="modal fade" id="vista_roles" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog"  role="document" data-backdrop="static">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>Cerrar</span>
                </button>
                 <div class="container-fluid"  style="margin: 0px 0;">
            <div class="page-header">
              <h4 class="text-center all-tittles">SISTEMA DE CONTROL DE OXIGENO MEDICINAL <br> <small>Administración de roles</small></h4>
            </div>
        </div>
                <div class="text-center all-tittles" id="myModalLabel">DATOS COMPLETOS DE ROL</div>
            </div>
            <div class="modal-body">
               
                       <div class="form-group col-md-6">
                            <label>ID</label>
                                <input id="id" type="text" class="form-control" name="id" value=""  data-toggle="tooltip" data-placement="top" disabled>
                        </div>
                      

                        <div class="form-group col-md-6">
                            <label>{{ __('Nombre') }}</label>
                                <input id="name" type="text" class="form-control"  value=''  data-toggle="tooltip" data-placement="top" disabled>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Descripcion</label>
                                <input id="description" type="text" class="form-control" name="description" value=""  data-toggle="tooltip" data-placement="top" disabled>
                        </div>

                         <div class="form-group col-md-6">
                            <label>Slug</label>
                                <input id="slug" type="text" class="form-control" name="slug" value=""  data-toggle="tooltip" data-placement="top" disabled>
                        </div>

                        </div>

              <div class="modal-footer">
                <p class="text-center">
                                <a ><button type="button" class="btn btn-info" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-circle-arrow-left"></span> Regresar </button></a>
                        </p>
            </div>
    
            </div>
            
        </div>
    </div>
</div>
</form>
</div>