<table id="example1" class="table table-bordered table-striped table-hover" style="text-align: center;">
    <thead>
        <tr class="table-primary">
            <th style="text-align: center;">Nombre</th>
            <th style="text-align: center;">Puesto de trabajo</th>
            <th style="text-align: center;">Sexo</th>
            <th style="text-align: center;">Correo electronico</th>
            <th style="text-align: center;">Estado</th>
            @can('usuarios.show')
            <th style="text-align: center;">Datos</th>
            @endcan
            @can('usuarios.edit')
            <th style="text-align: center;">Editar</th>
            @endcan
            @can('usuarios.destroy')
            <th style="text-align: center;">Eliminar</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        {{ csrf_field() }}
        @foreach($users as $user)
        <tr class="item{{$user->id}}">
            <td>{{$user->name}}</td>
            <td>{{$user->rol}}</td>
            <td>{{$user->sexo}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->estado}}</td>
            @can('usuarios.show')
            <td>
                <a data-name="{{$user->name}}" data-email="{{$user->email}}" data-tipo_usuario="{{$user->tipo_usuario}}"
                    data-sexo="{{$user->sexo}}" data-rol="{{$user->rol}}" data-id="{{$user->id}}" data-toggle="modal"
                    data-target="#vista"><button type="button" class="btn btn-info tooltips-general"
                        data-toggle="tooltip" data-placement="top"
                        title="Cuenta desactivada, pulsa el botón para activarla"><i
                            class="glyphicon glyphicon-user"></i></button></a>
            </td>
            @endcan
            @can('usuarios.edit')
            <td>
                <a data-name="{{$user->name}}" data-email="{{$user->email}}" data-tipo_usuario="{{$user->tipo_usuario}}"
                    data-sexo="{{$user->sexo}}" data-rol="{{$user->rol}}" data-id="{{$user->id}}" data-toggle="modal"
                    data-target="#edit"><button type="button" class="btn btn-success" data-toggle="tooltip"
                        data-placement="top"><i class="glyphicon glyphicon-edit"></i></button></a>
            </td>
            @endcan
            @can('usuarios.destroy')
            <td>
                <form action="{{route('usuarios.destroy',$user->id)}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <a class="button delete-confirm btn btn-danger">
                        <i class="glyphicon glyphicon-trash"></i></a>
                </form>
            </td>
            @endcan
        </tr>
        @endforeach
    </tbody>
</table>