
<?php

require_once("../conn/conexion.php");

        $query = mysqli_query($con,"SELECT ID_PERFIL,PERFIL,DESCRIPCION FROM USR_PERFILES");
        ?>
        <select class="form-control" id="perfil0" name="perfil" required>
        <option value="">Seleccione...</option>

        <?php  while($row = mysqli_fetch_array($query)){  ?>    
            <?php     echo "<option value=".$row['ID_PERFIL'].">".$row['PERFIL']."</option>";?>

        
        <?php 
                }

                mysqli_close($con);

?>
   </select>
