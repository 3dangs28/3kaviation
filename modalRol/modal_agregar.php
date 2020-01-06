<form id="guardarDatos">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      

    <div class="modal-header">
                    <h5 class="modal-title">Formulario para agregar roles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


      <div class="modal-body">
      <div id="datos_ajax_register"></div>

      <div class="form-group">
                							
                              <?php require_once("conn/conexion.php");
                                 $query = mysqli_query($con,"SELECT ID_APLICACION,APLICACION FROM APLICACIONES");
                              ?>
                     
                             <select class="form-control" id="aplicacion" name="aplicacion" required>
                             <option value="">Seleccione Aplicación</option>
                     
                             <?php  while($row = mysqli_fetch_array($query)){  ?>    
                            <?php     echo "<option value=".$row['ID_APLICACION'].">".$row['APLICACION']."</option>";
                             }
                             mysqli_close($con);
                             ?>
                     
                     
                        </select>
                      
                     
                                                 </div>
	 
          <div class="form-group">
            <label for="perfil0" class="control-label">Rol:</label>
            <input type="text" class="form-control" id="rol" name="rol" placeholder="Nombre del rol" required autocomplete="off" >
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