<?php class Conexion extends PDO { 
  private $tipo_de_base = 'mysql';
  private $host = 'localhost';
  private $nombre_de_base = 'sofimic';
  private $usuario = 'root';
  private $contrasena = 'Chinacota__1972'; 
  private $sql;
  public function Conexion() {
     //Sobreescribo el método constructor de la clase PDO.
     try{
        parent::__construct("{$this->tipo_de_base}:dbname={$this->nombre_de_base};host={$this->host};charset=utf8", $this->usuario, $this->contrasena);
     }catch(PDOException $e){
        echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
        exit;
     }
  } 
}

/*$conexion = new conexion();
$sql = 'CALL listaclientes()';
$consulta = $conexion->prepare($sql);
$consulta->execute();
$resultado = $consulta->fetchAll();
return $resultado;*/




$conexion = new conexion();
$sql = 'CALL listaproductos()';
$consulta = $conexion->prepare($sql);
$consulta->execute();
$resultado_prod = $consulta->fetchAll();
return $resultado_prod;



 ?>