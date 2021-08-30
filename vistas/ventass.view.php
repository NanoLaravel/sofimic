<?php if($sesion == false){
        header('Location: ../loguin.php');
    }else{ ?>
<!doctype html>
<html lang="es">
  <head>
    <title>ventas</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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
            <h4>modulo ventas</h4>
            <?php if($_SESSION['usurol'] == '1' ){?>

           
            <div class="dropdown">
            <button class= "btn btn-primary dropdown-toggle" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               venta nueva
               <span class="caret"></span>
            </button> 
              
  
             <ul class="dropdown-menu" aria-labelledby="dlabel">
               <li><a class="dropdown-item" href="VISTAS/factura.view.php">venta de producto</a></li>
               <li><a class="dropdown-item" href="#">venta servicio de costuras</a></li>
               <li><a class="dropdown-item" href="#">venta por abonos</a></li>
             </ul>
  
 
    
            <?php } require 'error.msn.php'; ?>
            
            
            <div class="table-responsive">
          <form class="form-inline my-2" id="search">
          <label class="">Buscar:</label>
          <div class="col-md-2">
            <input class="form-control" id="tableSearch" type="text" placeholder="Buscar">
         </div>
       </form>


          
            <table id= "tabla" class="table table-bordered table-dark">
             <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col"># Factura</th>
                <th scope="col">fecha Venta</th>
                
                <th scope="col">cliente</th>
                
                <th scope="col">valortotal</th>
                <th scope="col">c. productos</th>
                <th scope="col">acciones</th>
                
              </tr>
             </thead>
            <tbody id= "table">
            <?php 
                if($resultado): foreach($resultado as $ventas): 
                $contador += 1;
                $venid = $ventas['venid'];
                $vennumfactura = $ventas['vennumfactura'];
                $venfechaventa = $ventas['venfechaventa'];
                
                $venestado = $ventas['venestado'];
                $vencliid = $ventas['vencliid'];
                $venusuid = $ventas['venusuid'];
                
                
                ?>
              <tr>
                <th scope="row"><?php echo $contador; ?></th>
                <td><?php echo $vennumfactura; ?></td>
                <td><?php echo $venfechaventa; ?></td>
                
                <td><?php echo $venestado; ?></td>
                <td><?php echo $venestado; ?></td>
                <td><?php echo $venestado; ?></td>


                
                <td>
                <?php   if($_SESSION['usurol'] == '1'){?>
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#ediven" data-id="<?php echo $venid; ?>" data-num="<?php echo $vennumfactura; ?>" data-fec="<?php echo $venfechaventa; ?>" data-val="<?php echo $venvalor_total; ?>" data-est="<?php echo $venestado; ?>" data-vencliid = "<?php echo $vencliid; ?>" data-venusuid = "<?php echo $venusuid; ?>">editar</button>
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#eliven" data-id="<?php echo $venid; ?>" data-num="<?php echo $vennumfactura; ?>">eliminar</button>
                </td>
                <?php } ?>
                
              </tr>
              <?php  endforeach; endif; ?>
 
            </tbody>
            </table>
          </div>

<div class="modal fade" id="ingven" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nueva venta</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
        <div class="modal-body">
              <form method="post" action="ventas.php">
              <input type="hidden" name="proceso" value="ingresar">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">numero factura:</label>
                  <input type="int" required name="vennumfactura" placeholder="ingrese el numero de factura" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">fecha venta:</label>
                  <input  type="date" required name="venfechaventa" placeholder="ingrese la fecha" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">valor total:</label>
                  <input  type="int" required name="venvalor_total" placeholder="ingrese el valor total" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">estado:</label>
                  <input  type="text" required name="venestado" placeholder="ingrese el estado" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">id_cliente:</label>
                  <input  type="int" required name="vencliid" placeholder="ingrese el estado" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">id_usuario:</label>
                  <input  type="int" required name="venusuid" placeholder="ingrese el estado" class="form-control" id="recipient-name">
                </div>
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" name = "submit" value = "ingresar" class="btn btn-primary">enviar</button>
         
              </form>
        </div>
    
      </div>
  </div>
</div>

<div class="modal fade" id="ediven" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar venta: </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >      
        <form method="post" action="ventas.php">        
        <input type="hidden" id="id" name="venid">
          
          <div class="form-group" >
            <label for="recipient-name" class="col-form-label">numero de factura:</label>
            <input id="num" type="int" required name="vennumfactura2" placeholder="ingrese el numero de factura:" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">fecha venta:</label>
            <input id="fec" type="date" required name="venfechaventa2" placeholder="ingrese la fecha" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">valor total:</label>
            <input id="val" type="int" required name="venvalor_total2" placeholder="ingrese el valor total" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">estado:</label>
            <input id="est" type="text" required name="venestado2" placeholder="ingrese el estado" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">vencliid:</label>
            <input id="vencliid" type="int" required name="vencliid2" placeholder="ingrese el id cliente" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">venusuid:</label>
            <input id="venusuid" type="int" required name="venusuid2" placeholder="ingrese el id usuario" class="form-control" id="recipient-name">
          </div>
          
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" name ="submit" value= "modificar" >guardar cambios</button>
         
        </form>
      </div>
    
    </div>
  </div>
</div>
<div>

<!-- Modal -->
<div class="modal fade" id="eliven" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">eliminar venta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="ventas.php" method ="POST">
                            <input type="hidden" name="proceso" value="eliminar">
                            <input id= "id" type="hidden" name="venid">
                            <div class="modal-body">
                                <p>Va a eliminar una venta ¿Está seguro?</p>
                            </div>    
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary" name= "submit" value= "eliminar">Eliminar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No Eliminar</button>
                            </div>
        </form>   
      </div>
      
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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
 


$(document).ready(function(){
  $("#tableSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#table tr").filter(function() {
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
       $('#ediven').on('show.bs.modal', function (event) {
       var button = $(event.relatedTarget) // Button that triggered the modal
       
       var id = button.data('id')
       var num = button.data('num') 
       var fec = button.data('fec') 
       var val = button.data('val')
       var est = button.data('est')
       var vencliid = button.data('vencliid')
       var venusuid = button.data('venusuid') 
       
       // Extract info from data-* attributes
       // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
       // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
       var modal = $(this)
       modal.find('.modal-title').text('editar venta: ' + num)
      
       modal.find('.modal-body #id').val(id)
       modal.find('.modal-body #num').val(num)
       modal.find('.modal-body #fec').val(fec)
       modal.find('.modal-body #val').val(val)
       modal.find('.modal-body #est').val(est)
       modal.find('.modal-body #vencliid').val(vencliid)
       modal.find('.modal-body #venusuid').val(venusuid)
       
       
})
$('#eliven').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var num = button.data('num')
            var modal = $(this)
            modal.find('.modal-title').text('Eliminar venta ' + num)
            modal.find('.modal-body #id').val(id)
            })
            
            
            
            

</script> 
<script>$('.dropdown-toggle').dropdown()</script>
  </body>
</html>
<?php } ?>