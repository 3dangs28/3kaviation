<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Principal</title>


    <link href="http://fonts.googleapis.com/css?family=Roboto:400,300,700,500" rel="stylesheet" type="text/css">
<link href="css/font-awesome.min.css" rel="stylesheet">

<!-- todas las third party css archivos -->

<link href="css/libs/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/libs/bootstrap-theme.min.css" rel="stylesheet" type="text/css">

<!-- Custom CSS file -->
<link href="css/styleVersion3.css" rel="stylesheet" type="text/css">
<!-- Main CSS file -->
<link href="css/color.css" rel="stylesheet" type="text/css">
<!-- color css file -->
<link href="css/responsive.css" rel="stylesheet" type="text/css">

<script src="js/libs/jquery-1.10.1.min.js" rel="stylesheet" type="text/javascript"></script>
<script src="js/libs/bootstrap.min.js" rel="stylesheet" type="text/javascript"></script>


<link rel="stylesheet" href="css/footer.css">



    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>


    <script>
    $('.multi-image-slider').carousel({
interval: false
});
$('.multi-image-slider .item').each(function(){
var next = $(this).next();
if (!next.length) {
next = $(this).siblings(':first');
}
next.children(':first-child').clone().appendTo($(this));
if (next.next().length>0) {
next.next().children(':first-child').clone().appendTo($(this));
} else {
$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
}
});</script>
</head>
<body>

<?php include('header.php'); ?>

<br>
<br>
<br>
<div class="container">
<div class="row">
        <div class="col-md-12">
                <div class="carousel slide multi-image-slider" id="theCarousel">
                <div class="carousel-inner">
                <?php
                  require_once("conn/conexion.php");
                $sqlQuery = "SELECT ID_ESPECIES, NOMBRE, DESCRIPCION,IMG_RUTA FROM ESPECIES WHERE ESTATUS=1";
                $resultSet = mysqli_query($con, $sqlQuery);
                $setActive = 0;
                $sliderHtml = '';
                while( $sliderImage = mysqli_fetch_assoc($resultSet)){
                $activeClass = "";
                if(!$setActive) {
                $setActive = 1;
                $activeClass = 'active';
                }
                $sliderHtml.= "<div class='item ".$activeClass."'>";
                $sliderHtml.= "<div class='fluid'><a href='".$sliderImage['ID_ESPECIES']."'>";
                $sliderHtml.= "<center><img src='".$sliderImage['IMG_RUTA']."' class='img-responsive' </center>>";
                $sliderHtml.= "</a><h1>".$sliderImage['NOMBRE']."</h1></div><h4>".$sliderImage['DESCRIPCION']."</h4></div>";
           
                }
                echo $sliderHtml;
                
                ?>
                </div>
                <a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                <a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
             
                </div>

                <div class="row"><!-- Top widget first region -->
<div class="col-md-4">
<div class="region region-topwidget-first">
<div class="block block-block-content block-block-contentc615d558-501f-4a27-997b-b3e12dbce7cf" id="block-topfirst">
<div>


<h2>Objetivos</h2>

<p>Promover la educación de la fauna que existe en el planeta.</p>
</div>
</div>
</div>
</div>
<!-- End top widget third region --><!-- Top widget second region -->

<div class="col-md-4">
<div class="region region-topwidget-second">
<div class="block block-block-content block-block-content86660726-3bda-4c58-a0f2-5de56098213b" id="block-topsecond">
<div>


<h2>Administración</h2>

<p>Sistema óptimo, facíl carga de contenido</p>
</div>
</div>
</div>
</div>
<!-- End top widget third region --><!-- Top widget third region -->

<div class="col-md-4">
<div class="region region-topwidget-third">
<div class="block block-block-content block-block-contente7645b29-593e-46bc-97ac-c5af8ede7745" id="block-topthird">
<div>


<h2>Actualización</h2>

<p>Base de datos de animales en aumento</p>
</div>
</div>
</div>
</div>
<!-- End top widget third region --></div>

                <center>
                <img src="img/iconos/animales.png">
              </center>
                </div>
              </div>
                <!--Footer-->
<footer class="page-footer text-center text-md-left pt-4" style="background-color:yellow;">
<!--Footer Links-->
<div class="container-fluid">
<br><br>
  <div class="row" >

    <!--First column-->
    <div class="col-md-3 offset-md-1"  >
      <h3 class="font-weight-bold text-uppercase mb-4">Mundo animal</h3>
      <p>Los vertebrados (Vertebrata) son un subfilo muy diverso de cordados que comprende a los animales con espina dorsal o columna vertebral, compuesta de vértebras. Incluye casi 62 000 especies actuales1​ y muchos fósiles.
      </p>
    </div>
    <!--/.First column-->

    <!--Second column-->
    <div class="col-md-2 offset-md-1">
      <h3 class="font-weight-bold text-uppercase mb-4">Aves Reg.</h3>
      <ul class="list-unstyled">

      <?php
        $query = mysqli_query($con,"SELECT NOMBRE FROM ESPECIES WHERE ID_TIPO=1");
        $a=1; ?>

         <?php  while($row = mysqli_fetch_array($query)){  ?>    
         <?php  echo "<li>".$a++.".)  ".$row['NOMBRE']."</li>";
            } 
          ?>

              
      </ul>
    </div>
    <!--/.Second column-->

    <!--Third column-->
    
    <div class="col-md-2">
      <h3 class="font-weight-bold text-uppercase mb-4">Peces Reg.</h3>
      <ul class="list-unstyled">

      <?php
        $query = mysqli_query($con,"SELECT NOMBRE FROM ESPECIES WHERE ID_TIPO=2");
        $a=1; ?>

         <?php  while($row = mysqli_fetch_array($query)){  ?>    
         <?php  echo "<li>".$a++.".)  ".$row['NOMBRE']."</li>";
            } 
          ?>

        

      </ul>
    </div>


    <!--/.Third column-->

    <!--Fourth column-->
    <div class="col-md-2">
      <h3 class="font-weight-bold text-uppercase mb-4">Mamíferos Reg.</h3>
      <ul class="list-unstyled">
   
      <?php
        $query = mysqli_query($con,"SELECT NOMBRE FROM ESPECIES WHERE ID_TIPO=3");
        $a=1; ?>

         <?php  while($row = mysqli_fetch_array($query)){  ?>    
         <?php  echo "<li>".$a++.".)  ".$row['NOMBRE']."</li>";
            } 
          ?>

        <?php  mysqli_close($con); ?>
      </ul>
    </div>
    <!--/.Fourth column-->
  </div>
</div>
<!--/.Footer Links-->
<hr>
<!--Call to action-->
<div class="call-to-action text-center">
  <h4 class="my-4">Mundo animal</h4>

</div>
<!--/.Call to action-->
<!--Copyright-->
<div class="footer-copyright text-center">
  <div class="container-fluid py-3">
    2019 Fiec Universidad de Panamás
  </div>
</div>
<!--/.Copyright-->
</footer>
<!--/.Footer-->



</body>
</html>