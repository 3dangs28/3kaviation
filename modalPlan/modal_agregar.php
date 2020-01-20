


<form id="guardarDatos">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      

    <div class="modal-header">
                    <h5 class="modal-title">Formulario para agregar planes de vuelo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


      <div class="modal-body">
      <div id="datos_ajax_register"></div>


    

      <div class="form-row">

<div class="form-group col-md-6">



<label for="inputPassword4">Modelo</label>

  <?php require_once("conn/conexion.php");
                                        $query = mysqli_query($con,"SELECT ID_AERONAVE,NOMBRE FROM AVI_AERONAVES");
                                     ?>
                            
                                    <select class="form-control" id="avion" name="avion" required>
                                    <option value="">Seleccione avión</option>
                            
                                    <?php  while($row = mysqli_fetch_array($query)){  ?>    
                                   <?php     echo "<option value=".$row['ID_AERONAVE'].">".$row['NOMBRE']."</option>";
                                    }
                                
                                    ?>
                            
                            
                               </select>
                             


</div>

<div class="form-group col-md-6">
  <label for="inputPassword4">Propietario</label>
  <input type="propietario" class="form-control" id="propietario" name="propietario" placeholder="Propietario">
</div>

</div>
<br>
  <div class="form-row">

    <div class="form-group col-md-6">
      <label for="inputEmail4">Aeropuerto salida</label>
      <select id="salidaLugar" name="salidaLugar" class="form-control">
        <option selected>Seleccione lugar</option>
        <option>Panamá</option>
        <option>Bocas del toro</option>
        <option>Chiriquí</option>
      </select>
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">Aeropuerto llegada</label>
      <select id="llegadaLugar" name="llegadaLugar" class="form-control">
      <option selected>Seleccione lugar</option>
        <option>Panamá</option>
        <option>Bocas del toro</option>
        <option>Chiriquí</option>
      </select>
    </div>

  </div>



  <div class="form-row">



  <div class="container">
    <div class="row">
        <div class='col-sm-4'>
            <div class="form-group">
              

              
            </div>
        </div>

 
 
    </div>
</div>








    <div class="form-group col-md-4">
    <div class="bootstrap-timepicker">
      <label for="inputSalida">Hora de salida</label>
      <div class="input-group">
  
          <input type="text" id="salidaHora" name="salidaHora" class="form-control timepicker">

           <div class="input-group-append">
             <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
          </div>
      </div>
   </div>
   </div>
  

    <div class="form-group col-md-4">
    <div class="bootstrap-timepicker">
      <label for="inputLLegada">Hora de llegada</label>
      <div class="input-group">
  
          <input type="text" id="llegadaHora" name="llegadaHora" class="form-control timepicker">

           <div class="input-group-append">
             <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
          </div>
      </div>
   </div>
    </div>




    <div class="form-group col-md-4">
    <label for="inputCity">Fecha de viaje</label>
    <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="text" id="fechaViaje" name="fechaViaje" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask="">
                  </div>

    </div>




  </div>






  <div class="form-group">
    <label for="inputAddress">Declaración sanitaria</label>
    <input type="text" class="form-control" id="declaracion" name="declaracion" placeholder="Escriba la declaración">
  </div>
		
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar datos</button>
      </div>

    </div>
  </div>
</div>
</form>

<!-- Bootstrap WYSIHTML5 -->
