<?php


require_once("../conn/conexion.php");

	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['id'])) {
           $errors[] = "ID vacío";
		}
	
		else if (empty($_POST['cate'])){
			$errors[] = "Categoría vacío";
		} 
		else if (empty($_POST['estatus'])){
			$errors[] = "Estatus vacío";
		} 
	
		else if (
			!empty($_POST['id']) && 
			!empty($_POST['cate']) && 
			!empty($_POST['estatus'])
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$usr=1;
		$cat=mysqli_real_escape_string($con,(strip_tags($_POST["cate"],ENT_QUOTES)));
		$estatus=mysqli_real_escape_string($con,(strip_tags($_POST["estatus"],ENT_QUOTES)));
		$id=intval($_POST['id']);
		$sql="UPDATE CATEGORIAS SET  ID_USR='".$usr."', NOMBRE_CAT='".$cat."', ESTATUS='".$estatus."' WHERE ID_CAT='".$id."'";
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