
  $(function(){
    $(document).on('change','#mytipo',function(){ //detectamos el evento change
      var value = $(this).val();//sacamos el valor del select
      $('#tipo_usuario').val(value);//le agregamos el valor al input (notese que el input debe tener un ID para que le caiga el valor)
    });
  });

  $(function(){
    $(document).on('change','#sexo',function(){ //detectamos el evento change
      var value = $(this).val();//sacamos el valor del select
      $('#sex').val(value);//le agregamos el valor al input (notese que el input debe tener un ID para que le caiga el valor)
    });
  });

  $(function(){
    $(document).on('change','#rol',function(){ //detectamos el evento change
      var value = $(this).val();//sacamos el valor del select
      $('#roles').val(value);//le agregamos el valor al input (notese que el input debe tener un ID para que le caiga el valor)
    });
  });

