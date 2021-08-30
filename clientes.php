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
               
                $clinombre = $_POST['clinombre'];
                $clidireccion = $_POST['clidireccion'];
                $cliciudad = $_POST['cliciudad'];
                $cliemail = $_POST['cliemail'];
                $clitelefono = $_POST['clitelefono'];                
                $usucli = $_SESSION['id'];

                $clinombre = $controlador->limpiarDatos($clinombre);
                $clidireccion = $controlador->limpiarDatos($clidireccion);
                $cliciudad = $controlador->limpiarDatos($cliciudad);
                $cliemail = $controlador->limpiarDatos($cliemail);
                $clitelefono = $controlador->limpiarDatos($clitelefono);
                
                
                $resultado = $controlador->agregarCliente('', $clinombre, $clidireccion, $cliciudad, $cliemail, $clitelefono);
                if ($resultado == true) {
                    $mensaje = 'Información agregada correctamente';
                }else{
                    $errores = 'No se pudo agregar la información, intente de nuevo';
                }
                break;

           
                case 'modificar':
                    $cliid = $_POST['cliid'];
                    $clinombre = $_POST['clinombre'];
                    $clidireccion = $_POST['clidireccion'];
                    $cliciudad = $_POST['cliciudad'];
                    $cliemail = $_POST['cliemail'];
                    $clitelefono = $_POST['clitelefono'];
                    $usucli = $_SESSION['id'];                   
                    
                    
                    $resultado = $controlador->modificarcliente($cliid, $clinombre, $clidireccion, $cliciudad, $cliemail, $clitelefono);
                    if ($resultado == true) {
                        $mensaje = 'Información modificada correctamente';
                    }else{
                        $errores = 'No se pudo modificar la información, intente de nuevo';
                    }
                    break;

            
                case 'eliminar':
                    $cliid = $_POST['cliid'];
                    $resultado = $controlador->eliminarcliente($cliid);
                    if ($resultado == true) {
                        $mensaje = 'Información eliminada correctamente';
                    }else{
                        $errores = 'No se pudo eliminar la información, intente de nuevo';
                    }
                    break;
            

        }
    }
    $resultado = $controlador->listaclientes();
    $resultado_cli = $controlador->listaclientes();
    require "vistas/clientes-view.php"; 
    

}
else{
    header('Location: index.php');
}}}

?>
