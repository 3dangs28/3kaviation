<form id="actualidarDatos">
<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
                    <h5 class="modal-title">Modificar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

      <div class="modal-body">
			<div id="datos_ajax"></div>

          <div class="form-group">
          <label for="lalo"  class="control-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre:" required autocomplete="off" >
              <input type="text" class="form-control" id="id" name="id">
          </div>


          <div class="form-group">
          <label for="lalo"  class="control-label">Apellido</label>
          <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido:" required autocomplete="off" >
          </div>

          <div class="form-group">
                							
                             
                     
                             <select class="form-control" id="perfil" name="perfil" required>
                             <option value="">Seleccione Perfil</option>
                     
                             <?php  while($variable){  ?>    
                            <?php     echo "<option value=".$row['ID_PERFIL'].">".$row['PERFIL']."</option>";
                             }
                   
                             ?>
                     
                     
                        </select>
                      
                     
                                                 </div>

        <div class="form-group">
        <label for="lalo"  class="control-label">Usuario:</label>
           <input type="text" class="form-control" id="usr" name="usr" placeholder="Usuario:" required autocomplete="off" >
        </div>
  
        <div class="form-group">
        <label for="lalo"  class="control-label">Contraseña</label>
           <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" required autocomplete="off" >
        </div>

        
          <div class="form-group">
          <label for="lalo"  class="control-label">Estatus</label>
				                            <select class="form-control" id="estatus" name="estatus" required>
				                      
				                                <option value="1">Activo</option>
				                                <option value="2">Inactivo</option>

				                            </select>
				                </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar datos</button>
      </div>
    </div>
  </div>
</div>
</form>