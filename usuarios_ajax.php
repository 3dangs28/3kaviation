<?php
 
require_once("conn/conexion.php");
		
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
	include 'pagination.php'; //incluir el archivo de paginación
	
		//Cuenta el número total de filas de la tabla*/
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM USUARIOS");
		
		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

		$reload = 'index.php';
		//consulta principal para recuperar los datos
   $sql ='SELECT t1.ID_USUARIO, t1.ID_APLICACION, t1.ID_ROL, t1.CORREO, t1.NOMBRE, t1.APELLIDO, 
     t1.NICK, t1.PASS, t2.ROL
   FROM
    USUARIOS as t1, ROLES as t2
        where 
    t1.ID_ROL = t2.ID_ROL order by ID_USUARIO';
		$query = mysqli_query($con,$sql);


		if ($numrows>0){
			?>
		<table ID="example1" class="table table-bordered">
			  <thead>
				<tr>

        <th>Nombre</th>
        <th>Apellido</th>
        <th>Rol</th>
        <th>Correo</th>
		<th>Acciones</th>
				</tr>
			</thead>
			<tbody>

			<?php
			while($row = mysqli_fetch_array($query)){
				?>
				<tr>

					<td><?php echo $row['NOMBRE'];?></td>
                    <td><?php echo $row['APELLIDO'];?></td>
                    <td><?php echo $row['ROL'];?></td>
                    <td><?php echo $row['CORREO'];?></td>
		
					<td>
					<button type="button" class="btn btn-info" data-toggle="modal"
					 data-target="#dataUpdate" 
					 data-id="<?php echo $row['ID_USUARIO']?>" 
					 data-rol="<?php echo $row['ROL']?>"   
					 data-aplicacion="<?php echo $row['ID_APLICACION']?>"
					 data-nombre="<?php echo $row['NOMBRE']?>"
					 data-apellido="<?php echo $row['APELLIDO']?>"
					 data-correo="<?php echo $row['CORREO']?>"
					 data-nick="<?php echo $row['NICK']?>"
					 data-pass="<?php echo $row['PASS']?>"
					 
					 ><i class='nav-icon fa fa-pencil'></i> </button>
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['ID_USUARIO']?>"  ><i class='nav-icon fa fa-trash' ></i></button>
					</td>
				</tr>
				<?php
            }
						mysqli_close($con);
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
?>
  <script>
  $(function () {
    $("#example1").DataTable();
  });
</script>