
<?php


require_once("../conn/conexion.php");


	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['id'])) {
           $errors[] = "ID vacío";
       } else if (empty($_POST['nombre'])){
		$errors[] = "Nombre vacío";
		} else if (empty($_POST['tipo'])){
			$errors[] = "Tipo vacío";
		} else if (empty($_POST['consumo'])){
			$errors[] = "Consumo vacío";

		} else if (
			!empty($_POST['id']) &&
	
			!empty($_POST['nombre']) && 
			!empty($_POST['tipo']) && 
			!empty($_POST['consumo'])
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code



		$id=intval($_POST['id']);
	
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$tipo=mysqli_real_escape_string($con,(strip_tags($_POST["tipo"],ENT_QUOTES)));
		$consumo=mysqli_real_escape_string($con,(strip_tags($_POST["consumo"],ENT_QUOTES)));

	
		$sql="UPDATE AVI_AERONAVES SET NOMBRE='".$nombre."', TIPO='".$tipo."', CONSUMO='".$consumo."' WHERE ID_AERONAVE='".$id."'";
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