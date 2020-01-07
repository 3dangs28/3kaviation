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
                                        $query = mysqli_query($con,"SELECT ID_APLICACION,APLICACION FROM APLICACIONES");
                                     ?>
                            
                                    <select class="form-control" id="aplicacion" name="aplicacion" required>
                                    <option value="">Seleccione aplicación</option>
                            
                                    <?php  while($row = mysqli_fetch_array($query)){  ?>    
                                   <?php     echo "<option value=".$row['ID_APLICACION'].">".$row['APLICACION']."</option>";
                                    }
                                
                                    ?>
                            
                            
                               </select>
                             
                            
             </div>
                            


             <div class="form-group">
                							
         <?php 
            $query1 = mysqli_query($con,"SELECT ID_ROL,ROL FROM ROLES");
         ?>

        <select class="form-control" id="rol" name="rol" required>
        <option value="">Seleccione Rol</option>

        <?php  while($row1 = mysqli_fetch_array($query1)){  ?>    
       <?php     echo "<option value=".$row1['ID_ROL'].">".$row1['ROL']."</option>";
        }
        mysqli_close($con);
        ?>


   </select>
 

</div>

      
		     <div class="form-group">
           
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre:" required autocomplete="off" >
         </div>
      
         <div class="form-group">
         
            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido:" required autocomplete="off" >
         </div>

   

         <div class="form-group">
         
         <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo:" required autocomplete="off" >
      </div>

         <div class="form-group">
         
            <input type="text" class="form-control" id="nick" name="nick" placeholder="Nick:" required autocomplete="off" >
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