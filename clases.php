<?php
class Conexion extends PDO { 
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
Class Usuario{
    private $usuid;
    private $usunombre;
    private $usucontrasena;
    
    private $usurolid;

    public function Usuario($usuid, $usunombre, $usucontrasena, $usurolid){
        $this->usuid = $usuid;
        $this->usunombre = $usunombre;
        $this->usucontrasena = $usucontrasena;
        
        $this->usurolid= $usurolid;
    }
    public function getusuid(){
        return $this->usuid;
    }
    public function getusunombre(){
        return $this->usunombre;
    }
    public function getusucontrasena(){
        return $this->usucontrasena;
    }
   
    public function getusurolid(){
        return $this->usurolid;
    }

}

Class GestorUsuarios{
    public function listausuarios(){
        $conexion = new conexion();
        $sql = 'CALL listausuarios()';
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

   public function agregarusuario(Usuario $usuario){
        $conexion = new conexion();
        
        $usunombre = $usuario->getusunombre();
        $usucontrasena = $usuario->getusucontrasena();
        $usurolid = $usuario->getusurolid();
        
        
        
        
        $sql = 'CALL nuevousuario( :usunombre, :usucontrasena, :usurolid)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array(':usunombre'=>$usunombre, ':usucontrasena'=>$usucontrasena, ':usurolid'=>$usurolid));       
        $id = $conexion->lastInsertId();
        $resultado= $consulta->rowCount();
        return ($resultado) ? true : false;
        $resultado= $consulta->errorInfo();
        var_dump($resultado);
    }

  
    

    public function modificarusuario(Usuario $usuario){
        $conexion = new conexion();
        $usuid = $usuario->getusuid();
        $usunombre = $usuario->getusunombre();
        $usucontrasena = $usuario->getusunombre();
        $usurolid = $usuario->getusurolid();
        
        
        
       
        $sql = 'CALL modificarusuario( :usunombre, :usucontrasena, :usurolid, :usuid)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array( ':usunombre'=>$usunombre, ':usucontrasena'=>$usucontrasena, ':usurolid'=>$usurolid, 'usuid'=>$usuid));
        $resultado = $consulta->rowCount();
        $resultado = $consulta->errorInfo();
        //var_dump($resultado);
        //return ($resultado>0) ? $resultado : false;
    }
    public function eliminarusuario($usuid){
        $conexion = new conexion();
        $sql = 'CALL eliminarusuario(:usuid)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array(':usuid'=>$usuid));
        $resultado = $consulta->rowCount();
        $resultado = $consulta->errorInfo();
       // var_dump($resultado);
        //return ($resultado>0) ? $resultado : false;
    }
}
Class Loguin{
    private $usunombre;
    private $usucontrasena;

    public function Loguin($usunombre, $usucontrasena){
        $this->usunombre = $usunombre;
        $this->usucontrasena = $usucontrasena;
    }

    public function getusunombre(){
        return $this->usunombre;
    }
    public function getusucontrasena(){
        return $this->usucontrasena;
    }
}
Class GestorLoguin{
    public function validarUsuario(Loguin $loguin){
        $conexion = new conexion();
        $usunombre = $loguin->getusunombre();
        $usucontrasena = $loguin->getusucontrasena();
        $sql = 'CALL validarusuario(:usunombre, :usucontrasena)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array(':usunombre'=>$usunombre, ':usucontrasena'=>$usucontrasena));
       $resultado = $consulta->fetch();
       if($resultado){
        session_start();
        $_SESSION['id'] = $resultado['usuid'];                
        $_SESSION['nom'] = $resultado['usunombre'];                
        $_SESSION['rol'] = $resultado['usurol'];
        $_SESSION['usurol'] = $resultado['usurolid'];
        $_SESSION['rolnombre'] = $resultado['rolnombre'];
        }
        return ($resultado) ? true : false;
    }
}

class Cliente{
    private $cliid;
    private $clinombre;
    private $clidireccion;
    private $cliciudad;
    private $cliemail;
    private $clitelefono;

    

    public function Cliente($cliid, $clinombre, $clidireccion, $cliciudad, $cliemail, $clitelefono) {
        $this->cliid = $cliid;
        $this->clinombre = $clinombre;
        $this->clidireccion = $clidireccion;
        $this->cliciudad = $cliciudad;
        $this->cliemail = $cliemail;
        $this->clitelefono = $clitelefono;
        
    }

    public function getcliid(){
        return $this->cliid;
    }
    public function getclinombre(){
        return $this->clinombre;
    }
    public function getclidireccion(){
        return $this->clidireccion;
    }
    public function getcliciudad(){
        return $this->cliciudad;
    }
    public function getcliemail(){
        return $this->cliemail;
    }
    public function getclitelefono(){
        return $this->clitelefono;
    }
}





Class GestorCliente{
    public function agregarCliente(Cliente $cliente){
        $conexion = new conexion();
        $clinombre = $cliente->getclinombre();
        $clidireccion = $cliente->getclidireccion();
        $cliciudad = $cliente->getcliciudad();
        $cliemail = $cliente->getcliemail();
        $clitelefono = $cliente->getclitelefono();
        
        $sql = 'CALL nuevocliente(:clinombre, :clidireccion, :cliciudad, :cliemail, :clitelefono)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array(':clinombre'=>$clinombre, ':clidireccion'=>$clidireccion, ':cliciudad'=>$cliciudad, ':cliemail'=>$cliemail, ':clitelefono'=>$clitelefono));       
        $id = $conexion->lastInsertId();
         $resultado= $consulta->rowCount();
       return ($resultado) ? true : false;
      // $resultado= $consulta->errorInfo();
      // var_dump($resultado);
    }

    public function listaclientes(){
        $conexion = new conexion();
        $sql = 'CALL listaclientes()';
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    public function ConsultarCliente($idcli){
        $conexion = new conexion();
        $sql = 'CALL ConsultarCliente(:idcli)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array(':idcli'=>$idcli));
        $resultado = $consulta->fetchAll();
        return $resultado;
        $resultado = $consulta->errorInfo();
        var_dump($resultado);
    }
  
    

    public function modificarcliente(Cliente $cliente){
        $conexion = new conexion();
        $cliid = $cliente->getcliid();
        $clinombre = $cliente->getclinombre();
        $clidireccion = $cliente->getclidireccion();
        $cliciudad = $cliente->getcliciudad();
        $cliemail = $cliente->getcliemail();
        $clitelefono = $cliente->getclitelefono();
       
        $sql = 'CALL modificarcliente(:clinombre, :clidireccion, :cliciudad, :cliemail, :clitelefono, :cliid)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array(':clinombre'=>$clinombre, ':clidireccion'=>$clidireccion, ':cliciudad'=>$cliciudad, ':cliemail'=>$cliemail, ':clitelefono'=>$clitelefono, ':cliid'=>$cliid));
        $resultado = $consulta->rowCount();
        return ($resultado>0) ? $resultado : false;
    }
    public function eliminarcliente($cliid){
        $conexion = new conexion();
        $sql = 'CALL eliminarcliente(:cliid)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array(':cliid'=>$cliid));
        $resultado = $consulta->rowCount();
        //$resultado = $consulta->errorInfo();
        //var_dump($resultado);
        return ($resultado>0) ? $resultado : false;
    }
    public function totalClientes(){
        $conexion = new conexion();
        $sql = 'CALL totalClientes()';
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetch();
        return $resultado;
    }
   
}
 // CLASE Y GESTOR DE PROVEEDORES-----------------------------------------------------
 Class proveedor{
    private $proid;
    private $pronombre;
    private $prodireccion;
    private $prociudad;
    private $proemail;
    private $protelefono;

    

    public function proveedor($proid, $pronombre, $prodireccion, $prociudad, $proemail, $protelefono) {
        $this->proid = $proid;
        $this->pronombre = $pronombre;
        $this->prodireccion = $prodireccion;
        $this->prociudad = $prociudad;
        $this->proemail = $proemail;
        $this->protelefono = $protelefono;
        
    }

    public function getproid(){
        return $this->proid;
    }
    public function getpronombre(){
        return $this->pronombre;
    }
    public function getprodireccion(){
        return $this->prodireccion;
    }
    public function getprociudad(){
        return $this->prociudad;
    }
    public function getproemail(){
        return $this->proemail;
    }
    public function getprotelefono(){
        return $this->protelefono;
    }
}
Class Gestorproveedor{
    public function agregarproveedor(proveedor $proveedor){
        $conexion = new conexion();
        $pronombre = $proveedor->getpronombre();
        $prodireccion = $proveedor->getprodireccion();
        $prociudad = $proveedor->getprociudad();
        $proemail = $proveedor->getproemail();
        $protelefono = $proveedor->getprotelefono();
        
        $sql = 'CALL nuevoproveedor(:pronombre, :prodireccion, :prociudad, :proemail, :protelefono)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array(':pronombre'=>$pronombre, ':prodireccion'=>$prodireccion, ':prociudad'=>$prociudad, ':proemail'=>$proemail, ':protelefono'=>$protelefono));       
        $id = $conexion->lastInsertId();
         $resultado= $consulta->rowCount();
       return ($resultado) ? true : false;
       // $resultado= $consulta->errorInfo();
          // var_dump($resultado);
        }

       public function listaproveedores(){
        $conexion = new conexion();
        $sql = 'CALL listaproveedores()';
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function modificarproveedor(proveedor $proveedor){
        $conexion = new conexion();
        $proid = $proveedor->getproid();
        $pronombre = $proveedor->getpronombre();
        $prodireccion = $proveedor->getprodireccion();
        $prociudad = $proveedor->getprociudad();
        $proemail = $proveedor->getproemail();
        $protelefono = $proveedor->getprotelefono();
       
        $sql = 'CALL modificarproveedor(:pronombre, :prodireccion, :prociudad, :proemail, :protelefono, :proid)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array(':pronombre'=>$pronombre, ':prodireccion'=>$prodireccion, ':prociudad'=>$prociudad, ':proemail'=>$proemail, ':protelefono'=>$protelefono, ':proid'=>$proid));
        $resultado = $consulta->rowCount();
        return ($resultado>0) ? $resultado : false;
    }
    public function eliminarproveedor($proid){
        $conexion = new conexion();
        $sql = 'CALL eliminarproveedor(:proid)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array(':proid'=>$proid));
        $resultado = $consulta->rowCount();
        return ($resultado>0) ? $resultado : false;
        $resultado = $consulta->errorInfo();
        var_dump($resultado);
        
    }
    
   
}
 //fin gestor proveedores-----------------------------------------------------

 class Productos{
    private $prodid;
    private $prodnombre;
    private $prodprecio;
    private $produnimedida;
    private $prodstock;

    

    public function Productos($prodid, $prodnombre, $prodprecio, $produnimedida, $prodstock) {
        $this->id = $prodid;
        $this->nombre = $prodnombre;
        $this->precio = $prodprecio;
        $this->unimedida = $produnimedida;
        $this->stock = $prodstock;
        
        
    }

    public function getid(){
        return $this->id;
    }
    public function getnombre(){
        return $this->nombre;
    }
    public function getprecio(){
        return $this->precio;
    }
    public function getunimedida(){
        return $this->unimedida;
    }
    public function getstock(){
        return $this->stock;
    }
   
}





Class GestorProductos{
    public function agregarProducto(Productos $productos){
        $conexion = new conexion();
        $prodnombre = $productos->getnombre();
        $prodprecio = $productos->getprecio();
        $produnimedida = $productos->getunimedida();
        $prodstock = $productos->getstock();
        
        
        $sql = 'CALL nuevoproducto(:prodnombre, :prodprecio, :produnimedida, :prodstock)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array(':prodnombre'=>$prodnombre, ':prodprecio'=>$prodprecio, ':produnimedida'=>$produnimedida, ':prodstock'=>$prodstock));       
        $id = $conexion->lastInsertId();
         $resultado= $consulta->rowCount();
       return ($resultado) ? true : false;
      // $resultado= $consulta->errorInfo();
      // var_dump($resultado);
    }

    public function listaProductos(){
        $conexion = new conexion();
        $sql = 'CALL listaproductos()';
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function modificarProducto(Productos $productos){
        $conexion = new conexion();
        $prodid = $productos->getid();
        $prodnombre = $productos->getnombre();
        $prodprecio = $productos->getprecio();
        $produnimedida = $productos->getunimedida();
        $prodstock = $productos->getstock();
        
       
        $sql = 'CALL modificarproducto(:prodnombre, :prodprecio, :produnimedida, :prodstock,  :prodid)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array(':prodnombre'=>$prodnombre, ':prodprecio'=>$prodprecio, ':produnimedida'=>$produnimedida, ':prodstock'=>$prodstock, ':prodid'=>$prodid));
        $resultado = $consulta->rowCount();
        return ($resultado>0) ? $resultado : false;
    }
    public function eliminarproducto($prodid){
        $conexion = new conexion();
        $sql = 'CALL eliminarproducto(:prodid)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array(':prodid'=>$prodid));
        $resultado = $consulta->rowCount();
        //$resultado = $consulta->errorInfo();
        //var_dump($resultado);
        return ($resultado>0) ? $resultado : false;
    }
    
    public function totalProductosStock(){
        $conexion = new conexion();
        $sql = 'CALL totalProductosStock()';
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetch();
        return $resultado;
        }
   
}
//------------------------clase y gestor compras----------------
class Compras{
    private $comid;
    private $comnumcomprobante;
    private $comvalor_total;
    private $comdescripcion;
    private $comfechacompra;
    private $comproid;
    private $comusuid;    

    public function Compras($comid, $comnumcomprobante, $comvalor_total, $comdescripcion, $comfechacompra, $comproid, $comusuid ) {
        $this->comid = $comid;
        $this->comnumcomprobante = $comnumcomprobante;
        $this->comvalor_total = $comvalor_total;
        $this->comdescripcion= $comdescripcion;
        $this->comfechacompra = $comfechacompra;
        $this->comproid= $comproid;
        $this->comusuid = $comusuid;
        
        
    }

    public function getcomid(){
        return $this->comid;
    }
    public function getcomnumcomprobante(){
        return $this->comnumcomprobante;
    }
    public function getcomvalor_total(){
        return $this->comvalor_total;
    }
    public function getcomdescripcion(){
        return $this->comdescripcion;
    }
    public function getcomfechacompra(){
        return $this->comfechacompra;
    }
    public function getcomproid(){
        return $this->comproid;
    }
    public function getcomusuid(){
        return $this->comusuid;
    }
   
}





Class GestorCompras{
    public function agregarCompra(Compras $compras){
        $conexion = new conexion();
        $comnumcomprobante = $compras->getcomnumcomprobante();
        $comvalor_total = $compras->getcomvalor_total();
        $comdescripcion = $compras->getcomdescripcion();
        $comfechacompra = $compras->getcomfechacompra();
        $comproid = $compras->getcomproid();
        $comusuid = $compras->getcomusuid();
        
        
        $sql = 'CALL nuevacompra(:comnumcomprobante, :comvalor_total, :comdescripcion, :comfechacompra, :comproid, :comusuid)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array(':comnumcomprobante'=>$comnumcomprobante, ':comvalor_total'=>$comvalor_total, ':comdescripcion'=>$comdescripcion, ':comfechacompra'=>$comfechacompra, ':comproid'=>$comproid, ':comusuid'=>$comusuid));       
        $id = $conexion->lastInsertId();
        $resultado= $consulta->rowCount();
        return ($resultado) ? true : false;
       $resultado= $consulta->errorInfo();
       var_dump($resultado);
    }

    public function listacompras(){
        $conexion = new conexion();
        $sql = 'CALL listacompras()';
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function modificarCompra(compras $compras){
        $conexion = new conexion();
        $comid = $compras->getcomid();
        $comnumcomprobante = $compras->getcomnumcomprobante();
        $comvalor_total = $compras->getcomvalor_total();
        $comdescripcion = $compras->getcomdescripcion();
        $comfechacompra = $compras->getcomfechacompra();
        $comproid = $compras->getcomproid();
        $comusuid = $compras->getcomusuid();
        
        
       
        $sql = 'CALL modificarCompra(:comnumcomprobante, :comvalor_total, :comdescripcion, :comfechacompra,  :comproid, :comusuid, :comid)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array(':comnumcomprobante'=>$comnumcomprobante, ':comvalor_total'=>$comvalor_total, ':comdescripcion'=>$comdescripcion, ':comfechacompra'=>$comfechacompra, ':comproid' =>$comproid, ':comusuid' =>$comusuid, ':comid' =>$comid));
        $resultado = $consulta->rowCount();
        return ($resultado>0) ? $resultado : false;
    }
    public function eliminarCompra($comid){
        $conexion = new conexion();
        $sql = 'CALL eliminarCompra(:comid)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array(':comid'=>$comid));
        $resultado = $consulta->rowCount();
        //$resultado = $consulta->errorInfo();
        //var_dump($resultado);
        return ($resultado>0) ? $resultado : false;
    }
   
}
//--------------------fin clase y gestorcompras---------------
class Ventas{
    private $venid;
    private $vennumfactura;
    private $venfechaventa;
    private $venvalor_total;
    private $venestado;
    private $vencliid;
    private $venusuid;    

    public function Ventas($venid, $vennumfactura, $venfechaventa, $venvalor_total, $venestado, $vencliid, $venusuid ) {
        $this->id = $venid;
        $this->vennumfactura = $vennumfactura;
        $this->venfechaventa = $venfechaventa;
        $this->venvalor_total= $venvalor_total;
        $this->venestado = $venestado;
        $this->vencliid= $vencliid;
        $this->venusuid = $venusuid;
        
        
    }

    public function getvenid(){
        return $this->venid;
    }
    public function getvennumfactura(){
        return $this->vennumfactura;
    }
    public function getvenfechaventa(){
        return $this->venfechaventa;
    }
    public function getvenvalor_total(){
        return $this->venvalor_total;
    }
    public function getvenestado(){
        return $this->venestado;
    }
    public function getvencliid(){
        return $this->vencliid;
    }
    public function getvenusuid(){
        return $this->venusuid;
    }
   
}





Class GestorVentas{
    public function agregarVentas(Ventas $ventas){
        $conexion = new conexion();
        $vennumfactura = $ventas->getvennumfactura();
        $venfechaventa = $ventas->getvenfechaventa();
        $venvalor_total = $ventas->getvenvalor_total();
        $venestado = $ventas->getvenestado();
        $vencliid = $ventas->getvencliid();
        $venusuid = $ventas->getvenusuid();
        
        
        $sql = 'CALL nuevaventa(:vennumfactura, :venfechaventa, :venvalor_total, :venestado, :vencliid, :venusuid)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array(':vennumfactura'=>$vennumfactura, ':venfechaventa'=>$venfechaventa, ':venvalor_total'=>$venvalor_total, ':venestado'=>$venestado, ':vencliid'=>$vencliid, ':venusuid'=>$venusuid));       
        $id = $conexion->lastInsertId();
        $resultado= $consulta->rowCount();
        return ($resultado) ? true : false;
        $resultado= $consulta->errorInfo();
        var_dump($resultado);
    }

    public function listaVentas(){
        $conexion = new conexion();
        $sql = 'CALL listaVentas()';
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function modificarVenta(ventas $ventas){
        $conexion = new conexion();
        $venid = $ventas->getvenid();
        $vennumfactura = $ventas->getvennumfactura();
        $venfechaventa = $ventas->getvenfechaventa();
        $venvalor_total = $ventas->getvenvalor_total();
        $venestado = $ventas->getvenestado();
        $vencliid = $ventas->getvencliid();
        $venusuid = $ventas->getvenusuid();
        
        
       
        $sql = 'CALL modificarVenta(:vennumfactura, :venfechaventa, :venvalor_total, :venestado,  :vencliid, :venusuid, :venid)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array(':vennumfactura'=>$vennumfactura, ':venfechaventa'=>$venfechaventa, ':venvalor_total'=>$venvalor_total, ':venestado'=>$venestado, ':vencliid' =>$vencliid, ':venusuid' =>$venusuid, ':venid' =>$venid));
        $resultado = $consulta->rowCount();
        //$resultado = $consulta->errorInfo();
        //var_dump($resultado);
        return ($resultado>0) ? $resultado : false;
    }
    public function eliminarVenta($venid){
        $conexion = new conexion();
        $sql = 'CALL eliminarVenta(:venid)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array(':venid'=>$venid));
        $resultado = $consulta->rowCount();
        //$resultado = $consulta->errorInfo();
        //var_dump($resultado);
        return ($resultado>0) ? $resultado : false;
    }
   
}
//fin clase y gestor ventas-------------------------------------
class ventaxproducto{
    private $venxcanventa;
    private $venxprecio;
    private $venxprodid;
    private $venxvenid;
       

    public function ventaxproducto($venxcanventa, $venxprecio, $venxprodid, $venxvenid) {
        
        $this->venxcanventa = $venxcanventa;
        $this->venxprecio = $venxprecio;
        $this->venxprodid= $venxprodid;
        $this->venxvenid= $venxvenid;
       
        
        
    }

    public function getvenxcanventa(){
        return $this->venxcanventa;
    }
    public function getvenxprecio(){
        return $this->venxprecio;
    }
    public function getvenxprodid(){
        return $this->venxprodid;
    }
    public function getvenxvenid(){
        return $this->venxvenid;
    }
    
   
}





Class Gestorventaxproducto{
    public function agregarventaxproducto(ventaxproducto $ventaxproducto){
        $conexion = new conexion();
        $cantidad = $ventaxproducto->getvenxcanventa();
        $precio = $ventaxproducto->getvenxprecio();
        $id_producto = $ventaxproducto->getvenxprodid();
        $id_venta = $ventaxproducto->getvenxvenid();
        
        
        
        $sql = 'CALL nuevaventaxproducto(:venxcanventa, :venxprecio, :venxprodid, :venxvenid)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array(':venxcanventa'=>$cantidad, ':venxprecio'=>$precio, ':venxprodid'=>$id_producto, ':venxvenid'=>$id_venta));       
        
        $resultado= $consulta->rowCount();
        return ($resultado) ? true : false;
        $resultado= $consulta->errorInfo();
        var_dump($resultado);
    }
}
    //----------------------fin clse y gestor ventaxproducto---------------
Class Controlador{
    public function agregarCliente($cliid, $clinombre, $clidireccion, $cliciudad, $cliemail, $clitelefono){
        $cliente = new Cliente($cliid, $clinombre, $clidireccion, $cliciudad, $cliemail, $clitelefono);
        $gestorCliente = new GestorCliente();
        $resultado = $gestorCliente->agregarCliente($cliente);
        return $resultado;
    }
    public function modificarcliente($cliid, $clinombre, $clidireccion, $cliciudad, $cliemail, $clitelefono){
        $cliente = new Cliente($cliid, $clinombre, $clidireccion, $cliciudad, $cliemail, $clitelefono);
        $gestorCliente = new GestorCliente();
        $resultado = $gestorCliente->modificarcliente($cliente);
        return $resultado;
    }
    public function eliminarcliente($cliid){
        $gestorCliente = new GestorCliente();
        $resultado = $gestorCliente->eliminarCliente($cliid);
        return $resultado;
    }
    public function listaclientes(){
        $gestorCliente = new GestorCliente();
        $resultado = $gestorCliente->listaclientes();
        return $resultado;
    }
    public function ConsultarCliente($idcli){
        $gestorCliente = new GestorCliente();
        $resultado = $gestorCliente->ConsultarCliente($idcli);
        return $resultado;
    }
    public function totalClientes(){
        $gestorClientes = new GestorCliente();
        $resultado = $gestorClientes->totalClientes();
        return $resultado;
    }
    public function limpiarDatos($datos){
        $datos = trim($datos);
	    $datos = stripslashes($datos);
	    $datos = htmlspecialchars($datos);
	if(gettype($datos)=='string'){
		$datos = filter_var($datos, FILTER_SANITIZE_STRING);
	}
	return $datos;
    }
    /*public function encriptar($datos){
		$datos = hash('sha512', $datos);
		return $datos;
    }*/
    public function validarUsuario($usunombre, $usucontrasena){
        $loguin = new Loguin($usunombre, $usucontrasena);
        $gestorLoguin = new GestorLoguin();
        $resultado = $gestorLoguin->validarUsuario($loguin);
        return $resultado;
    }
    public function listausuarios(){
        $gestorUsuarios = new GestorUsuarios();
        $resultado = $gestorUsuarios->listausuarios();
        return $resultado;
    }
    public function agregarusuario($usuid, $usunombre, $usucontrasena, $usurolid){
        $usuario = new Usuario($usuid, $usunombre, $usucontrasena, $usurolid);
        $gestorUsuarios = new GestorUsuarios();
        $resultado = $gestorUsuarios->agregarusuario($usuario);
        return $resultado;
    }
    public function modificarusuario($usuid, $usunombre, $usucontrasena, $usurolid){
        $usuario = new Usuario($usuid, $usunombre, $usucontrasena, $usurolid);
        $gestorUsuarios = new GestorUsuarios();
        $resultado = $gestorUsuarios->modificarusuario($usuario);
        return $resultado;
    }
    public function eliminarusuario($usuid){        
        $gestorUsuarios = new GestorUsuarios();
        $resultado = $gestorUsuarios->eliminarusuario($usuid);
        return $resultado;
    }
    public function comprobarSesion(){
        if(!isset($_SESSION['nom'])){
           return false;
        }else{
            return true;
        }
    }

      //-CONTROLADOR DE PROVEDORES--------------------------------------------------------
    public function agregarproveedor($proid, $pronombre, $prodireccion, $prociudad, $proemail, $protelefono){
        $proveedor = new proveedor($proid, $pronombre, $prodireccion, $prociudad, $proemail, $protelefono);
        $gestorproveeedor = new Gestorproveedor();
        $resultado = $gestorproveeedor->agregarproveedor($proveedor);
        return $resultado;
    }
    public function modificarproveedor($proid, $pronombre, $prodireccion, $prociudad, $proemail, $protelefono){
        $proveedor = new proveedor($proid, $pronombre, $prodireccion, $prociudad, $proemail, $protelefono);
        $gestorproveeedor = new Gestorproveedor();
        $resultado = $gestorproveeedor->modificarproveedor($proveedor);
        return $resultado;
    }
    public function eliminarproveedor($proid){
        $gestorproveedor = new Gestorproveedor();
        $resultado = $gestorproveedor->eliminarproveedor($proid);
        return $resultado;
    }
    public function listaproveedores(){
        $gestorproveedor = new Gestorproveedor();
        $resultado = $gestorproveedor->listaproveedores();
        return $resultado;
    }
    //aqui termina controlador de proveedores-------------------------------------------

     //-CONTROLADOR DE PRODUCTOS--------------------------------------------------------
     public function agregarproducto($prodid, $prodnombre, $prodprecio, $produnimedida, $prodstock){
        $productos = new productos($prodid, $prodnombre, $prodprecio, $produnimedida, $prodstock);
        $gestorproductos = new Gestorproductos();
        $resultado = $gestorproductos->agregarProducto($productos);
        return $resultado;
    }
    public function modificarProducto($prodid, $prodnombre, $prodprecio, $produnimedida, $prodstock){
        $productos = new productos($prodid, $prodnombre, $prodprecio, $produnimedida, $prodstock);
        $gestorproductos = new Gestorproductos();
        $resultado = $gestorproductos->modificarProducto($productos);
        return $resultado;
    }
    public function eliminarproducto($prodid){
        $gestorproductos = new Gestorproductos();
        $resultado = $gestorproductos->eliminarproducto($prodid);
        return $resultado;
    }
    public function listaproductos(){
        $gestorproductos = new Gestorproductos();
        $resultado = $gestorproductos->listaproductos();
        return $resultado;
    }
    public function totalProductosStock(){
        $gestorProductos = new GestorProductos();
        $resultado = $gestorProductos->totalProductosStock();
        return $resultado;
    }
    //aqui termina controlador de productos-------------------------------------------

    public function agregarCompra($comid, $comnumcomprobante, $comvalor_total, $comdescripcion, $comfechacompra, $comproid, $comusuid){
        $compras = new compras($comid, $comnumcomprobante, $comvalor_total, $comdescripcion, $comfechacompra, $comproid, $comusuid);
        $gestorCompras = new GestorCompras();
        $resultado = $gestorCompras->agregarCompra($compras);
        return $resultado;
    }
    public function modificarCompra($comid, $comnumcomprobante, $comvalor_total, $comdescripcion, $comfechacompra, $comproid, $comusuid){
        $compras = new Compras($comid, $comnumcomprobante, $comvalor_total, $comdescripcion, $comfechacompra, $comproid, $comusuid);
        $gestorCompras= new GestorCompras();
        $resultado = $gestorCompras->modificarCompra($compras);
        return $resultado;
    }
    public function eliminarCompra($comid){
        $gestorCompras = new GestorCompras();
        $resultado = $gestorCompras->eliminarCompra($comid);
        return $resultado;
    }
    public function listacompras(){
        $gestorcompras = new Gestorcompras();
        $resultado = $gestorcompras->listacompras();
        return $resultado;
    }

    //controlador ventas------------------------------------------------
    public function agregarVentas($venid, $vennumfactura, $venfechaventa, $venvalor_total, $venestado, $vencliid, $venusuid){
        $ventas = new ventas($venid, $vennumfactura, $venfechaventa, $venvalor_total, $venestado, $vencliid, $venusuid);
        $gestorVentas = new GestorVentas();
        $resultado = $gestorVentas->agregarVentas($ventas);
        return $resultado;
    }
    public function modificarVenta($venid, $vennumfactura, $venfechaventa, $venvalor_total, $venestado, $vencliid, $venusuid){
        $ventas = new ventas($venid, $vennumfactura, $venfechaventa, $venvalor_total, $venestado, $vencliid, $venusuid);
        $gestorVentas = new GestorVentas();
        $resultado = $gestorVentas->modificarVenta($ventas);
        return $resultado;
    }
    public function eliminarVenta($venid){
        $gestorVentas = new GestorVentas();
        $resultado = $gestorVentas->eliminarVenta($venid);
        return $resultado;
    }
    public function listaVentas(){
        $gestorVentas = new GestorVentas();
        $resultado = $gestorVentas->listaVentas();
        return $resultado;
 } 
  //controlador ventasxproducto------------------------------------------------
  public function agregarventaxproducto($cantidad, $precio, $id_producto, $id_venta){
    $ventaxproducto = new ventaxproducto($cantidad, $precio, $id_producto, $id_venta);
    $gestorventaxproducto = new Gestorventaxproducto();
    $resultado = $gestorventaxproducto->agregarventaxproducto($ventaxproducto);
    return $resultado;
}
 // aqui termina controlador-------------------------------------------------------------   
    
}
