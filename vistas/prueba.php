<?php
header('Access-Control-Allow-Origin: *');
$usuario = $_POST['usuario'];
$contrasena = $_POST['pass'];

if($usuario === '' || $contrasena=== ''){
    echo json_encode('error');
}else{
    echo json_encode('correcto: <br> usuario:'.$usuario. '<br> contraseña: '. $contrasena);
}