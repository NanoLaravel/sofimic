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
               
                $pronombre = $_POST['pronombre'];
                $prodireccion = $_POST['prodireccion'];
                $prociudad = $_POST['prociudad'];
                $proemail = $_POST['proemail'];
                $protelefono = $_POST['protelefono'];                
                $usucli = $_SESSION['id'];

                $pronombre = $controlador->limpiarDatos($pronombre);
                $prodireccion = $controlador->limpiarDatos($prodireccion);
                $prociudad = $controlador->limpiarDatos($prociudad);
                $proemail = $controlador->limpiarDatos($proemail);
                $protelefono = $controlador->limpiarDatos($protelefono);
                
                
                $resultado = $controlador->agregarProveedor('', $pronombre, $prodireccion, $prociudad, $proemail, $protelefono);
                if ($resultado == true) {
                    $mensaje = 'Información agregada correctamente';
                }else{
                    $errores = 'No se pudo agregar la información, intente de nuevo';
                }
                break;

           
                case 'modificar':
                    $proid = $_POST['proid'];
                    $pronombre = $_POST['pronombre'];
                    $prodireccion = $_POST['prodireccion'];
                    $prociudad = $_POST['prociudad'];
                    $proemail = $_POST['proemail'];
                    $protelefono = $_POST['protelefono'];
                    $usuid = $_SESSION['id'];  
                    
                    
                $pronombre = $controlador->limpiarDatos($pronombre);
                $prodireccion = $controlador->limpiarDatos($prodireccion);
                $prociudad = $controlador->limpiarDatos($prociudad);
                $proemail = $controlador->limpiarDatos($proemail);
                $protelefono = $controlador->limpiarDatos($protelefono);
                
                    
                    
                    $resultado = $controlador->modificarProveedor($proid, $pronombre, $prodireccion, $prociudad, $proemail, $protelefono);
                    if ($resultado == true) {
                        $mensaje = 'Información modificada correctamente';
                    }else{
                        $errores = 'No se pudo modificar la información, intente de nuevo';
                    }
                    break;

            
                case 'eliminar':
                    $proid = $_POST['proid'];
                    $resultado = $controlador->eliminarproveedor($proid);
                    if ($resultado == true) {
                        $mensaje = 'Información eliminada correctamente';
                    }else{
                        $errores = 'No se pudo eliminar la información, intente de nuevo';
                    }
                    break;
            

        }
    }
    $resultado = $controlador->listaproveedores();
    require "vistas/proveedores.view.php"; 

}
else{
    header('Location: index.php');
}}}

?>
