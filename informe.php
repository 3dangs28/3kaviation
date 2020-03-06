<?php include("inc/librerias.php"); ?>


<body>
    <?php include("inc/header.php"); ?>
    <?php include("inc/menu.php"); ?>
    <?php include("modalInforme/modal_agregar.php");?>
    <?php include("modalInforme/modal_modificar.php");?>
    <?php include("modalInforme/modal_eliminar.php");
            require_once("conn/conexion.php");
       
              session_start();
      
  $aux =  $_POST['id'];
  $_SESSION['auxiliar'] = $aux;
  
  $sql ='SELECT a.ID_PLAN, a.ID_AERONAVE, b.NOMBRE, a.AERO_SALIDA, a.AERO_LLEGADA, a.PROPIETARIO, 
  a.FECHA_VIAJE, a.HORA_SALIDA, a.HORA_LLEGADA, a.DECLA_SANITARIA,  a.ESTATUS  
  FROM AVI_PLAN_VUELO as a, AVI_AERONAVES as b
  where b.ID_AERONAVE= a.ID_AERONAVE and a.ID_PLAN='.$aux;


  $query = mysqli_query($con,$sql);
 

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
                            <img src="img/iconos/undo.png" width="20" /><a href="planVuelo.php" target="_self">Regresar
                            </a>

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


                            <?php $row = mysqli_fetch_array($query); ?>
         
         
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h3 class="card-title">Plan de vuelo<?php echo " ".$row['ID_PLAN']." -".date("Y");?>
                                    </h3>
                                </div>

                                <div class="col-sm-6">
                                    <h3 class="card-title text-right" style="color: red;">Fecha de
                                        viaje:<?php echo " ".$row['FECHA_VIAJE'];?></h3>
                                </div>
                            </div>

                      

                        </div>
                        <!-- /.card-header -->
                        <div id="loader" class="card-body">


                            <div class="form-group col-md-6">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <?php echo "<h5>Modelo:</h5> ".$row['NOMBRE'];?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo "<h5>Propietario:</h5> ".$row['PROPIETARIO'];?>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <?php echo "<h5>Aeropuerto salida:</h5> ".$row['AERO_SALIDA'];?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo "<h5>Aeropuerto llegada:</h5> ".$row['AERO_LLEGADA'];?>
                                    </div>
                                </div>



                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <?php echo "<h5>Hora de salida:</h5> ".$row['AERO_SALIDA'];?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo "<h5>Hora de llegada:</h5> ".$row['AERO_LLEGADA'];?>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <?php echo "<h5>Delaración Sanitaria:</h5> ".$row['DECLA_SANITARIA'];?>
                                </div>
                          


                            </div>




                            <?php mysqli_close($con);?>



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
    <script>
  $(function () {
    $("#example1").DataTable();
  });
</script>

    <script src="js/informe.js"></script>
    <script>
    $(document).ready(function() {
        load(1);
    });
    </script>

</body>

</html>