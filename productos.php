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
               
                $prodnombre = $_POST['prodnom'];
                $prodprecio = $_POST['prodpre'];
                $produnimedida = $_POST['produni'];
                $prodstock = $_POST['prodstock'];                               
                $usucli = $_SESSION['id'];

                $prodnombre = $controlador->limpiarDatos($prodnombre);
                $prodprecio = $controlador->limpiarDatos($prodprecio);
                $produnimedida = $controlador->limpiarDatos($produnimedida);
                $prodstock = $controlador->limpiarDatos($prodstock);                
                
                
                $resultado = $controlador->agregarProducto('', $prodnombre, $prodprecio, $produnimedida, $prodstock);
                if ($resultado == true) {
                    $mensaje = 'Información agregada correctamente';
                }else{
                    $errores = 'No se pudo agregar la información, intente de nuevo';
                }
                break;

           
                case 'modificar':
                    $prodid = $_POST['prodid'];
                    $prodnombre = $_POST['prodnom'];
                    $prodprecio = $_POST['prodpre'];
                    $produnimedida = $_POST['produni'];
                    $prodstock = $_POST['prodstock'];                    
                    $usuid = $_SESSION['id'];  
                    
                    
                $prodnombre = $controlador->limpiarDatos($prodnombre);
                $prodprecio = $controlador->limpiarDatos($prodprecio);
                $produnimedida = $controlador->limpiarDatos($produnimedida);
                $prodstock = $controlador->limpiarDatos($prodstock);             
                    
                    
                    $resultado = $controlador->modificarProducto($prodid, $prodnombre, $prodprecio, $produnimedida, $prodstock);
                    if ($resultado == true) {
                        $mensaje = 'Información modificada correctamente';
                    }else{
                        $errores = 'No se pudo modificar la información, intente de nuevo';
                    }
                    break;

            
                case 'eliminar':
                    $prodid = $_POST['prodid'];
                    $resultado = $controlador->eliminarproducto($prodid);
                    if ($resultado == true) {
                        $mensaje = 'Información eliminada correctamente';
                    }else{
                        $errores = 'No se pudo eliminar la información, intente de nuevo';
                    }
                    break;
            

        }
    }
    $resultado = $controlador->listaproductos();
    require "vistas/productos.view.php"; 

}
else{
    header('Location: index.php');
}}}

?>
