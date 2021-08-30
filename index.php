<?php 
require 'clases.php';
$conexion = new conexion();
if(!$conexion){
	header('Location: loguin.php');
}else{
    session_start();
    $controlador = new Controlador();
    $sesion = $controlador->comprobarSesion();
    if($sesion == false){
        header('Location: loguin.php');
        
    }else{
        $resultado_pro = $controlador->totalProductosStock();
        $resultado_cli = $controlador->totalClientes();
        require 'vistas/index.view.php';
   }
   
}

 ?>
