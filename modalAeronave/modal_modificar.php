<form id="actualidarDatos">
<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
                    <h5 class="modal-title">Modificar datos del avión</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
      <div class="modal-body">
			<div id="datos_ajax"></div>


          <div class="form-group">
            <label for="codigo" class="control-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del rol" required >
			<input type="hidden" class="form-control" id="id" name="id">
          </div>


          <div class="form-group">
            <label for="co1" class="control-label">Tipo:</label>
            <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Cantidad de consumo" required >
		
          </div>
          <div class="form-group">
            <label for="co2" class="control-label">Consumo:</label>
            <input type="text" class="form-control" id="consumo" name="consumo" placeholder="Cantidad de consumo" required >
		
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