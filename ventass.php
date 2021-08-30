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
               
                $vennumfactura = $_POST['vennumfactura'];
                $venfechaventa = $_POST['venfechaventa'];
                $venvalor_total = $_POST['venvalor_total'];
                $venestado = $_POST['venestado'];
                $vencliid = $_POST['vencliid'];
                $venusuid = $_POST['venusuid'];                               
                
                $venid = $_SESSION['id'];

                $vennumfactura= $controlador->limpiarDatos($vennumfactura);
                $venfechaventa= $controlador->limpiarDatos($venfechaventa);
                $venvalor_total = $controlador->limpiarDatos($venvalor_total);
                $venestado= $controlador->limpiarDatos($venestado);
                $vencliid= $controlador->limpiarDatos($vencliid); 
                $venusuid= $controlador->limpiarDatos($venusuid);                 
                
                
                $resultado = $controlador->agregarVentas('', $vennumfactura, $venfechaventa, $venvalor_total, $venestado, $vencliid, $venusuid);
                if ($resultado == true) {
                    $mensaje = 'Información agregada correctamente';
                }else{
                    $errores = 'No se pudo agregar la información, intente de nuevo';
                }
                break;

           
                case 'modificar':
                    $venid= $_POST['venid'];
                    $vennumfactura = $_POST['vennumfactura2'];
                    $venfechaventa = $_POST['venfechaventa2'];
                    $venvalor_total = $_POST['venvalor_total2'];
                    $venestado = $_POST['venestado2'];
                    $vencliid = $_POST['vencliid2'];
                    $venusuid = $_POST['venusuid2'];                    
                    
                    $usuid = $_SESSION['id'];  
                    
                    
                $vennumfactura = $controlador->limpiarDatos($vennumfactura);
                $venfechaventa = $controlador->limpiarDatos($venfechaventa); 
                $venvalor_total = $controlador->limpiarDatos($venvalor_total);
                $venestado = $controlador->limpiarDatos($venestado);
                $vencliid = $controlador->limpiarDatos($vencliid);
                $venusuid = $controlador->limpiarDatos($venusuid);
                           
                    
                    
                    $resultado = $controlador->modificarVenta($venid, $vennumfactura, $venfechaventa, $venvalor_total, $venestado, $vencliid, $venusuid);
                    if ($resultado == true) {
                        $mensaje = 'Información modificada correctamente';
                    }else{
                        $errores = 'No se pudo modificar la información, intente de nuevo';
                    }
                    break;

            
                case 'eliminar':
                    $venid = $_POST['venid'];
                    $resultado = $controlador->eliminarproducto($venid);
                    if ($resultado == true) {
                        $mensaje = 'Información eliminada correctamente';
                    }else{
                        $errores = 'No se pudo eliminar la información, intente de nuevo';
                    }
                    break;
            

        }
    }
    $resultado = $controlador->listaVentas();
    require "vistas/ventass.view.php"; 

}
else{
    header('Location: index.php');
}}}

?>
