<?php

//require_once("conexion.php");

if (empty($_POST['id'])) {
    $errors[] = "ID vacío";
 
 } else if (!empty($_POST['id'])){
    

$nombre = $_FILES['file']['name'];
$nombrer = strtolower($nombre);
$cd=$_FILES['file']['tmp_name'];
$ruta = "../img/productos/" . $_FILES['file']['name'];
$destino = "../img/productos".$nombrer;
$resultado = @move_uploaded_file($_FILES["file"]["tmp_name"], $ruta);

} else {
    $errors []= "Error desconocido.";
}


if (!empty($resultado)){

                @mysqli_query($conexion,"INSERT INTO ARTICULOS VALUES ('". $nombre."','" . $destino . "')"); 
                echo "el archivo ha sido movido exitosamente";

                }else{

                    echo "Error al subir el archivo";

                    }
                 


                    if (isset($errors)){
			
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Error!</strong> 
                                <?php
                                    foreach ($errors as $error) {
                                            echo $error;
                                        }
                                    ?>
                        </div>
                        <?php
                        }
                        if (isset($messages)){
                            
                            ?>
                            <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>¡Bien hecho!</strong>
                                    <?php
                                        foreach ($messages as $message) {
                                                echo $message;
                                            }
                                        ?>
                            </div>
                            <?php
                        }





?>