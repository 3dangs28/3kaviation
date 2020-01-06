<?php
	# conectare la base de datos

	require_once("../conn/conexion.php");

	/*Inicia validacion del lado del servidor*/
	 if (empty($_POST['cate'])){
			$errors[] = "Nombre vacío";
		} 
		
		else if (
			!empty($_POST['cate'])		
		){

		// escaping, additionally removing everything that could be (html/javascript-) code

	
        $usr = 1;
		$cat=mysqli_real_escape_string($con,(strip_tags($_POST["cate"],ENT_QUOTES)));
		$estatus = 1;

		$sql="INSERT INTO CATEGORIAS (ID_USR,NOMBRE_CAT, ESTATUS, FECHA_REG )
		 VALUES ('".$usr."','".$cat."','".$estatus."',SYSDATE()
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