
<?php


require_once("../conn/conexion.php");


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