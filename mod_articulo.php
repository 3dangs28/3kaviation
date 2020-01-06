<?php 
include("inc/librerias.php");
?>
	 



  
<script>
function goBack() {
  window.location ='/space/item.php';
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
} else if (empty($_POST['cate'])){
$errors[] = "Categoría vacío";
} else if (empty($_POST['nombre'])){
$errors[] = "Nombre vacío";
} else if (empty($_POST['descri'])){
$errors[] = "Descripción vacío";
} else if (empty($_POST['cantidad'])){
$errors[] = "Cantidad vacío";
} else if (empty($_POST['precio'])){
$errors[] = "Precio vacío";
} else if (empty($_POST['estatus'])){
$errors[] = "Estatus vacío";
} else if (
!empty($_POST['id']) &&
!empty($_POST['cate']) && 
!empty($_POST['nombre']) && 
!empty($_POST['descri']) && 
!empty($_POST['cantidad']) && 
!empty($_POST['precio']) && 
!empty($_POST['estatus'])

){

// escaping, additionally removing everything that could be (html/javascript-) code



$id=intval($_POST['id']);
$cate=intval($_POST['cate']);
$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
$descri=mysqli_real_escape_string($con,(strip_tags($_POST["descri"],ENT_QUOTES)));
$precio=mysqli_real_escape_string($con,(strip_tags($_POST["precio"],ENT_QUOTES)));
$cantidad=mysqli_real_escape_string($con,(strip_tags($_POST["cantidad"],ENT_QUOTES)));
 $estatus=intval($_POST['estatus']);


$sql="UPDATE ARTICULOS SET ID_CAT='".$cate."', NOMBRE='".$nombre."', PRECIO='".$precio."', CANTIDAD='".$cantidad."', ESTATUS='".$estatus."'	WHERE ID_ARTICULO='".$id."'";
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
            <h1>Modificar artículos</h1>
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

$sql = 'SELECT t1.ID_ARTICULO,t1.ID_CAT, t1.NOMBRE,t1.DESCRIPCION, t2.NOMBRE_CAT,t1.CANTIDAD, t1.PRECIO, t1.IMG_RUTA, t1.ESTATUS
				
FROM ARTICULOS as t1, CATEGORIAS as t2 WHERE t1.ID_CAT = t2.ID_CAT AND t1.ID_ARTICULO="'.$codigo.'"';


$query = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($query)){

$nombre= $row['NOMBRE'];
$descri =  $row['DESCRIPCION'];
$precio =  $row['PRECIO'];
$cantidad =  $row['CANTIDAD'];
$estatus =  $row['ESTATUS'];

}




?>


<section class = "content">
  


<form action="" method="post"> 
   

<div class="form-group">
      <label for="nombre0" class="control-label">Categoría:</label>
                              <?php 
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




       <div id="datos_ajax"></div>   

          <div class="form-group">
            <label for="codigo" class="control-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del item" value="<?php echo $nombre;?>" required maxlength="2">
		       	<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $codigo;?>">
          </div>

        
          <div class="form-group">
         <label for="nombre1" class="control-label">Descripción:</label>
           <input type="text" class="form-control" id="descri" name="descri" placeholder="Escriba la descripción:" value="<?php echo $descri;?>"   required autocomplete="off"   >
        </div>

                                           
        <div class="form-group">
         <label for="nombre0" class="control-label">Cantidad:</label>
           <input type="number" step="1" class="form-control" id="cantidad" name="cantidad"  value="<?php echo $cantidad;?>" placeholder="Escriba la cantidad:" required autocomplete="off"   >
        </div>


        
        <div class="form-group">
         <label for="nombre1" class="control-label">Precio:</label>
           <input type="number" step="0.01"  class="form-control" id="precio" name="precio"  value="<?php echo $precio;?>" placeholder="Escriba el precio:" required autocomplete="off"   >
        </div>


        <div class="form-group">
          <label for="lalo"  class="control-label">Estatus</label>
				                            <select class="form-control" id="estatus" name="estatus"  required>
                                            <?php 
                                            if ($estatus==1){
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




