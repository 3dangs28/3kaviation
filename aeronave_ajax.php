<?php
  
require_once("conn/conexion.php");
		
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
	include 'pagination.php'; //incluir el archivo de paginación
	
		//Cuenta el número total de filas de la tabla*/ 
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM AVI_AERONAVES");

		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

		$reload = 'index.php';
        //consulta principal para recuperar los datos
        $sql = 'SELECT NOMBRE, TIPO, CONSUMO FROM AVI_AERONAVES';
				
				
		$query = mysqli_query($con,$sql);

		if ($numrows>0){
			?>
		<table ID="example1" class="table table-bordered">
			  <thead>
		        <th>Nombre</th>
			<th>Tipo</th>
            <th>Consumo</th>

		      
						<th>Modificar</th>
						<th>Acciones</th>
				</tr>
			</thead>
			<tbody>

			<?php
			while($row = mysqli_fetch_array($query)){
				?>
				<tr> 
	      	<td><?php echo $row['NOMBRE'];?></td>
			<td><?php echo $row['TIPO'];?></td>
			<td><?php echo $row['CONSUMO'];?></td>
		
			
					 <td>
					 
						<input  type="hidden" name="id" id="id" value="<?php echo $row['ID_AERONAVE']?>" readonly >
						<button type="submit" class="btn btn-info"><i class='nav-icon fa fa-pencil'></i></button>
				
				
					</td>
					<td>

					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataUpload" data-id="<?php echo $row['ID_AERONAVE']?>"  ><i  class='nav-icon fa fa-image'  ></i></button>
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['ID_AERONAVE']?>"  ><i class='nav-icon fa fa-trash' ></i></button>
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