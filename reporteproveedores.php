<?php 
require 'clases.php';
$conexion = new conexion();
if(!$conexion){
    echo "no se pudo conectar a la base de datos";
}else{
    session_start();
    $contador = 0;
    $controlador = new Controlador();
    $sesion = $controlador->comprobarSesion();
    if($sesion == false){
        header('Location: loguin.php');
    }else{
        if($_SESSION['usurol'] == '1' || $_SESSION['usurol'] == '3'){
    $resultado = $controlador->listaproveedores();
    require "vistas/reporteproveedores.view.php"; 
}else{
    header('Location: index.php');
}}}
?>