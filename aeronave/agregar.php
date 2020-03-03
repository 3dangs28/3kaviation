<?php
	# conectare la base de datos

	require_once("../conn/conexion.php");

	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['nombre'])){
		$errors[] = "Nombre vacío";
	} 
	else if (empty($_POST['tipo'])){
		$errors[] = "Tipo vacío";
		 } 
	 else if (empty($_POST['consumo'])){
		$errors[] = "Consumo vacío, solo números";
		 } 
		
		

		else if (
			!empty($_POST['nombre']) && 
			!empty($_POST['tipo']) && 
			!empty($_POST['consumo'])
		
			
		){
 
		// escaping, additionally removing everything that could be (html/javascript-) code
		$usr=1;
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$tipo=mysqli_real_escape_string($con,(strip_tags($_POST["tipo"],ENT_QUOTES)));
		$consumo=mysqli_real_escape_string($con,(strip_tags($_POST["consumo"],ENT_QUOTES)));
		
        $estatus=1;

		$sql="INSERT INTO AVI_AERONAVES (NOMBRE,TIPO,CONSUMO) 
		VALUES ('".$nombre."','".$tipo."','".$consumo."')";

	
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