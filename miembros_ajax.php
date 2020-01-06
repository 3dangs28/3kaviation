<?php
 
require_once("conn/conexion.php");
		
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
	include 'pagination.php'; //incluir el archivo de paginación
	
		//Cuenta el número total de filas de la tabla*/
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM MIEMBROS");
		

		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

		$reload = 'index.php';
		//consulta principal para recuperar los datos
        $sql ='SELECT * FROM MIEMBROS';
		$query = mysqli_query($con,$sql);


		if ($numrows>0){
			?>
		<table ID="example1" class="table table-bordered">
			  <thead>
				<tr>

        <th>Nombre</th>
        <th>Cédula</th>
        <th>Correo</th>
        <th>Télefono</th>
        <th>Estatus</th>
        <th>Ingreso</th>
		<th>Acciones</th>
				</tr>
			</thead>
			<tbody>

			<?php
			while($row = mysqli_fetch_array($query)){
				?>
				<tr>

					<td><?php echo $row['PR_NOMBRE'];?></td>
                    <td><?php echo $row['CEDULA'];?></td>
                    <td><?php echo $row['CORREO'];?></td>
                    <td><?php echo $row['TELEFONO'];?></td>
               
           
										<td>
										<?php  
										if ($row['ESTATUS']==1){
											echo 'ACTIVO';
										}
										else{
											echo 'INACTIVO';
										}
										;?>
										</td>
                    <td><?php echo $row['FECHA_REG'];?></td>
					<td>
                        <button type="button" class="btn btn-info" data-toggle="modal" 
												data-target="#dataUpdate" 
						data-id="<?php echo $row['ID_MIEMBRO']?>" 
                        data-usr="<?php echo $row['ID_USR']?>" 
                        data-cedula="<?php echo $row['CEDULA']?>"
                        data-nombre1="<?php echo $row['PR_NOMBRE']?>"
                        data-nombre2="<?php echo $row['SG_NOMBRE']?>" 
                        data-apellido1="<?php echo $row['PR_APELLIDO']?>"
                        data-apellido2="<?php echo $row['PR_APELLIDO']?>"
												data-gen="<?php echo $row['GENERO']?>"
                        data-correo="<?php echo $row['CORREO']?>"
					            	data-tel="<?php echo $row['TELEFONO']?>" 
                        data-dir="<?php echo $row['DIRECCION']?>" 
					            	data-estatus="<?php echo $row['ESTATUS']?>"
                         
                         ><i class='nav-icon fa fa-pencil'></i></button>
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['ID_MIEMBRO']?>"  ><i class='nav-icon fa fa-trash' ></i></button>
					</td>
				</tr>
				<?php
            }
					
			?>
			</tbody>
		</table>
	

			<?php
			
		} else {
			?>
			<div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Aviso!!!</h4> No hay datos para mostrar
            </div>
			<?php
		}

	}
	mysqli_close($con);
?>
  <script>
  $(function () {
    $("#example1").DataTable();
  });
</script>