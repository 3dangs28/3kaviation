<?php
	# conectare la base de datos

	require_once("../conn/conexion.php");

	/*Inicia validacion del lado del servidor*/
	 if (empty($_POST['cedula'])){
			$errors[] = "Cédula vacío";
		} 
		else if (empty($_POST['nombre1'])){
			$errors[] = "Primer Nombre vacío";
		} 
		else if (empty($_POST['nombre2'])){
			$errors[] = "Segundo Nombre vacío";
		} 
		else if (empty($_POST['apellido1'])){
			$errors[] = "Primer Apellido vacío";
		} 
		else if (empty($_POST['apellido2'])){
			$errors[] = "Segundo Apellido vacío";
		} 
		else if (empty($_POST['gen'])){
			$errors[] = "Género vacío";
		}
		else if (empty($_POST['correo'])){
			$errors[] = "Correo vacío";
		} 
		else if (empty($_POST['tel'])){
			$errors[] = "Teléfono vacío";
		} 
		else if (empty($_POST['dir'])){
			$errors[] = "Dirección vacío";
		} 

		else if (
			!empty($_POST['cedula']) && 
			!empty($_POST['nombre1']) &&
			!empty($_POST['nombre2']) &&
			!empty($_POST['apellido1']) && 
			!empty($_POST['apellido2']) && 
			!empty($_POST['gen']) && 
			!empty($_POST['correo']) &&  
			!empty($_POST['tel']) &&  
			!empty($_POST['dir'])
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$usr=1;
		$cedula=mysqli_real_escape_string($con,(strip_tags($_POST["cedula"],ENT_QUOTES)));
		$n1=mysqli_real_escape_string($con,(strip_tags($_POST["nombre1"],ENT_QUOTES)));
		$n2=mysqli_real_escape_string($con,(strip_tags($_POST["nombre2"],ENT_QUOTES)));
		$a1=mysqli_real_escape_string($con,(strip_tags($_POST["apellido1"],ENT_QUOTES)));
		$a2=mysqli_real_escape_string($con,(strip_tags($_POST["apellido2"],ENT_QUOTES)));
		$gen=mysqli_real_escape_string($con,(strip_tags($_POST["gen"],ENT_QUOTES)));
		$correo=mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));
		$tel=mysqli_real_escape_string($con,(strip_tags($_POST["tel"],ENT_QUOTES)));
		$dir=mysqli_real_escape_string($con,(strip_tags($_POST["dir"],ENT_QUOTES)));
		$estatus = 1;

		$sql="INSERT INTO MIEMBROS  (ID_USR, CEDULA, PR_NOMBRE, SG_NOMBRE,PR_APELLIDO,SG_APELLIDO,GENERO, CORREO,TELEFONO,DIRECCION, ESTATUS, FECHA_REG)
		 VALUES ('".$usr."','".$cedula."','".$n1."','".$n2."','".$a1."','".$a2."','".$gen."','".$correo."','".$tel."','".$dir."','".$estatus."',SYSDATE())";
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