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

    <div class="modal fade" id="create" tabindex="-1" role="dialog">
        <div class="modal-dialog" data-backdrop="static">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>Cerrar</span>
                    </button>
                    <div class="container-fluid" style="margin: 0px 0;">
                        <div class="page-header">
                            <h3 class="text-center all-tittle">SISTEMA DE CONTROL DE OXIGENO MEDICINAL
                                <br><small>Administración de usuarios</small></h3>
                        </div>
                    </div>
                    <div class="text-center all-tittle">REGISTRO PARA CREAR NUEVO USUARIO</div>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-6">
                        <label>Identificador de Usuario</label>
                        <input type="text" class="form-control" name="id" id="id" required autocomplete="id"
                            data-toggle="tooltip" data-placement="top">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Tipo usuario</label>
                        <select class="form-control" data-toggle="tooltip" data-placement="top" name="mytipo"
                            id="mytipo">
                            <option value="" disabled="" selected="">Seleccione una opcion</option>
                            <option value="Cliente">Cliente</option>
                            <option value="Administrador">Administrador</option>
                        </select>
                    </div>

                    <input type="hidden" class="form-control" id="tipo_usuario" name="tipo_usuario">

                    <div class="form-group col-md-6">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required autocomplete="name"
                            data-toggle="tooltip" data-placement="top">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-group col-md-6">
                        <label for="email">{{ __('Correo Electronico') }}</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                            required autocomplete="email" data-toggle="tooltip" data-placement="top">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label>Sexo</label>
                        <select class="form-control" data-toggle="tooltip" data-placement="top"
                            title="Elige la sección a la que pertenece el alumno" name="sexo" id="sexo">
                            <option value="" disabled="" selected="">Seleccione una opcion</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>

                    <input type="hidden" class="form-control" id="sex" name="sex">

                    <div class="form-group col-md-6">
                        <label>Seleccione el rol del usuario</label>
                        <select id="rol" class="form-control" data-toggle="tooltip" data-placement="top"
                            title="Elige la sección a la que pertenece el alumno" name="rol">
                            <option value="" disabled="" selected="">Selecciona un rol</option>
                            <option value="Doctor">Doctor</option>
                            <option value="Doctora">Doctora</option>
                            <option value="Enfermera">Enfermera</option>
                        </select>
                    </div>

                    <input type="hidden" class="form-control" id="roles" name="roles">

                    <div class="form-group col-md-6">
                        <label for="password">{{ __('Contraseña') }}</label>
                        <input id="pass" type="password" class="form-control" name="pass" required
                            autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="password-confirm">{{ __('Confirmar Contraseña') }}</label>
                        <input id="passC" type="password" class="form-control" name="passC" required
                            autocomplete="new-password">
                    </div>

                </div>
                <div class="modal-footer">
                    <p class="text-center">
                        <button type="button" class="btn btn-primary" id="add" onClick="balidatu()"><i
                                class="zmdi zmdi-floppy"></i>
                            {{ __('Guardar') }}
                        </button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span>Cerrar
                        </button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>