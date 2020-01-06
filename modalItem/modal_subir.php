<form id="upload" method="post"  action="upload.php" enctype="multipart/form-data">
<div class="modal fade" id="dataUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
                    <h5 class="modal-title">Subir archivo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
      <div class="modal-body">
			<div id="datos_ajax"></div>
      
		  <div class="form-group">
			<input type="hidden" class="form-control" id="id" name="id">
         Seleccione archivo: <input type='file' name='file' id='file' class='form-control' ><br>
          </div>
        
      </div>
      <div class="modal-footer">
      <input type="submit" class="btn btn-primary"  value="Guardar" id="btn" class="botonera">
    
      </div>
    </div>
  </div>
</div>
</form>  