<?php 

require 'clases.php';
$conexion = new conexion();
if(!$conexion){
	echo "no se pudo conectar a la base de datos";
}else{
    session_start();
    $controlador = new Controlador();
    $sesion = $controlador->comprobarSesion();

   if($_SESSION['usurol'] == '1' || $_SESSION['usurol'] == '2'){

    
    
                   
    /*-------------------------------------------------productos*/
    if(isset($_POST['submit'])){
                
                 
                 $idproducto= $_POST['idproducto'];                 
                 $idnombre= $_POST['nombreproducto'];                 
                 $cantidad= $_POST['cantidadproducto'];                 
                 $precio= $_POST['totalproducto'];                 
                 $idventa=1;
                
                 $resultado = $controlador->agregarventaxproducto( $cantidad, $precio, $idproducto, $idventa);
                 if ($resultado == true) {
                     $mensaje = 'Información agregada correctamente';
                 }else{
                     $errores = 'No se pudo agregar la información a bd , intente de nuevo';
                     
                 }
                 
                
                 
                }

            
             
              

require "vistas/factura.view.php";
    if($sesion == false){
        header('Location: loguin.php');
       
    
}}}

?>