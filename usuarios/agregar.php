<?php
	# conectare la base de datos

	require_once("../conn/conexion.php");

	/*Inicia validacion del lado del servidor*/
	 if (empty($_POST['rol'])){
			$errors[] = "Rol vacío";
		} 
		else if (empty($_POST['aplicacion'])){
			$errors[] = "Aplicación vacío";
		} 
		else if (empty($_POST['nombre'])){
			$errors[] = "Nombre vacío";
		} 
		else if (empty($_POST['apellido'])){
			$errors[] = "Apellido vacío";
		} 
		else if (empty($_POST['correo'])){
			$errors[] = "Correo vacío";
		} 
	 
		else if (empty($_POST['nick'])){
			$errors[] = "Nick vacío";
		} 
		else if (empty($_POST['pass'])){
			$errors[] = "Contraseña vacío";
		} 
		else if (
			!empty($_POST['rol']) && 
			!empty($_POST['aplicacion']) && 
			!empty($_POST['nombre']) &&
			!empty($_POST['apellido']) && 
			!empty($_POST['correo']) && 
			!empty($_POST['nick']) &&  
			!empty($_POST['pass'])
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		
		$rol=mysqli_real_escape_string($con,(strip_tags($_POST["rol"],ENT_QUOTES)));
		$aplicacion=$_POST["aplicacion"];
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$apel=mysqli_real_escape_string($con,(strip_tags($_POST["apellido"],ENT_QUOTES)));
		$correo=mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));
		$nick=mysqli_real_escape_string($con,(strip_tags($_POST["nick"],ENT_QUOTES)));
		$pass=mysqli_real_escape_string($con,(strip_tags($_POST["pass"],ENT_QUOTES)));
		$estatus = 1;

		$sql="INSERT INTO USUARIOS  (ID_ROL ,ID_APLICACION, NOMBRE, APELLIDO, CORREO, NICK, PASS )
		 VALUES ('".$rol."','".$aplicacion."','".$nombre."','".$apel."','".$correo."','".$nick."','".$pass."'
		 )";
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

			mysqli_close($con);
?>