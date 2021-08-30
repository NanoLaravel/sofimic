<?php 
require 'clases.php';
$conexion = new conexion();
if(!$conexion){
    echo "no se pudo conectar a la base de datos";
}else{
    $contador = 0;
    $controlador = new Controlador();
    if(isset($_POST['submit'])){
        switch($_POST['submit']){
            case 'loguin':
                $usunombre = $_POST['usunombre'];
                $usucontrasena = $_POST['usucontrasena'];

                $usunombre = $controlador->limpiarDatos($usunombre);
                $usucontrasena = $controlador->limpiarDatos($usucontrasena);
                //$usucontrasena = $controlador->encriptar($usucontrasena);

                $resultado = $controlador->validarUsuario($usunombre, $usucontrasena);
                if ($resultado == true) {
                    header('Location: index.php');
                }else{
                    $errores = 'Usuario o contraseña invalida, intente de nuevo';
                }
                break;
        }
    }
    require "loguin.php"; 
}
?>