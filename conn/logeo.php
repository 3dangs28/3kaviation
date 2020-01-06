<?php

session_start();    
include '../conn/conexion.php';

function verificar_login($user,$password,$base,$conex,&$resA,&$resB,&$resC,&$resD,&$resE,&$resF){
$sql = "SELECT * FROM usuarios WHERE usuario='$user' AND clave='$password'";

mysqli_select_db($conex,$base);
$rec= mysqli_query($conex,$sql);


$conteo =0;

while ($row = mysqli_fetch_object($rec)){

    $conteo++;
    $resA= $row->idUsuario;
    $resB= $row->idUniversidad;
    $resC= $row->usuario;

    //nuevas variables de sesión
    $resD= $row->cod_pais;
    $resE= $row->cod_uni;
    $resF= $row->idperfil;
}


if ($conteo==1){
    return 1;
}
else {
    return 0;
}
mysqli_close($conex);

}


if(verificar_login($_POST['usuario'],$_POST['clave'],$db_name,$conexion,$resUsr,$resUni,$nombre,$cod_pais,$cod_uni,$idperfil) == 1)
        {
    
            //echo '<br> Usuario y passwords validos';
            $_SESSION['iduser']=$resUsr; 
            $_SESSION['iduni']=$resUni; 
            $_SESSION['usuario']=$nombre; 
            $_SESSION['cod_pais']=$cod_pais; 
            $_SESSION['cod_uni']=$cod_uni; 

            switch ($idperfil) {
                case "1":
                header('Location: ../principal.html');
                    break;
                case "2":
                header('Location: ../cierre.html');
                    break;
                case "3":
                header('Location: ../login.html');
                    break;
            }
            
        }
        else
        {
            echo '<center>Su usuario es incorrecto, o su clave, intente nuevamente.<br>';
            echo '<form action="../login.html"><input type="submit" value="ir a login"/></form></center>';
        }

    
    ?>
