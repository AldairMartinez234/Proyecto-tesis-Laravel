$(document).ready(function (){

  $('.delete-confirm').click(function (e) {
    e.preventDefault();
    swal({
        title: "¿Está seguro?",
      text: "Una vez eliminado, no podrá recuperar este archivo!",
      icon: "warning",
      buttons: true,dangerMode: true,
    }).then(function(value) {
        if (value) {
          swal({ title: "El archivo ha sido eliminado!",
          icon: "success",
        });
          var row = $(this).parents('div');
          var id = row.data('id');
          
          alert(id);
         
        }else{
          swal({title: "Operación cancelada!",
            icon: "error",
          });
        }
    });
});

});
