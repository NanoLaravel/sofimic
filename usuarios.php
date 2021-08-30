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
               
                $usunombre = $_POST['usunombre'];
                $usucontrasena = $_POST['usucontrasena'];
                $usurol = $_POST['usurol'];
                                
                $usucli = $_SESSION['id'];

                $usunombre = $controlador->limpiarDatos($usunombre);
                $usucontrasena = $controlador->limpiarDatos($usucontrasena);
                $usurol = $controlador->limpiarDatos($usurol);
                
                
                
                $resultado = $controlador->agregarusuario('', $usunombre, $usucontrasena, $usurol);
                if ($resultado == true) {
                    $mensaje = 'Información agregada correctamente';
                }else{
                    $errores = 'No se pudo agregar la información, intente de nuevo';
                }
                break;

           
                case 'modificar':
                    $usuid = $_POST['usuid'];
                    $usunombre = $_POST['usunombre'];
                    $usucontrasena = $_POST['usucontrasena'];
                    $usurolid = $_POST['usurolid'];
                    
                    $usucli = $_SESSION['id'];                   
                    
                    
                    $resultado = $controlador->modificarusuario($usuid, $usunombre, $usucontrasena, $usurolid);
                    if ($resultado !== true) {
                        $mensaje = 'Información modificada correctamente';
                    }else{
                        $errores = 'No se pudo modificar la información, intente de nuevo';
                    }
                    break;

            
                case 'eliminar':
                    $usuid = $_POST['usuid'];
                    $resultado = $controlador->eliminarusuario($usuid);
                    if ($resultado == true) {
                        $mensaje = 'Información eliminada correctamente';
                    }else{
                        $errores = 'No se pudo eliminar la información, intente de nuevo';
                    }
                    break;
            

        }
    }
    $resultado = $controlador->listausuarios();
    
    require "vistas/usuarios.view.php"; 

}
else{
    header('Location: index.php');
}}}

?>