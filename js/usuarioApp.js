function load(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn('slow');
    $.ajax({
        url:'usuarios_ajax.php',
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
      var rol = button.data('rol') // Extraer la información de atributos de datos
      var aplicacion = button.data('aplicacion') // Extraer la información de atributos de datos
      var nombre = button.data('nombre') // Extraer la información de atributos de datos
      var apellido = button.data('apellido') // Extraer la información de atributos de datos
      var correo = button.data('correo') // Extraer la información de atributos de datos
      var nick = button.data('nick') // Extraer la información de atributos de datos
      var pass = button.data('pass') // Extraer la información de atributos de datos


      var modal = $(this)
      modal.find('.modal-title').text('Modificar usuario: '+nombre+' en aplicación: '+aplicacion)
      modal.find('.modal-body #id').val(id)
      modal.find('.modal-body #rol').val(rol)
      modal.find('.modal-body #nombre').val(nombre)
      modal.find('.modal-body #apellido').val(apellido)
      modal.find('.modal-body #correo').val(correo)  
      modal.find('.modal-body #nick').val(nick)
      modal.find('.modal-body #pass').val(pass)
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
                url: "usuarios/modificar.php",
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
                url: "usuarios/agregar.php",
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
                url: "usuarios/eliminar.php",
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