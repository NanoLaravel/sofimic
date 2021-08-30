<?php require "clases.php";
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
            case 'ingresar':
               
                $comnumcomprobante = $_POST['num'];
                $comvalor_total = $_POST['val'];
                $comdescripcion = $_POST['des'];
                $comfechacompra = $_POST['fecha'];
                $comproid = $_POST['comproid'];
                $comusuid = $_POST['comusuid']; 
                 
                                              
                $usucli = $_SESSION['id'];

                $comnumcomprobante = $controlador->limpiarDatos($comnumcomprobante);
                $comvalor_total = $controlador->limpiarDatos($comvalor_total);
                $comdescripcion = $controlador->limpiarDatos($comdescripcion);
                $comfechacompra = $controlador->limpiarDatos($comfechacompra);
                $comproid = $controlador->limpiarDatos($comproid);
                $comusuid = $controlador->limpiarDatos($comusuid);
                               
                
                
                $resultado = $controlador->agregarCompra('', $comnumcomprobante, $comvalor_total, $comdescripcion, $comfechacompra, $comproid, $comusuid);
                if ($resultado == true) {
                    $mensaje = 'Información agregada correctamente';
                }else{
                    $errores = 'No se pudo agregar la información, intente de nuevo';
                }
                break;

           
                case 'modificar':
                    $comid = $_POST['comid'];
                    $comnumcomprobante = $_POST['num'];
                    $comvalor_total = $_POST['val'];
                    $comdescripcion = $_POST['des'];
                    $comfechacompra = $_POST['fecha'];
                    $comproid = $_POST['comproid'];
                    $comusuid = $_POST['comusuid'];
                                     
                    $usuid = $_SESSION['id'];  
                    
                    
                $comnumcomprobante = $controlador->limpiarDatos($comnumcomprobante);
                $comvalor_total = $controlador->limpiarDatos($comvalor_total);
                $comdescripcion = $controlador->limpiarDatos($comdescripcion);
                $comfechacompra = $controlador->limpiarDatos($comfechacompra);             
                    
                    
                    $resultado = $controlador->modificarCompra($comid, $comnumcomprobante, $comvalor_total, $comdescripcion, $comfechacompra, $comproid, $comusuid);
                    if ($resultado == true) {
                        $mensaje = 'Información modificada correctamente';
                    }else{
                        $errores = 'No se pudo modificar la información, intente de nuevo';
                    }
                    break;

            
                case 'eliminar':
                    $comid = $_POST['comid'];
                    $resultado = $controlador->eliminarcompra($comid);
                    if ($resultado == true) {
                        $mensaje = 'Información eliminada correctamente';
                    }else{
                        $errores = 'No se pudo eliminar la información, intente de nuevo';
                    }
                    break;
            

        }
    }
    $resultado = $controlador->listacompras();
    require "vistas/compras.view.php"; 

}
else{
    header('Location: index.php');
}}}

?>
