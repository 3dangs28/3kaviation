<?php
	# conectare la base de datos

	require_once("../conn/conexion.php");

	/*Inicia validacion del lado del servidor*/
	 if (empty($_POST['id'])){
			$errors[] = "id vacío"; 
		} 
		else if (empty($_POST['nombre'])){
			$errors[] = "Nombre vacío";
		} 
		else if (empty($_POST['apellido'])){
			$errors[] = "Apellido vacío";
		} 
		else if (empty($_POST['funcion'])){
			$errors[] = "Función vacío";
		} 
		else if (empty($_POST['licencia'])){
			$errors[] = "Licencia vacío";
		} 
		else if (empty($_POST['nacionalidad'])){
			$errors[] = "Nacionalidad vacío";
		}
		else if (empty($_POST['fechaNac'])){
			$errors[] = "Fecha de nacimiento vacío";
		} 
		else if (empty($_POST['pasaporte'])){
			$errors[] = "Pasaporte vacío";
		} 

		else if (empty($_POST['fechaPasa'])){
			$errors[] = "Fecha de expiracion de pasaporte vacío";
		} 
	 
		else if (
			!empty($_POST['id']) && 
			!empty($_POST['nombre']) &&
			!empty($_POST['apellido']) &&
			!empty($_POST['funcion']) && 
			!empty($_POST['licencia']) && 
			!empty($_POST['nacionalidad']) && 
			!empty($_POST['fechaNac']) &&
			!empty($_POST['pasaporte']) &&
			!empty($_POST['fechaPasa']) 
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$id=intval($_POST['id']);
		$nom=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$apel=mysqli_real_escape_string($con,(strip_tags($_POST["apellido"],ENT_QUOTES)));
		$fun=mysqli_real_escape_string($con,(strip_tags($_POST["funcion"],ENT_QUOTES)));
		$lic=mysqli_real_escape_string($con,(strip_tags($_POST["licencia"],ENT_QUOTES)));
		$nac=mysqli_real_escape_string($con,(strip_tags($_POST["nacionalidad"],ENT_QUOTES)));
		
	
		$fn=mysqli_real_escape_string($con,(strip_tags($_POST["fechaNac"],ENT_QUOTES)));
		$fn  =date("H:i:s", strtotime($fn));
		$pasaporte=mysqli_real_escape_string($con,(strip_tags($_POST["pasaporte"],ENT_QUOTES)));
		$fp=mysqli_real_escape_string($con,(strip_tags($_POST["fechaPasa"],ENT_QUOTES)));
		$fp  =date("H:i:s", strtotime($fp));

 
		$sql="INSERT INTO AVI_TRIPULACION  (ID_PLAN, NOMBRE, APELLIDO, FUNCION, 
		LICENCIA, NACIONALIDAD, FECHA_NAC, PASAPORTE,  EXP_PASAPORTE)
		 VALUES ('".$id."','".$nom."','".$apel."','".$fun."','".$lic."','".$nac."','".$fn."','".$pasaporte."','".$fp."')";
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