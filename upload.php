<?php

// file name
$filename = $_FILES['file']['name'];
$id = $_POST['id'];
//código único para imagenes
$dia= date("d");
$mes=date("m");
$ano =date("y");
$t = date("H:i:s");
$t = explode(":", $t); 

$codigo ='IMG_'.$dia.$mes.$ano.$t[0].$t[1].$t[2];

//Revienta el nombre del archivo donde encuentre un punto
$aux =explode('.', $_FILES["file"]["name"]);
//consigue lo almacenado en la parte final del vector
$file_extension = end($aux);


// Ubicación del archivo
$ruta = 'img/productos/';

$foto = $ruta.$codigo.'.'.$file_extension;
$articulo=$codigo.'.'.$file_extension;
//mensajes para el usuario
echo '<br>';
echo "<center>";

// file extension
$file_extension = pathinfo($foto, PATHINFO_EXTENSION);
$file_extension = strtolower($file_extension);

// Valid image extensions
$image_ext = array("jpg");

$response = 0;
if(in_array($file_extension,$image_ext)){
  // Upload file
  if(move_uploaded_file($_FILES['file']['tmp_name'],$foto)){
    $response = $articulo;
  }
}


require_once("conn/conexion.php");
$sql = "UPDATE ARTICULOS SET IMG_RUTA='$response' WHERE ID_ARTICULO= '$id';";

  //Ejecutar consultas
$query_update = mysqli_query($con,$sql);

  if (!$query_update) {
      echo '<h3>Error al subir imagen</h3>';
      echo '<h3>Por favor vuelva a intentarlo!</h3>';
      echo '<br><h3><a href="index.php">Regresar</a></h3>';
  }
  else {

echo '<br>';
echo '<br>';
echo '<img src="img/iconos/check.png" alt="" width="50px" height="50px" >';
echo '<br>';
echo '<br>';
    echo 'Imagen agregada en: '.$foto;
echo '<br><h3><a href="item.php">Regresar</a></h3>';
  //header('Location: ../Success.html');
  exit;
  }
  echo "</center>";

mysqli_close($con);


?>