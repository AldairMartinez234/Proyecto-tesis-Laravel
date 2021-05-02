<div class="container">
    <div class="modal fade" id="vista" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" data-backdrop="static">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>Cerrar</span>
                    </button>
                    <div class="container-fluid" style="margin: 0px 0;">
                        <div class="page-header">
                            <h3 class="text-center all-tittle">SISTEMA DE CONTROL DE OXIGENO MEDICINAL <br>
                                <small>Administración de usuarios</small></h3>
                        </div>
                    </div>
                    <div class="text-center all-tittle" id="myModalLabel">DATOS COMPLETOS DEL USUARIO</div>
                </div>
                <div class="modal-body">

                    <div class="form-group col-md-6">
                        <label>Nombre</label>
                        <input id="name" type="text" class="form-control" name="name" value="" data-toggle="tooltip"
                            data-placement="top" disabled>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">{{ __('Correo Electronico') }}</label>
                        <input id="email" type="email" class="form-control" value='' data-toggle="tooltip"
                            data-placement="top" disabled>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Puesto</label>
                        <input id="rol" type="text" class="form-control" value="" data-toggle="tooltip"
                            data-placement="top" disabled>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">{{ __('Sexo') }}</label>
                        <input id="sexo" type="text" class="form-control" value='' data-toggle="tooltip"
                            data-placement="top" disabled>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">{{ __('Tipo Usuario') }}</label>
                        <input id="tipo_usuario" type="text" class="form-control" value='' data-toggle="tooltip"
                            data-placement="top" disabled>
                    </div>

                </div>

                <div class="modal-footer">
                    <p class="text-center">
                        <a><button type="button" class="btn btn-info" class="close" data-dismiss="modal"><span
                                    class="glyphicon glyphicon-circle-arrow-left"></span> Regresar </button></a>
                    </p>
                </div>

            </div>

        </div>
    </div>
</div>
</form>
</div>