<?php
if($_POST['idcli']){    
  echo("hola hola");     
    $idcli = $_POST['idcli']; 
header('Access-Control-Allow-Origin: *');
require 'clases.php';
$conexion = new conexion();
if(!$conexion){
	echo "no se pudo conectar a la base de datos";
}else{
    session_start();
    $controlador = new Controlador();
    $sesion = $controlador->comprobarSesion();

   if($_SESSION['usurol'] == '1' || $_SESSION['usurol'] == '2'){

    
    if($_POST['idcli']){    
        
         $idcli = $_POST['idcli'];
         
         
             $resultado = $controlador->ConsultarCliente($idcli);
             ($resultado);   
             if ($resultado == true) {
                    
                    
                    if($resultado): foreach($resultado as $cliente): 
                        
                        
                        ($clinombre = $cliente['clinombre']);
                        ($clidireccion = $cliente['clidireccion']);
                       ($cliciudad = $cliente['cliciudad']);
                        ($cliemail = $cliente['cliemail']);
                        ($clitelefono = $cliente['clitelefono']);
                        
                        
                        
                        endforeach; endif; 
                        echo json_encode([$clinombre, $clidireccion, $cliciudad, $cliemail, $clitelefono]); 
                }else{
                    echo json_encode('error');
                }           
        
            }else{
           echo ('no esta seteada'); 
            }
            
}}}
?>