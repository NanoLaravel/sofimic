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
        if($_SESSION['usurol'] == '1' || $_SESSION['usurol'] == '2'){
            if(isset($_POST['submit'])){
                switch($_POST['submit']){
                    case 'clientes':
                        header('Location: reporteclientes.php');
                    break;
                    case 'proveedores':
                        header('Location: reporteproveedores.php');
                    break;
                    case 'productos':
                        header('Location: reporteproductos.php');
                    break;
                    case 'ventas':
                        header('Location: reporteventas.php');
                    break;
                    case 'compras':
                        header('Location: reportecompras.php');
                    break;
                }
            }
    require "vistas/reportes.view.php"; 
}else{
    header('Location: index.php');
}}}
?>