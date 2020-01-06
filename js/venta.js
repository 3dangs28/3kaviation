function load(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn('slow');
    $.ajax({
        url:'ventas_ajax.php',
        data: parametros,
         beforeSend: function(objeto){
        $("#loader").html("<img src='giphy.gif'>");
        },
        success:function(data){
            $(".outer_div").html(data).fadeIn('slow');
            $("#loader").html("");
        }
    })
}

    $('#dataUpdate').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('id') // Extraer la información de atributos de datos
      var perfil = button.data('perfil') // Extraer la información de atributos de datos
      var descripcion = button.data('descripcion') // Extraer la información de atributos de datos

      
      var modal = $(this)
      modal.find('.modal-title').text('Modificar perfil: '+perfil)
      modal.find('.modal-body #id').val(id)
      modal.find('.modal-body #perfil').val(perfil)
      modal.find('.modal-body #descripcion').val(descripcion)
      $('.alert').hide();//Oculto alert
    })
    
    $('#dataDelete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('id') // Extraer la información de atributos de datos
      var modal = $(this)
      modal.find('#id').val(id)
    })

$( "#actualidarDatos" ).submit(function( event ) {
    var parametros = $(this).serialize();
         $.ajax({
                type: "POST",
                url: "perfiles/modificar.php",
                data: parametros,
                 beforeSend: function(objeto){
                    $("#datos_ajax").html("Mensaje: Cargando...");
                  },
                success: function(datos){
                $("#datos_ajax").html(datos);
                
                load(1);
              }
        });
      event.preventDefault();
    });
    
    $( "#guardarDatos" ).submit(function( event ) {
    var parametros = $(this).serialize();
         $.ajax({
                type: "POST",
                url: "perfiles/agregar.php",
                data: parametros,
                 beforeSend: function(objeto){
                    $("#datos_ajax_register").html("Mensaje: Cargando...");
                  },
                success: function(datos){
                $("#datos_ajax_register").html(datos);
                
                load(1);
              }
        });
      event.preventDefault();
    });
    
    $( "#eliminarDatos" ).submit(function( event ) {
    var parametros = $(this).serialize();
         $.ajax({
                type: "POST",
                url: "perfiles/eliminar.php",
                data: parametros,
                 beforeSend: function(objeto){
                    $(".datos_ajax_delete").html("Mensaje: Cargando...");
                  },
                success: function(datos){
                $(".datos_ajax_delete").html(datos);
                
                $('#dataDelete').modal('hide');
                load(1);
              }
        });
      event.preventDefault();
    });