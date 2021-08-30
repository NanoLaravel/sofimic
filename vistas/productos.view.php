<?php if($sesion == false){
        header('Location: ../loguin.php');
    }else{ ?>
<!doctype html>
<html lang="es">
  <head>
    <title>productos</title>
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
            <h4>modulo productos</h4>
            <?php if($_SESSION['usurol'] == '1' ){?>

            <button type="button" class="btn btn-primary mt-3 mb-3" data-toggle="modal" data-target="#ingprod" data-whatever="@mdo">nuevo producto</button>
            <?php } require 'error.msn.php'; ?>
            
            <div class="table-responsive">
         

          
            <table id="tablaProductos" class="table table-bordered table-dark">
             <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">nombre</th>
                <th scope="col">precio</th>
                <th scope="col">unidad de medida</th>
                <th scope="col">stock</th>
                <th scope="col">acciones</th>
               
              </tr>
             </thead>
            <tbody id= "table">
            <?php 
                if($resultado): foreach($resultado as $productos): 
                $contador += 1;
                $prodid = $productos['prodid'];
                $prodnombre = $productos['prodnombre'];
                $prodprecio = $productos['prodprecio'];
                $produnimedida = $productos['produnimedida'];
                $prodstock = $productos['prodstock'];
                
                
                ?>
              <tr>
                <th scope="row"><?php echo $contador; ?></th>
                <td><?php echo $prodnombre; ?></td>
                <td><?php echo $prodprecio; ?></td>
                <td><?php echo $produnimedida; ?></td>
                <td><?php echo $prodstock; ?></td>

                <td>
                <?php   if($_SESSION['usurol'] == '1'){?>
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#ediprod" data-id="<?php echo $prodid; ?>" data-nom="<?php echo $prodnombre; ?>" data-pre="<?php echo $prodprecio; ?>" data-uni="<?php echo $produnimedida; ?>" data-stock="<?php echo $prodstock; ?>" >modificar</button>
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#eliprod" data-id="<?php echo $prodid; ?>" data-nom="<?php echo $prodnombre; ?>">eliminar</button>
                </td>
                <?php } ?>
              </tr>
              <?php  endforeach; endif; ?>
 
            </tbody>
            </table>
          </div>

<div class="modal fade" id="ingprod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
        <div class="modal-body">
              <form method="post" action="productos.php">
              <input type="hidden" name="proceso" value="ingresar">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">nombre:</label>
                  <input type="text" required name="prodnom" placeholder="ingrese el nombre" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">precio:</label>
                  <input  type="int" required name="prodpre" placeholder="ingrese el precio" class="form-control" id="recipient-name">
                </div>
                
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">unidad de medida:</label>
                  <input  type="text" name="produni" placeholder="ingrese la unidad de medida" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">stock:</label>
                  <input  type="int" name="prodstock" placeholder="ingrese la cantidad en stock" class="form-control" id="recipient-name">
                </div>
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" name= "submit" value= "ingresar" class="btn btn-primary">enviar</button>
         
              </form>
        </div>
    
      </div>
  </div>
</div>

<div class="modal fade" id="ediprod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Producto: </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">      
        <form method="post" action="productos.php">
        <input type="hidden" id= "id" name="prodid">
        
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input id="nom" type="text" required name="prodnom" placeholder="ingrese el nombre" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">precio:</label>
            <input id="pre" type="int" required name="prodpre" placeholder="ingrese el precio" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">unidad de medida:</label>
            <input id="uni" type="text" required name="produni" placeholder="ingrese la unidad de medida" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">stock:</label>
            <input id="stock" type="int" required name="prodstock" placeholder="ingrese la cantidad en stock" class="form-control" id="recipient-name">
          </div>
          
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" name="submit" value="modificar">guardar cambios</button>
         
        </form>
      </div>
    
    </div>
  </div>
</div>
<div>

<!-- Modal -->
<div class="modal fade" id="eliprod" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">eliminar producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="productos.php" method ="POST">
                            <input type="hidden" name="proceso" value="eliminar">
                            <input id="id" type="hidden" name="prodid">
                            <div class="modal-body">
                                <p>Va a eliminar un producto ¿Está seguro?</p>
                            </div>    
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary"name="submit" value="eliminar"> Eliminar</button>
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

$(document).ready(function() {    
    $('#tablaProductos').DataTable({        
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            },
          
    });     
});

$('select').selectpicker();


       $('#ediprod').on('show.bs.modal', function (event) {
       var button = $(event.relatedTarget) // Button that triggered the modal
       var id = button.data('id')
       var nom = button.data('nom') 
       var pre = button.data('pre') 
       var uni = button.data('uni')
       var stock = button.data('stock') 
        
       // Extract info from data-* attributes
       // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
       // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
       var modal = $(this)
       modal.find('.modal-title').text('editar producto: ' + nom)
       modal.find('.modal-body #id').val(id)
       modal.find('.modal-body #nom').val(nom)
       modal.find('.modal-body #pre').val(pre)
       modal.find('.modal-body #uni').val(uni)
       modal.find('.modal-body #stock').val(stock)
       
       
})
$('#eliprod').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var nom = button.data('nom')
            var modal = $(this)
            modal.find('.modal-title').text('Eliminar producto ' + nom)
            modal.find('.modal-body #id').val(id)
            })

</script> 
  </body>
</html>
<?php } ?>