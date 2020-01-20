<?php
	# conectare la base de datos

	require_once("../conn/conexion.php");

	/*Inicia validacion del lado del servidor*/
	 if (empty($_POST['avion'])){
			$errors[] = "Avión vacío"; 
		} 
		else if (empty($_POST['propietario'])){
			$errors[] = "Propietario vacío";
		} 
		else if (empty($_POST['salidaLugar'])){
			$errors[] = "Lugar de salida vacío";
		} 
		else if (empty($_POST['llegadaLugar'])){
			$errors[] = "Lugar de llegada vacío";
		} 
		else if (empty($_POST['salidaHora'])){
			$errors[] = "Hora de salida vacío";
		} 
		else if (empty($_POST['llegadaHora'])){
			$errors[] = "Hora de llegada vacío";
		}
		else if (empty($_POST['fechaViaje'])){
			$errors[] = "Fecha de viaje vacío";
		} 
		else if (empty($_POST['declaracion'])){
			$errors[] = "Declaración vacío";
		} 
	 
		else if (
			!empty($_POST['avion']) && 
			!empty($_POST['propietario']) &&
			!empty($_POST['salidaLugar']) &&
			!empty($_POST['llegadaLugar']) && 
			!empty($_POST['salidaHora']) && 
			!empty($_POST['llegadaHora']) && 
			!empty($_POST['fechaViaje']) &&
			!empty($_POST['declaracion'])
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$firma=1;
		$avion=mysqli_real_escape_string($con,(strip_tags($_POST["avion"],ENT_QUOTES)));
		$propietario=mysqli_real_escape_string($con,(strip_tags($_POST["propietario"],ENT_QUOTES)));
		$sl=mysqli_real_escape_string($con,(strip_tags($_POST["salidaLugar"],ENT_QUOTES)));
		$ll=mysqli_real_escape_string($con,(strip_tags($_POST["llegadaLugar"],ENT_QUOTES)));
		$sh=mysqli_real_escape_string($con,(strip_tags($_POST["salidaHora"],ENT_QUOTES)));
		
		$sh  =date("H:i:s", strtotime($sh));
	
		$lh=mysqli_real_escape_string($con,(strip_tags($_POST["llegadaHora"],ENT_QUOTES)));
		$lh  =date("H:i:s", strtotime($lh));
		$fViaje=mysqli_real_escape_string($con,(strip_tags($_POST["fechaViaje"],ENT_QUOTES)));
		$declaracion=mysqli_real_escape_string($con,(strip_tags($_POST["declaracion"],ENT_QUOTES)));
        $estatus='1';
 


		$sql="INSERT INTO AVI_PLAN_VUELO  (ID_AERONAVE, PROPIETARIO, AERO_SALIDA, AERO_LLEGADA, 
		HORA_SALIDA, HORA_LLEGADA, FECHA_VIAJE,DECLA_SANITARIA, ESTATUS, ID_FIRMA)
		 VALUES ('".$avion."','".$propietario."','".$sl."','".$ll."','".$sh."','".$lh."','".$fViaje."','".$declaracion."','".$estatus."','".$firma."')";
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