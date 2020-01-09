<?php
 
require_once("conn/conexion.php");
		
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
	include 'pagination.php'; //incluir el archivo de paginación
	
		//Cuenta el número total de filas de la tabla*/
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM AVI_PLAN_VUELO");
		

		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

		$reload = 'index.php';
        //consulta principal para recuperar los datos
        

        $sql ='SELECT a.ID_PLAN, a.ID_AERONAVE, b.NOMBRE, a.AERO_SALIDA, a.AERO_LLEGADA, a.PROPIETARIO, a.FECHA_VIAJE, a.ESTATUS  
         FROM AVI_PLAN_VUELO as a, AVI_AERONAVES as b
         where b.ID_AERONAVE= a.ID_AERONAVE';
		$query = mysqli_query($con,$sql);


		if ($numrows>0){
			?>
		<table ID="example1" class="table table-bordered">
			  <thead>
				<tr>

        <th>Nombre</th>
        <th>L.SALIDA</th>
        <th>L.LLEGADA</th>
        <th>Propietario</th>
        <th>Fecha</th>
        <th>Status</th>
		<th>Acciones</th>
				</tr>
			</thead>
			<tbody>

			<?php
			while($row = mysqli_fetch_array($query)){
				?>
				<tr>

					<td><?php echo $row['NOMBRE'];?></td>
                    <td><?php echo $row['AERO_SALIDA'];?></td>
                    <td><?php echo $row['AERO_ENTRADA'];?></td>
                    <td><?php echo $row['PROPIETARIO'];?></td>
                    <td><?php echo $row['FECHA_VIAJE'];?></td>
               
           
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
               
					<td>
                        <button type="button" class="btn btn-info" data-toggle="modal" 
						data-target="#dataUpdate" 
                        data-id="<?php echo $row['ID_PLAN']?>" 
                        data-idAvion="<?php echo $row['ID_AERONAVE']?>"
                        data-nombre="<?php echo $row['NOMBRE']?>" 
                        data-salida="<?php echo $row['AERO_SALIDA']?>"
                        data-llegada="<?php echo $row['AERO_LLEGADA']?>"
                        data-fecha="<?php echo $row['FECHA_VIAJE']?>" 
					    data-estatus="<?php echo $row['ESTATUS']?>"
                         
                         ><i class='nav-icon fa fa-pencil'></i></button>
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['ID_PLAN']?>"  ><i class='nav-icon fa fa-trash' ></i></button>
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