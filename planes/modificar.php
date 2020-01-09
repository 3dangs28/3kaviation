<?php


require_once("../conn/conexion.php");

	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['id'])) {
           $errors[] = "ID vacío";
		}
		else if (empty($_POST['usr'])){
			$errors[] = "Usuario vacío";
		} 
		else if (empty($_POST['cedula'])){
			$errors[] = "Cédula vacía";
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
		else if (empty($_POST['estatus'])){
			$errors[] = "Estatus vacío";
		} 

		else if (
			!empty($_POST['id']) && 
			!empty($_POST['usr']) && 
			!empty($_POST['cedula']) && 
			!empty($_POST['nombre1']) &&
			!empty($_POST['nombre2']) &&
			!empty($_POST['apellido1']) && 
			!empty($_POST['apellido2']) && 
			!empty($_POST['gen']) && 
			!empty($_POST['correo']) &&  
			!empty($_POST['tel']) &&  
			!empty($_POST['dir'])&& 
			!empty($_POST['estatus'])
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$id=intval($_POST['id']);
		$usr=mysqli_real_escape_string($con,(strip_tags($_POST["usr"],ENT_QUOTES)));
		$cedula=mysqli_real_escape_string($con,(strip_tags($_POST["cedula"],ENT_QUOTES)));
		$n1=mysqli_real_escape_string($con,(strip_tags($_POST["nombre1"],ENT_QUOTES)));
		$n2=mysqli_real_escape_string($con,(strip_tags($_POST["nombre2"],ENT_QUOTES)));
		$a1=mysqli_real_escape_string($con,(strip_tags($_POST["apellido1"],ENT_QUOTES)));
		$a2=mysqli_real_escape_string($con,(strip_tags($_POST["apellido2"],ENT_QUOTES)));
		$gen=mysqli_real_escape_string($con,(strip_tags($_POST["gen"],ENT_QUOTES)));
		$correo=mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));
		$tel=mysqli_real_escape_string($con,(strip_tags($_POST["tel"],ENT_QUOTES)));
		$dir=mysqli_real_escape_string($con,(strip_tags($_POST["dir"],ENT_QUOTES)));
		$estatus = mysqli_real_escape_string($con,(strip_tags($_POST["estatus"],ENT_QUOTES)));
	
		$sql="UPDATE MIEMBROS SET  ID_USR='".$usr."', CEDULA='".$cedula."', PR_NOMBRE='".$n1."',
		SG_NOMBRE='".$n2."',PR_APELLIDO='".$a1."',SG_APELLIDO='".$a2."',GENERO='".$gen."',
		CORREO='".$correo."',TELEFONO='".$tel."',DIRECCION='".$dir."',ESTATUS='".$estatus."'
			WHERE ID_MIEMBRO='".$id."'";
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