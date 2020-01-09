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
         
              <input type="text" class="form-control" id="rol" name="rol" disable="disable" readonly >
              <input type="hidden" class="form-control" id="id" name="id">
          </div>


          <div class="form-group">
          <label for="lalo"  class="control-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre:" required autocomplete="off" >
              
          </div>


          <div class="form-group">
          <label for="lalo"  class="control-label">Apellido</label>
          <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido:" required autocomplete="off" >
          </div>


          <div class="form-group">
        <label for="lalo"  class="control-label">Correo:</label>
           <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo:" required autocomplete="off" >
        </div>
    

        <div class="form-group">
        <label for="lalo"  class="control-label">Nick:</label>
           <input type="text" class="form-control" id="nick" name="nick" placeholder="Nick:" required autocomplete="off" >
        </div>
  
        <div class="form-group">
        <label for="lalo"  class="control-label">Contraseña</label>
           <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" required autocomplete="off" >
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