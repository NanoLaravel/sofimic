<?php if($sesion == false){
        header('Location: ../loguin.php');
    }else{ ?>
<!doctype html>

<html lang="es">

<head>
  <title>Facturación</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Bootstrap CSS -->
  
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

</head>

<body>  

    
    <div class="container">
    <?php include ( 'vistas/header.php');?> 

    <section>
       <div class="row">
            <div class="col-lg-2 text-center" style="background-color:#fcd241;">
                  <?php include ('vistas/menu.php');?> 
              </div>
           <div class="col-lg-10 pt-2"style="background-color:#eed3ca">
              <h4><b>FACTURAS</b></h4>
          
                 
               <div class="row">
                  
                  <div class="col-sm-4 ">
                     
              
             
                 <div>
                  
          
                 <form method="POST" action="facturas.php">           
              
                        <div id="formulario">
                            
                             <label for="idcliente">id del cliente</label>
                             <!--<input type="hidden" name= "accion" value="insertar"> -->
                             <input type="int"  id="numero" placeholder="Escriba el id del cliente" name="idcli">
                             <button type="button"  onclick="consultarCliente();" class="btn btn-primary" >buscar </button>

                           
    </div>
                       </div>
                 </div>
             
                    <div class="col-sm-8" id="mostrarDatos">
                      informacion del cliente: 
                      </div>
                   
                     
                 </div>
                  <hr></hr>

                  
                  <!-- formulario factura------------->

                   
                  <?php 
                  $listaPro = $controlador->listaProductos();
           if ($listaPro == true) {
                    
            if($listaPro): foreach($listaPro as $producto): 
                
                $id = $producto['prodid'];
                $nombre = $producto['prodnombre'];
                $precio = $producto['prodprecio'];
                $medida = $producto['produnimedida'];
                $stock = $producto['prodstock'];
                 endforeach;
                ?>
               <div class= "row">
                <div class= " col-lg-4">
                  <div class="modal-body">
                      
             <div class="form-group">
                    <label for="recipient-name" class="col-form-label">lista de productos:</label>
                    <select required class="form-control selectpicker" data-live-search="true" name="producto" id="producto" data-size="5">
                          <?php foreach($listaPro as $lis):?> 
                        <option value="<?php echo $lis['prodid']; ?>"><?php echo $lis['prodnombre'], '  $', $lis['prodprecio']; ?></option>
                      
                            <?php endforeach;?>
                      
                    </select>
             </div>
                </div>
                </div>
          
               
                   <div class="col-lg-4">
                      <button type= "button" onclick= "agregarProductos()"; class="btn btn-primary mt-5">agregar</button>
                   </div>
                   <div>
                       <label class="col-lg-4" for="recipient-name"> cantidad:</label>                
                       <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="cantidad de productos"></input>           
                   </div>
                   </div>
             

        <hr>
        <table class="table table-responsive-md" id="tablaProductos">
           <thead>
             <tr>
               <th>nombre del producto</th>
               <th>cantidad</th>
               <th>precio</th>
               <th>sub total</th>
               <th>acciones</th>
             </tr>

           
           
           </thead>
           <tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>              
              </tr> 
           </tbody>
       </table> 
<hr>              
   
   <div>
     <button type= "submit" name="submit" class="btn btn-danger mt-5">enviar factura</button>
      <?php require 'error.msn.php'; ?>
   </div>
                                  
</form>
</div>
 </div>
 </div>
 
   
 </div>
 </div>
  

   
       
       </section>
       <?php include ( 'vistas/footer.php');?>


        
        </div>      

              
      

  
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>              
    <script>
$(document).ready(function() {
    
    $('select').selectpicker();

  });





function agregarProductos(){
    
    let idproducto = document.getElementById('producto').value;    
    let cantidad = document.getElementById('cantidad').value;
    let producto = $('#producto :selected ').text();
    let productoCompleto = producto.split("$");
   
    let nombre= productoCompleto[0];
    let precio= productoCompleto[1];
    let total= precio * cantidad;

$('#tablaProductos').append(" <tr id='producto"+idproducto+"'>\
<td>\
<input type='hidden' name='idproducto' value='"+idproducto+"'>\
<input type='hidden' name='nombreproducto' value='"+nombre+"'>"+nombre+"</td>\
<td><input type='hidden' name='cantidadproducto' value='"+cantidad+"'>"+cantidad+"</td>\
<td><input type='hidden' name='precioproducto' value='"+precio+"'>"+precio+"</td>\
<td><input type='hidden' name='totalproducto' value='"+total+"'>"+total+"</td>\
<td ><i onclick='borrarproducto("+idproducto+");' class='far fa-trash-alt'></i>Borrar</td>\
</tr>");
}

function borrarproducto(id){
                 $('#producto'+id+'').remove();
}




</script>
<script>
   function consultarCliente(){
   var datico= document.getElementById("numero").value;
   alert("el id es :"+datico)
   console.log(datico);
   /*var formulario= document.getElementById('formulario');
   
  console.log(typeof formulario);
formulario.addEventListener('submit',  function(e){
   e.preventDefault();
   console.log("disde click")
   
   var datos= new FormData(formulario);
  
   console.log(datos);
   console.log(datos.get('idcli'));
   var midato= (datos.get('idcli'));

   console.log(midato);

  

  //var datico= document.getElementById("numero"); 
  var mostrar= document.getElementById("mostrarDatos");*/
  var datico;
  fetch('http://localhost/sofimic/facturas2.php', {
     method: 'POST',
     header:{
'content-type': 'application/json'
     },
   body:datico
   
  }) 
      .then(resp=>resp.json())
       
      .then(data=>{
         console.log(data)
         if (data==='error'){
            mostrarDatos.innerHTML= `
            <div class= "alert alert-danger" role="alert">
             no se ha encontrado informacion del cliente
            </div>`
        }else{
           console.log (data)
           console.log(typeof data);
            mostrarDatos.innerHTML= `
            <div class= "alert alert-primary" role="alert">
           nombre: ${data[0]} <br>
           direccion: ${data[1]}<br>
           ciudad: ${data[2]} <br>
           email: ${data[3]} <br>
           telefono: ${data[4]}
            </div>`
           data[0]
           
        }
      }) ;
     
    } ;




  
</script>




</body>



</html>
<?php endif;?>
<?php } ?>

<?php } ?>