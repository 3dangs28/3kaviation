
<?php
//Variables para la conexión
$servername = "localhost";
$username = "root";
$password = "Ygh8b77t";
$dbname = "3kaviation";

# conectare la base de datos

    $con=@mysqli_connect($servername, $username, $password , $dbname);
    mysqli_query($con,"SET CHARACTER SET 'utf8'");
    mysqli_query($con,"SET SESSION collation_connection ='utf8_unicode_ci'");
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }

    if (@mysqli_connect_errno()) {
        die("Connexión fallida: ".mysqli_connect_errno()." : ". mysqli_connect_error());
        }

?>