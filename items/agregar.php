<?php
	# conectare la base de datos

	require_once("../conn/conexion.php");

	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['nombre'])){
		$errors[] = "Nombre vacío";
	} 
	else if (empty($_POST['cate'])){
		$errors[] = "Descripción vacío";
		 } 
	 else if (empty($_POST['descri'])){
		$errors[] = "Descripción vacío";
		 } 
		 else if (empty($_POST['precio'])){
			$errors[] = "Precio vacío";
			 } 
			 else if (empty($_POST['cantidad'])){
	          $errors[] = "Cantidad vacío";
				 } 

		else if (
			!empty($_POST['nombre']) && 
			!empty($_POST['cate']) && 
			!empty($_POST['descri']) && 
			!empty($_POST['precio']) &&
         	!empty($_POST['cantidad'])
			
		){
 
		// escaping, additionally removing everything that could be (html/javascript-) code
		$usr=1;
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$cate=mysqli_real_escape_string($con,(strip_tags($_POST["cate"],ENT_QUOTES)));
		$descri=mysqli_real_escape_string($con,(strip_tags($_POST["descri"],ENT_QUOTES)));
		$precio=mysqli_real_escape_string($con,(strip_tags($_POST["precio"],ENT_QUOTES)));
		$cantidad=mysqli_real_escape_string($con,(strip_tags($_POST["cantidad"],ENT_QUOTES)));
        $estatus=1;

		$sql="INSERT INTO ARTICULOS (ID_USR,ID_CAT,NOMBRE,DESCRIPCION,PRECIO,CANTIDAD,ESTATUS,FECHA_REG) 
		VALUES ('".$usr."','".$cate."','".$nombre."','".$descri."','".$precio."','".$cantidad."','".$estatus."',SYSDATE())";

	
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Los datos han sido guardados satisfactoriamente.";
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