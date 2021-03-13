
<div class="container">            
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog"  role="document" data-backdrop="static">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>Cerrar</span>
                </button>
                 <div class="container-fluid"  style="margin: 0px 0;">
            <div class="page-header">
              <h3 class="text-center all-tittle">SISTEMA DE CONTROL DE OXIGENO MEDICINAL <br> <small>Administración de usuarios</small></h3>
            </div>
        </div>
                <div class="text-center all-tittle" id="myModalLabel">REGISTRO PARA MODIFICAR USUARIO</div>
            </div>
            <div class="modal-body">
              @csrf
                <input type="hidden" name="id" id="id" value="">
                <input type="hidden" name="di" id="di" value="">
                    
                        <div class="form-group col-md-6">
                                <label>Tipo usuario</label>
                                <select id="tipo" class="form-control"></select>
                        </div>
                
                       <div class="form-group col-md-6">
                            <label>Nombre</label>
                                <input id="nombre" type="text" class="form-control" value="" required autocomplete="name" data-toggle="tooltip" data-placement="top">
                        </div>
                      
                        <div class="form-group col-md-6">
                            <label for="email">{{ __('Correo Electronico') }}</label>
                                <input id="correo" type="email" class="form-control" value='' required autocomplete="email" data-toggle="tooltip" data-placement="top">
                        </div>

                      <div class="form-group col-md-6">
                                 <label>Sexo</label>
                                <select id="se" class="form-control" value=''>
                                </select>
                            </div>

                        <div class="form-group col-md-6">
                                <label>Seleccione el rol del usuario</label>
                                <select class="form-control" data-toggle="tooltip" data-placement="top" value=" " title="Elige la sección a la que pertenece el alumno"  id='role'>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Doctora">Doctora</option>
                                    <option value="Enfermera">Enfermera</option>
                                </select>
                            </div>
                       
                        <div class="form-group col-md-6">
                                <label for="password">{{ __('Contraseña') }}</label>
                                <input id="passs" type="password" class="form-control" name="passs" required autocomplete="new-password">
                        </div>

                    <h3>Lista de roles</h3>

                    <?php
                       use Caffeinated\Shinobi\Models\Role;

                       $roles = Role::get();
                    ?>
                    <input type="hidden" name="id_roles[]" id="id_roles" value="">
                    
                    <div class="form-group">
                        <ul class="list-unstyled">
                            @foreach($roles as $role)
                            <li>
                                <label>
                                    {{Form::checkbox('roless', $role->id, null , ['id' => 'roless']) }}
                                    {{ $role->name }}
                                    <em>({{$role->description ?: 'Sin descripcion'}})</em>
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
             </div>
              <div class="modal-footer">
                <p class="text-center">
                         <button type="button" class="btn edit btn-primary" onClick="validar()" >
                             <span id="footer_action_button" class='glyphicon glyphicon-check'> </span> Guardar Cambios
                         </button>

                         <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                </p>
            </div>
        </div>
    </div>
</div>
</div>