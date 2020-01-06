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
          <label for="lalo"  class="control-label">Cédula</label>
              <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cédula:" required autocomplete="off" >
              <input type="hidden" class="form-control" id="id" name="id">
              <input type="hidden" class="form-control" id="usr" name="usr">
          </div>

          <div class="form-group">
          <label for="lalo"  class="control-label">Primer Nombre</label>
          <input type="text" class="form-control" id="nombre1" name="nombre1" placeholder="Primer Nombre:" required autocomplete="off" >
          </div>

          <div class="form-group">
          <label for="lalo"  class="control-label">Segundo Nombre</label>
          <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="Segundo Nombre:" required autocomplete="off" >
          </div>

          <div class="form-group">
          <label for="lalo"  class="control-label">Primer Apellido</label>
          <input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="Primer Apellido:" required autocomplete="off" >
          </div>

          <div class="form-group">
          <label for="lalo"  class="control-label">Segundo Apellido</label>
          <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Segundo Apellido:" required autocomplete="off" >
          </div>


          <div class="form-group">
          <label for="lalo"  class="control-label">Género</label>
				                            <select class="form-control" id="gen" name="gen" required>

                                    <option value="1">MASCULINO</option>
				                            <option value="2">FEMENINO</option>

				                            </select>
				  </div>

        <div class="form-group">
        <label for="lalo"  class="control-label">Correo:</label>
           <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo:" required autocomplete="off" >
        </div>
  
        <div class="form-group">
        <label for="lalo"  class="control-label">Teléfono</label>
           <input type="text" class="form-control" id="tel" name="tel" placeholder="Teléfono:" required autocomplete="off" >
        </div>

        <div class="form-group">
        <label for="lalo"  class="control-label">Dirección</label>

           <textarea class="form-control" id="dir" name="dir"  rows="3" placeholder="Dirección:"  autocomplete="off"></textarea>
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