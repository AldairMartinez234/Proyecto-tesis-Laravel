
$(document).on('change','input[type="checkbox"]' ,function(e) {
    if(this.id=="roless") {
        if(this.checked) $('#id_roles').val(this.value);
        else $('#id_roles').val("");
    }
    
});

function validar() {
 //obteniendo el valor que se puso en el campo text del formulario
  var selected = [];
    $(":checkbox[name=roless]").each(function() {
      if (this.checked) {
        // agregas cada elemento.
        selected.push($(this).val());
      }
    });
 var password = $("#passs").val();
 var di = $("#di").val();
 var nombre = $("#nombre").val();
 var correo = $("#correo").val();
 var tipo = $("#tipo").val();
 var role = $("#role").val();
 var roless = $("#id_roles").val();
 var sexo = $("#se").val();
 var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 var nom = /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;
 //la condición
 if ( password == null || password.length == 0 || /^\s+$/.test(password)) {
     Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No puede dejar el campo contraseña vacio!',
              })
     return false;
 }

  if (nombre.length == 0 || !nom.test(nombre)) {
     Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El campo nombre no puede quedar vacio y no puede llevar numeros!',
              })
     return false;
 }

 if (!regex.test(correo) ) {
     Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No puede dejar el campo correo vacio o no tiene el formato incorrecto!',
              })
     return false;
 }

 if (tipo.length == 0 || tipo == null) {
     Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No puede dejar el campo tipo vacio!',
              })
     return false;
 }

 if (role.length == 0 || /^\s+$/.test(role)) {
     Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No puede dejar el campo rol vacio!',
              })
     return false;
 }

 if (roless.length == 0 || /^\s+$/.test(roless)) {
     Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No puede dejar el campo roles vacio!',
              })
     return false;
 }

 if (sexo.length == 0 || /^\s+$/.test(sexo)) {
     Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No puede dejar el campo sexo vacio!',
              })
     return false;
 }

        $.ajax({
            url: '/editItem',
            type: 'post',
            data: {
                '_token':       $('input[name=_token]').val(),
                'id':           $('#di').val(),
                'name':         $('#nombre').val(),
                'email':        $('#correo').val(),
                'tipo_usuario': $('#tipo').val(),
                'rol':          $('#role').val(),
                'pass':         $('#passs').val(),
                'roles':        selected,
                'sexo':         $('#se').val()
            },
            success: function(data) {
                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.name + "</td><td>" + data.rol + "</td><td>" + data.sexo + "</td><td>" + data.email + "</td><td>" + 'Estado' + "</td><td><a data-name='" + data.name + "' data-email='"+ data.email + "' data-tipo_usuario='" + data.tipo_usuario + "' data-sexo='" +data.sexo + "' data-rol='" + data.rol +"' data-id='" + data.id + "'' data-toggle='modal' data-target='#vista'><button type='button' class='btn btn-info tooltips-general' data-toggle='tooltip' data-placement='top' title='Cuenta desactivada, pulsa el botón para activarla'><i class='glyphicon glyphicon-user'></i></button></a></td><td><a data-name='" + data.name + "' data-email='"+ data.email + "' data-tipo_usuario='" + data.tipo_usuario + "' data-sexo='" +data.sexo + "' data-rol='" + data.rol +"' data-id='" + data.id + "'data-toggle='modal' data-target='#edit'><button type='button' class='btn btn-success' data-toggle='tooltip' data-placement='top' title='Cuenta desactivada, pulsa el botón para activarla'><i class='glyphicon glyphicon-edit'></i></button></a></td><td><form action='{{route('usuarios.destroy','" + data.id + "')}}' method='POST'> <input type='hidden' name='_method' value='DELETE'><input type='hidden' name='_token' value='{{ csrf_token() }}'><a class='button delete-confirm btn btn-danger'><i class='glyphicon glyphicon-trash'></i></a> </form> </td> <tr>");
                $('#edit').addClass('hidden');
                alertify.set('notifier','position', 'top-right');
                alertify.notify('Cambios guardados,¡EXITOSAMENTE!', 'success', 5, function(){});
             }
        });
    $('#id').val('');
    $('#nombre').val('');
    $('#correo').val('');
    $('#tipo').val('');
    $('#role').val('');
    $('#roless').val('');
    $('#passs').val('');
    $('#se').val('');
 }

$('#edit').on('show.bs.modal', function (event) {
      
      var button = $(event.relatedTarget) 
      var title = button.data('name') 
      var description = button.data('email') 
      var tipo_usuario = button.data('tipo_usuario') 
      var sexo = button.data('sexo') 
      var rol = button.data('rol')
      var id = button.data('id') 
      var di = button.data('id')
      var modal = $(this)

      var selector = document.getElementById('tipo');
     

      if(tipo_usuario == 'Administrador'){
      selector.options[0] = new Option(tipo_usuario,tipo_usuario);
      selector.options[1] = new Option('Cliente','Cliente');
    }else{
      selector.options[0] = new Option(tipo_usuario,tipo_usuario);
      selector.options[1] = new Option('Administrador','Administrador');
    }

     var selector2 = document.getElementById('se');

     if(sexo == 'Masculino'){
      selector2.options[0] = new Option(sexo,sexo);
      selector2.options[1] = new Option('Femenino','Femenino');
    }else{
      selector2.options[0] = new Option(sexo,sexo);
      selector2.options[1] = new Option('Masculino','Masculino');
    }

      modal.find('.modal-body #nombre').val(title);
      modal.find('.modal-body #tipo').val(tipo_usuario);
      modal.find('.modal-body #se').val(sexo);
      modal.find('.modal-body #correo').val(description);
      modal.find('.modal-body #role').val(rol);
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #di').val(di);
});


  function balidatu(){
        var pas1 = $("#pass").val();
        var pas2 = $("#passC").val();
        var id = $("#id").val();
        var nombre = $("#name").val();
        var correo = $("#email").val();
        var tipo = $("#tipo_usuario").val();
        var role = $("#roles").val();
        var sexo = $("#sex").val();
        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var nom = /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;
        var espacios = false;
        var cont = 0;

while (!espacios && (cont < pas1.length)) {
  if (pas1.charAt(cont) == " ")
    espacios = true;
  cont++;
}  

if ( pas1 == null || pas1.length == 0 || /^\s+$/.test(pas1)) {
     Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No puede dejar el campo contraseña vacio!',
              })
     return false;
 }

if (espacios) {
  Swal.fire("Advertencia", "La contraseña no puede contener espacios en blanco", "warning");    
  return false;
}else{
if (pas1 != pas2) {
  Swal.fire("Advertencia", "Las contraseñas deben de coincidir", "warning"); 
  return false;
}

  }

   if (nombre.length == 0 || !nom.test(nombre)) {
     Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El campo nombre no puede quedar vacio y no puede llevar numeros!',
              })
     return false;
 }

 if (!regex.test(correo) ) {
     Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No puede dejar el campo correo vacio o no tiene el formato incorrecto!',
              })
     return false;
 }

 if (tipo.length == 0 || tipo == null) {
     Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No puede dejar el campo tipo vacio!',
              })
     return false;
 }

 if (role.length == 0 || /^\s+$/.test(role)) {
     Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No puede dejar el campo rol vacio!',
              })
     return false;
 }

 if (id.length == 0 || /^\s+$/.test(id)) {
     Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No puede dejar el campo identificador vacio!',
              })
     return false;
 }

 if (sexo.length == 0 || /^\s+$/.test(sexo)) {
     Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No puede dejar el campo sexo vacio!',
              })
     return false;
 }
    $.ajax({
        url: '/addItem',
        type: 'post',
        data: {
           '_token':        $('input[name=_token]').val(),
            'id':           $('input[name=id]').val(),
            'tipo_usuario': $('input[name=tipo_usuario]').val(),
            'name':         $('input[name=name]').val(),
            'email':        $('input[name=email]').val(),
            'sexo':         $('input[name=sex]').val(),
            'rol':          $('input[name=roles]').val(),
            'pass':         $('input[name=pass]').val()
        },
        success: function(data) {
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                $('.error').text(data.errors.id);
                $('.error').text(data.errors.tipo_usuario);
                $('.error').text(data.errors.name);
                $('.error').text(data.errors.email);
                $('.error').text(data.errors.sexo);
                $('.error').text(data.errors.rol);
                $('.error').text(data.errors.pass);
                alertify.notify('Hubo un error al momento de guardar,¡Por favor repita la operacion!', 'error', 5, function(){});
            } else {
                $('.error').remove();
                $('#example1').append("<tr class='item" + data.id + "'><td>" + data.name + "</td><td>" + data.rol + "</td><td>" + data.sexo + "</td><td>" + data.email + "</td><td>" + 'Inactivo' + "</td><td><a data-name='" + data.name + "' data-email='"+ data.email + "' data-tipo_usuario='" + data.tipo_usuario + "' data-sexo='" +data.sexo + "' data-rol='" + data.rol +"' data-id='" + data.id + "'' data-toggle='modal' data-target='#vista'><button type='button' class='btn btn-info tooltips-general' data-toggle='tooltip' data-placement='top' title='Cuenta desactivada, pulsa el botón para activarla'><i class='glyphicon glyphicon-user'></i></button></a></td><td><a data-name='" + data.name + "' data-email='"+ data.email + "' data-tipo_usuario='" + data.tipo_usuario + "' data-sexo='" +data.sexo + "' data-rol='" + data.rol +"' data-id='" + data.id + "'data-toggle='modal' data-target='#edit'><button type='button' class='btn btn-success' data-toggle='tooltip' data-placement='top' title='Cuenta desactivada, pulsa el botón para activarla'><i class='glyphicon glyphicon-edit'></i></button></a></td><td><form action='{{route('usuarios.destroy','" + data.id + "')}}' method='POST'> <input type='hidden' name='_method' value='DELETE'><input type='hidden' name='_token' value='{{ csrf_token() }}'><a class='button delete-confirm btn btn-danger'><i class='glyphicon glyphicon-trash'></i></a></form></td><tr>");
                alertify.set('notifier','position', 'top-right');
                alertify.notify('Usuario agregado,¡EXITOSAMENTE!', 'success', 5, function(){});

            }
        },
    });
    $('#id').val('');
    $('#mytipo').val('');
    $('#name').val('');
    $('#email').val('');
    $('#sexo').val('');
    $('#rol').val('');
    $('#pass').val('');
    $('#passC').val('');
    } 

    $('#addunidades').click(function (e) {
            e.preventDefault()
            $.ajax({
        url: '/addunidades',
        type: 'post',
        data: {
           '_token':        $('input[name=_token]').val(),
            'unidad': $('input[name=unidad]').val(),
            'nombre':         $('input[name=nombre]').val(),
            'telefono':        $('input[name=telefono]').val(),
            'telefono2':         $('input[name=telefono2]').val(),
            'red':          $('input[name=red]').val(),
            'red1':         $('input[name=red1]').val(),
            'ext':          $('input[name=ext]').val(),
            'tel_particular':         $('input[name=tel_parti]').val(),
            'tel_particular1':          $('input[name=tel_parti1]').val()
        },
            success: function (data) {
                if(data.error){
                  $('.error').removeClass('hidden');
                   alertify.notify('Hubo un error al momento de guardar,¡Por favor repita la operacion!', 'error', 5, function(){});
                }else{
                   $('.error').remove();
                  $('#create_unidades').modal('hide');  // Your modal Id
                   alertify.set('notifier','position', 'top-right');
                   alertify.notify('Unidad agregada,¡EXITOSAMENTE!', 'success', 5, function(){});

                }
            },
        });

    $('#unidad').val('');
    $('#nombre').val('');
    $('#telefono').val('');
    $('#ext').val('');
    $('#red').val('');
    $('#tel_parti').val('');
});



    $('#edit_unidades').on('show.bs.modal', function (event) {

       var button = $(event.relatedTarget) 
      var unidad = button.data('unidad') 
      var nombre = button.data('nombre') 
      var telefono = button.data('telefono') 
      var telefono2 = button.data('telefono2') 
      var ext = button.data('ext') 
      var red = button.data('red')
      var red1 = button.data('red1')
      var tel = button.data('tel')
      var tel1 = button.data('tel1')
      var id = button.data('id') 
      var modal = $(this)

      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #unidad').val(unidad);
      modal.find('.modal-body #nombre').val(nombre);
      modal.find('.modal-body #telefono').val(telefono);
      modal.find('.modal-body #telefono2').val(telefono2);
      modal.find('.modal-body #ext').val(ext);
      modal.find('.modal-body #red').val(red);
      modal.find('.modal-body #red1').val(red1);
      modal.find('.modal-body #tel_parti').val(tel);
      modal.find('.modal-body #tel_parti1').val(tel1);

});

  $('#vista').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var title = button.data('name') 
      var description = button.data('email') 
      var tipo_usuario = button.data('tipo_usuario') 
      var sexo = button.data('sexo') 
      var rol = button.data('rol')
      var cat_id = button.data('id') 
      var modal = $(this)

      modal.find('.modal-body #name').val(title);
      modal.find('.modal-body #tipo_usuario').val(tipo_usuario);
      modal.find('.modal-body #sexo').val(sexo);
      modal.find('.modal-body #rol').val(rol);
      modal.find('.modal-body #email').val(description);
      modal.find('.modal-body #id').val(cat_id);
});

   $('#vista_unidades').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var unidad = button.data('unidad') 
      var nombre = button.data('nombre') 
      var telefono = button.data('telefono') 
      var telefono2 = button.data('telefono2') 
      var ext = button.data('ext') 
      var red = button.data('red')
      var red1 = button.data('red1')
      var tel = button.data('tel')
      var tel1 = button.data('tel1')
      var id = button.data('id') 
      var modal = $(this)

      modal.find('.modal-body #unidad').val(unidad);
      modal.find('.modal-body #nombre').val(nombre);
      modal.find('.modal-body #telefono').val(telefono);
      modal.find('.modal-body #telefono2').val(telefono2);
      modal.find('.modal-body #ext').val(ext);
      modal.find('.modal-body #red').val(red);
      modal.find('.modal-body #red1').val(red1);
      modal.find('.modal-body #tel_parti').val(tel);
      modal.find('.modal-body #tel_parti1').val(tel1);
});

    $('#vista_roles').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var name = button.data('name') 
      var description = button.data('description') 
      var slug = button.data('slug') 
      var id = button.data('id') 
      var modal = $(this)

      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #description').val(description);
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #slug').val(slug);
});

    $('#vista_roles_edit').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var name = button.data('name') 
      var description = button.data('description') 
      var id = button.data('id') 
      var slug = button.data('slug') 
      var modal = $(this)

      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #description').val(description);
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #slug').val(slug);
});
    


