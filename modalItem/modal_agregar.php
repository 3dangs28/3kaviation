<form id="guardarDatos">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      

    <div class="modal-header">
                    <h5 class="modal-title">Formulario para registrar productos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


      <div class="modal-body">
      <div id="datos_ajax_register"></div>
      

      <div class="form-group">
      <label for="nombre0" class="control-label">Categoría:</label>
                              <?php require_once("conn/conexion.php");
                                 $query = mysqli_query($con,"SELECT * FROM CATEGORIAS WHERE ESTATUS=1");
                              ?>
                     
                             <select class="form-control" id="cate" name="cate" required>
            
                             <?php  while($row = mysqli_fetch_array($query)){  ?>    
                            <?php     echo "<option value=".$row['ID_CAT'].">".$row['NOMBRE_CAT']."</option>";
                             }
                             mysqli_close($con);
                             ?>
                     
                     
                        </select>
       </div>


                                                 
		     <div class="form-group">
         <label for="nombre0" class="control-label">Nombre:</label>
           <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto:" required autocomplete="off"   >
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
     
    
	
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar datos</button>
      </div>

    </div>
  </div>
</div>
</form>