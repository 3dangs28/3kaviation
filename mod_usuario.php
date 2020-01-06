<?php 
include("inc/librerias.php");
?>
	 



  
<script>
function goBack() {
  window.location ='usuarios.php';
}
</script>

</div>
  <!-- /.content-wrapper -->

     <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <img src="img/iconos/logo.png" >

    </aside>

<div class="content-wrapper">



<?php  
require_once("conn/conexion.php");  
if(isset($_POST['SubmitButton'])){ //check if form was submitted
 
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['id'])) {
    $errors[] = "ID vacío";
} else if (empty($_POST['perfil'])){
    $errors[] = "perfil vacío";
} else if (empty($_POST['nombre'])){
$errors[] = "Nombre vacío";
} else if (empty($_POST['apellido'])){
$errors[] = "Apellido vacío";
} else if (empty($_POST['usr'])){
$errors[] = "Usuario vacío";
} else if (empty($_POST['pass'])){
$errors[] = "Clave vacío";
} else if (empty($_POST['estatus'])){
$errors[] = "Estatus vacío";
} else if (
!empty($_POST['id']) &&
!empty($_POST['perfil']) && 
!empty($_POST['nombre']) && 
!empty($_POST['apellido']) && 
!empty($_POST['usr']) && 
!empty($_POST['pass']) && 
!empty($_POST['estatus'])

){

// escaping, additionally removing everything that could be (html/javascript-) code



$id=intval($_POST['id']);
$perfil=intval($_POST['perfil']);
$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
$apellido=mysqli_real_escape_string($con,(strip_tags($_POST["apellido"],ENT_QUOTES)));
$usuario=mysqli_real_escape_string($con,(strip_tags($_POST["usr"],ENT_QUOTES)));
$clave=mysqli_real_escape_string($con,(strip_tags($_POST["pass"],ENT_QUOTES)));
$estatus=intval($_POST['estatus']);


$sql="UPDATE USUARIOS SET ID_PERFIL='".$perfil."', NOMBRE='".$nombre."', APELLIDO='".$apellido."', USUARIO='".$usuario."', CLAVE='".$clave."'	WHERE ID_USR='".$id."'";
$query_update = mysqli_query($con,$sql);
if ($query_update){
 $messages[] = "Los datos han sido actualizados satisfactoriamente.";
} else{
 $errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
}
} else {
$errors []= "Error desconocido.";
}

if (isset($errors)){

?>
<div class="alert alert-danger" role="alert">
 <button type="button" class="close" data-dismiss="alert">&times;</button>
   <strong>Error!</strong> 
   <?php
     foreach ($errors as $error) {
         echo $error;
       }
     ?>
</div>
<?php
}
if (isset($messages)){
 
 ?>
 <div class="alert alert-success" role="alert">
     <button type="button" class="close" data-dismiss="alert">&times;</button>
     <strong>¡Bien hecho!</strong>
     <?php
       foreach ($messages as $message) {
           echo $message;
         }
       ?>
 </div>
 <?php
}

?>
 <?php
}    
?>





<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Modificar usuarios</h1>
          </div>
          <div class="col-sm-6">
					<h3 class='text-right'>		
				<button type="button" class="btn btn-success"  onclick="goBack()"><i class='glyphicon glyphicon-plus'></i>Regresar</button>
			</h3>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


<?php 

$codigo = $_GET['id'];

$sql = 'SELECT NOMBRE, APELLIDO, USUARIO,CLAVE, ESTATUS
				
FROM USUARIOS  WHERE ID_USR="'.$codigo.'"';


$query = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($query)){

$nombre= $row['NOMBRE'];
$apellido =  $row['APELLIDO'];
$usr =  $row['USUARIO'];
$pass =  $row['CLAVE'];
$estatus1 =  $row['ESTATUS'];

}




?>


<section class = "content">
  


<form action="" method="post"> 
   

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



       <div id="datos_ajax"></div>   

 
       <div class="form-group">
        <label for="lalo"  class="control-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre;?>" placeholder="Nombre:" required autocomplete="off" >
              <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $codigo;?>">
          </div>


          <div class="form-group">
          <label for="lalo"  class="control-label">Apellido</label>
          <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido:" value="<?php echo $apellido;?>" required autocomplete="off" >
          </div>


                                           
        <div class="form-group">
        <label for="lalo"  class="control-label">Usuario:</label>
           <input type="text" class="form-control" id="usr" name="usr" value="<?php echo $usr;?>" placeholder="Usuario:" required autocomplete="off" >
        </div>
  
        <div class="form-group">
        <label for="lalo"  class="control-label">Contraseña</label>
           <input type="password" class="form-control" id="pass" name="pass" value="<?php echo $pass;?>" placeholder="Contraseña" required autocomplete="off" >
        </div>



        <div class="form-group">
          <label for="lalo"  class="control-label">Estatus</label>
				                            <select class="form-control" id="estatus" name="estatus"  required>
                                            <?php 
                                            if ($estatus1==1){
                                                ?>  <option value="1"  selected>Activo</option>
                                                    <option value="2">Inactivo</option>
                                            <?php  }else{
                                                ?>  <option value="1"  >Activo</option>
                                                    <option value="2" selected>Inactivo</option>
                                                    <?php        
                                            }
                                            ?>
				                            
				                            </select>
				                </div>

      </div>
      <div class="modal-footer">
      
        <button type="submit" name="SubmitButton" class="btn btn-primary">Actualizar datos</button>
    </div>
    </div>

</form>



</section>




