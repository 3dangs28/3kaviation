<?php


require_once("../conn/conexion.php");

	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['id'])) {
           $errors[] = "ID vacío";
        } else if (empty($_POST['rol'])){
			$errors[] = "Rol vacío";

		} else if (
			!empty($_POST['id']) &&
			!empty($_POST['rol']) 
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$rol=mysqli_real_escape_string($con,(strip_tags($_POST["rol"],ENT_QUOTES)));
		$id=intval($_POST['id']);
		$sql="UPDATE ROLES SET  ROL='".$rol."'	WHERE ID_ROL='".$id."'";
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