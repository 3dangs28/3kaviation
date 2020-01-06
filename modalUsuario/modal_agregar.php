<form id="guardarDatos">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      

    <div class="modal-header">
                    <h5 class="modal-title">Formulario para agregar usuarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


      <div class="modal-body">
      <div id="datos_ajax_register"></div>
      

             <div class="form-group">
                							
         <?php require_once("conn/conexion.php");
            $query = mysqli_query($con,"SELECT ID_PERFIL,PERFIL,DESCRIPCION FROM PERFILES");
         ?>

        <select class="form-control" id="perfil" name="perfil" required>
        <option value="">Seleccione Perfil</option>

        <?php  while($row = mysqli_fetch_array($query)){  ?>    
       <?php     echo "<option value=".$row['ID_PERFIL'].">".$row['PERFIL']."</option>";
        }
        mysqli_close($con);
        ?>


   </select>
 

                						</div>

      
		     <div class="form-group">
           
            <input type="text" class="form-control" id="nombre0" name="nombre" placeholder="Nombre:" required autocomplete="off" >
         </div>
      
         <div class="form-group">
         
            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido:" required autocomplete="off" >
         </div>

   
         <div class="form-group">
         
            <input type="text" class="form-control" id="usr" name="usr" placeholder="Usuario:" required autocomplete="off" >
         </div>
   
         <div class="form-group">
           
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" required autocomplete="off" >
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