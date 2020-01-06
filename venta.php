<?php include("inc/librerias.php"); ?>

  <body>
	<?php include("inc/header.php"); ?>
	<?php include("inc/menu.php"); ?>

	
	 

  <div class="content-wrapper">


	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Artículos disponibles</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

<div class="content">

 <div class="row">

	
 <?php require_once("conn/conexion.php");
 $sql = 'SELECT t2.NOMBRE_CAT, SUM(t1.CANTIDAD) as CANTIDAD FROM ARTICULOS as t1, CATEGORIAS as t2 
 WHERE t2.ID_CAT = t1.ID_CAT AND t2.ESTATUS=1  group by t1.ID_CAT';
 $query = mysqli_query($con,$sql);
?>
                      
      <?php  while($row = mysqli_fetch_array($query)){  ?>    
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"> <?php echo $row['NOMBRE_CAT'] ?> </span>
              <span class="info-box-number"><?php echo $row['CANTIDAD'].' ' ?><small>Unidades</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <?php 
          }
           mysqli_close($con);
         ?>


        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

       


<!-- /.row -->
      </div>


<!-- /.content -->
      </div>




  <?php include("inc/scripts.php"); ?>




 </body>
</html>