function load(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn('slow');
    $.ajax({
        url:'planVuelo_ajax.php',
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
      var avion = button.data('avion') // Extraer la información de atributos de datos
      var propietario = button.data('propietario') // Extraer la información de atributos de datos
      var salidaLugar = button.data('salidaLugar') // Extraer la información de atributos de datos
      var llegadaLugar = button.data('llegadaLugar') // Extraer la información de atributos de datos
      var salidaHora = button.data('salidaHora') // Extraer la información de atributos de datos
      var llegadaHora = button.data('llegadaHora') // Extraer la información de atributos de datos
      var fechaViaje = button.data('fechaViaje') // Extraer la información de atributos de datos
      var declaracion = button.data('declaracion') // Extraer la información de atributos de datos

      var modal = $(this)
      modal.find('.modal-title').text('Modificar aplicación con nombre de: '+aplicacion)
      modal.find('.modal-body #id').val(id)
      modal.find('.modal-body #avion').val(avion)
      modal.find('.modal-body #propietario').val(propietario)
      modal.find('.modal-body #salidaLugar').val(salidaLugar)
      modal.find('.modal-body #llegadaLugar').val(llegadaLugar)
      modal.find('.modal-body #salidaHora').val(salidaHora)
      modal.find('.modal-body #llegadaHora').val(llegadaHora)
      modal.find('.modal-body #fechaViaje').val(fechaViaje)
      $('.alert').hide();//Oculto alert
    })
    
    $('#dataDelete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('id') // Extraer la información de atributos de datos
      var modal = $(this)
      modal.find('#id').val(id)
      $('.alert').hide();//Oculto alert
    })


    $( "#actualidarDatos" ).submit(function( event ) {
      var parametros = $(this).serialize();
           $.ajax({
                  type: "POST",
                  url: "planes/modificar.php",
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
                  url: "planes/agregar.php",
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
                  url: "planes/eliminar.php",
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




      $('#dataRegisterTripu').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Botón que activó el modal
        var id = button.data('id') // Extraer la información de atributos de datos
        var modal = $(this)
        modal.find('.modal-body #id').val(id)
  
      })
   
  
      $( "#guardarDatosTripu" ).submit(function( event ) {
        var parametros = $(this).serialize();
             $.ajax({
                    type: "POST",
                    url: "planes/agregarTripu.php",
                    data: parametros,
                     beforeSend: function(objeto){
                        $("#datos_ajax_tripula").html("Mensaje: Cargando...");
                      },
                    success: function(datos){
                    $("#datos_ajax_tripula").html(datos);
                    
                    load(1);
                  }
            });
          event.preventDefault();
        });

     
        $('#dataRegisterPasa').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Botón que activó el modal
          var id = button.data('id') // Extraer la información de atributos de datos
          var modal = $(this)
          modal.find('.modal-body #id').val(id)
    
        })
  
        $( "#guardarDatosPasa" ).submit(function( event ) {
          var parametros = $(this).serialize();
               $.ajax({
                      type: "POST",
                      url: "planes/agregarPasa.php",
                      data: parametros,
                       beforeSend: function(objeto){
                          $("#datos_ajax_pasa").html("Mensaje: Cargando...");
                        },
                      success: function(datos){
                      $("#datos_ajax_pasa").html(datos);
                      
                      load(1);
                    }
              });
            event.preventDefault();
          });