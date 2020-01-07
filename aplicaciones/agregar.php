<?php
	# conectare la base de datos

	require_once("../conn/conexion.php");

	/*Inicia validacion del lado del servidor*/
	 if (empty($_POST['aplicacion'])){
			$errors[] = "Aplicación vacío";
		} 
	
		
		else if (
			!empty($_POST['aplicacion'])  

		){

		// escaping, additionally removing everything that could be (html/javascript-) code

		$aplicacion=mysqli_real_escape_string($con,(strip_tags($_POST["aplicacion"],ENT_QUOTES)));
	
		$sql="INSERT INTO APLICACIONES ( APLICACION, FECHA_CREACION) VALUES ('".$aplicacion."',sysdate())";
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