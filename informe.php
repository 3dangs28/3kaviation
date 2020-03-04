<?php include("inc/librerias.php"); ?>

  <body>
	<?php include("inc/header.php"); ?>
	<?php include("inc/menu.php"); ?>
  <?php include("modalInforme/modal_agregar.php");?>
  <?php include("modalInforme/modal_modificar.php");?>
  <?php include("modalInforme/modal_eliminar.php");
  
  $aux =  $_POST['id'];

  ?>

	  
	<div id="loader" class="text-center"> <img src="giphy.gif"></div>
  <div class="content-wrapper">
 
 
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Informe</h1>
          </div>
          <div class="col-sm-6">
					<h3 class='text-right'>		
          <img src="img/iconos/undo.png" width="20" /><a href="planVuelo.php" target="_self">Regresar </a>

			</h3>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section> 


	    <!-- Main content -->
			<section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Plan de vuelo</h3>
            </div>
            <!-- /.card-header -->
            <div id="loader" class="card-body">
							
            <?php echo $aux; ?>

						<div class="datos_ajax_delete">
            
            </div><!-- Datos ajax Final -->
	        	<div class="outer_div">
  
            </div><!-- Datos ajax Final -->

            </div>
            <!-- /.card-body -->

          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php include("inc/scripts.php"); ?>


	<script src="js/informe.js"></script>
	<script>
		$(document).ready(function(){
			load(1);
		});
  </script>

 </body>
</html>