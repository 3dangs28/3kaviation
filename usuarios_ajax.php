<?php
 
require_once("conn/conexion.php");
		
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
	include 'pagination.php'; //incluir el archivo de paginación
	
		//Cuenta el número total de filas de la tabla*/
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM USUARIOS");
		
  /*  
   for ($i=0;$i<$count_query;$i++){
		$numeros[$i]=;
	 } 
*/
		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

		$reload = 'index.php';
		//consulta principal para recuperar los datos
   $sql ='SELECT t1.ID_USR,t1.ID_PERFIL, t1.NOMBRE, t1.APELLIDO, 
     t1.USUARIO, t1.ESTATUS,t1.FECHA_REG, t2.PERFIL
   FROM
    USUARIOS as t1
        INNER JOIN
    PERFILES as t2 ON t1.ID_PERFIL = t2.ID_PERFIL order by ID_USR';
		$query = mysqli_query($con,$sql);


		if ($numrows>0){
			?>
		<table ID="example1" class="table table-bordered">
			  <thead>
				<tr>

        <th>Nombre</th>
        <th>Apellido</th>
        <th>Perfil</th>
        <th>Ingreso</th>
        <th>Estatus</th>
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
                    <td><?php echo $row['PERFIL'];?></td>
                    <td><?php echo $row['FECHA_REG'];?></td>
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

					<form action="mod_usuario.php" method="get" >
						<input  type="hidden" name="id" id="id" value="<?php echo $row['ID_PERFIL']?>" readonly >
						<button type="submit" class="btn btn-info"><i class='nav-icon fa fa-pencil'></i></button>
					</form>

						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['ID_USR']?>"  ><i class='nav-icon fa fa-trash' ></i></button>
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