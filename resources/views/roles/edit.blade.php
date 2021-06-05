<div class="container">
    <form method="POST" action="{{route('roles.update', 'roles.id')}}">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <div class="modal fade" id="vista_roles_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" data-backdrop="static">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span>Cerrar</span>
                        </button>
                        <div class="container-fluid" style="margin: 0px 0;">
                            <div class="page-header">
                                <h4 class="text-center all-tittles">SISTEMA DE CONTROL DE OXIGENO MEDICINAL <br>
                                    <small>Administración de roles</small></h4>
                            </div>
                        </div>
                        <div class="text-center all-tittles" id="myModalLabel">REGISTRO PARA MODIFICAR ROLES</div>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="id" id="id" value="">

                        @include('roles.partials.form')
                    </div>

                    <div class="modal-footer">
                        <p class="text-center">
                            <input type="submit" class="btn btn-primary" value="Guardar">
                        </p>
                    </div>

                </div>

            </div>
        </div>
</div>
</form>
</div>