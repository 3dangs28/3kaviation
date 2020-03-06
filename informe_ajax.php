<?php
  
require_once("conn/conexion.php");
if (!isset($_SESSION)) {
	session_start();
  }
  
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
	include 'pagination.php'; //incluir el archivo de paginación
	
		//Cuenta el número total de filas de la tabla*/
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM AVI_TRIPULACION");
		
 
		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

		$reload = 'index.php';
        //consulta principal para recuperar los datos
        
        $sql ='SELECT * FROM AVI_TRIPULACION where a.ID_PLAN='.$_SESSION['auxiliar'];
  
		$query = mysqli_query($con,$sql);


		if ($numrows>0){
			?>
		<table ID="example1" class="table table-bordered">
			  <thead>
				<tr>


                
		<th>Nombre</th>
        <th>Apellido</th>
        <th>Función</th>
		<th>Licencia</th>
        <th>Nacionalidad</th>
        <th>F. Nac</th>
      
        <th>Pasaporte</th>
        <th>Exp. Pasaporte</th>
	  
				</tr>
			</thead>
			<tbody>

			<?php
			while($row = mysqli_fetch_array($query)){
				?>
				<tr>


					<td><?php echo $row['NOMBRE'];?></td>
					<td><?php echo $row['APELLIDO'];?></td>
                    <td><?php echo $row['FUNCION'];?></td>
                    <td><?php echo $row['LICENCIA'];?></td>
                    <td><?php echo $row['NACIONALIDAD'];?></td>
                    <td><?php echo $row['FECHA_NAC'];?></td>
                    <td><?php echo $row['PASAPORTE'];?></td>
                    <td><?php echo $row['EXP_PASAPORTE'];?></td>
           

				
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