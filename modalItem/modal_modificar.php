<form id="actualidarDatos">
<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
                    <h5 class="modal-title">Modificar producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
      <div class="modal-body">
      <div id="datos_ajax"></div> 
   
      <div class="form-group">
          <label for="lalo"  class="control-label">Estatus</label>
				                            <select class="form-control" id="estatus" name="estatus" required>
				                 
				                                <option value="1">Activo</option>
				                                <option value="2">Inactivo</option>

				                            </select>
				                </div>


          <div class="form-group">
            <label for="codigo" class="control-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del item" required maxlength="2">
			<input type="text" class="form-control" id="id" name="id">
          </div>

        
          <div class="form-group">
         <label for="nombre1" class="control-label">Descripcion:</label>
           <input type="text" class="form-control" id="descri" name="descri" placeholder="Escriba la descripción:" required autocomplete="off"   >
        </div>

                                           
        <div class="form-group">
         <label for="nombre0" class="control-label">Cantidad:</label>
           <input type="number" step="1" class="form-control" id="cantidad" name="cantidad" placeholder="Escriba la cantidad:" required autocomplete="off"   >
        </div>


        
        <div class="form-group">
         <label for="nombre1" class="control-label">Precio:</label>
           <input type="number" step="0.01"  class="form-control" id="precio" name="precio" placeholder="Escriba el precio:" required autocomplete="off"   >
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