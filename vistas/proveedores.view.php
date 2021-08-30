<?php if($sesion == false){
        header('Location: ../loguin.php');
    }else{ ?>
<!doctype html>
<html lang="es">
  <head>
    <title>proveedores</title>
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
            <h4>modulo proveedores</h4>
            <?php if($_SESSION['usurol'] == '1' ){?>

            <button type="button" class="btn btn-primary mt-3 mb-3" data-toggle="modal" data-target="#ingprov" data-whatever="@mdo">nuevo proveedor</button>
            <?php } require 'error.msn.php'; ?>

            <div class="table-responsive">
          
            <table id="tablaProveedores" class="table table-bordered table-dark">
             <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">nombres</th>
                <th scope="col">direccion</th>
                <th scope="col">ciudad</th>
                <th scope="col">email</th>
                <th scope="col">telefono</th>                
                <th scope="col">acciones</th>
              </tr>
             </thead>
            <tbody id= "table">
            <?php 
                if($resultado): foreach($resultado as $proveedor): 
                $contador += 1;
                $proid = $proveedor['proid'];
                $pronombre = $proveedor['pronombre'];
                $prodireccion = $proveedor['prodireccion'];
                $prociudad = $proveedor['prociudad'];
                $proemail = $proveedor['proemail'];
                $protelefono = $proveedor['protelefono'];
                
                ?>
                <tr>
                  <th scope="row"><?php echo $contador; ?></th>
                  <td><?php echo $pronombre; ?></td>
                  <td><?php echo $prodireccion; ?></td>
                  <td><?php echo $prociudad; ?></td>
                  <td><?php echo $proemail; ?></td>
                  <td><?php echo $protelefono; ?></td>
                  <td>
                 <?php   if($_SESSION['usurol'] == '1'){?>
            
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#ediprov"data-id="<?php echo $proid; ?>" data-nom="<?php echo $pronombre; ?>" data-dir="<?php echo $prodireccion; ?>" data-ciu="<?php echo $prociudad; ?>" data-email="<?php echo $proemail; ?>" data-tel="<?php echo $protelefono; ?>" >editar</button>
                 <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#eliprov" data-id="<?php echo $proid; ?>" data-nom="<?php echo $pronombre; ?>">eliminar</button> 
                 </td>               
                 <?php } ?>
              </tr>
              <?php  endforeach; endif; ?>
 
            </tbody>
            </table>
          </div>

<div class="modal fade" id="ingprov" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo proveedor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
        <div class="modal-body">
              <form method="post" action="proveedores.php">
              <input type="hidden" name="proceso" value="ingresar">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">nombres:</label>
                  <input type="text" required name="pronombre" placeholder="ingrese su nombre" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">direccion:</label>
                  <input  type="text" required name="prodireccion" placeholder="ingrese la direccion" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">ciudad:</label>
                  <input  type="text" required name="prociudad" placeholder="ingrese la ciudad" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">email:</label>
                  <input  type="text" name="proemail" placeholder="ingrese su email" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">telefono:</label>
                  <input  type="text" name="protelefono" placeholder="ingrese su telefono" class="form-control" id="recipient-name">
                </div>
               
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" name= "submit" value= "ingresar" class="btn btn-primary">enviar</button>
         
              </form>
        </div>
    
      </div>
  </div>
</div>

<div class="modal fade" id="ediprov" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">modificar Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >      
        <form method="post" action="proveedores.php">        
        <input type="hidden" id="id" name="proid">
          
          <div class="form-group" >
            <label for="recipient-name" class="col-form-label">Nombres:</label>
            <input id="nom" type="text" required name="pronombre" placeholder="ingrese el nombre" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">direccion:</label>
            <input id="dir" type="text" required name="prodireccion" placeholder="ingrese la direccion" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">ciudad:</label>
            <input id="ciu" type="text" required name="prociudad" placeholder="ingrese la ciudad" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">email:</label>
            <input id="email" type="email" required name="proemail" placeholder="ingrese su email" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">telefono:</label>
            <input id="tel" type="text" required name="protelefono" placeholder="ingrese el telefono" class="form-control" id="recipient-name">
          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" name ="submit" value= "modificar">guardar cambios</button>
         
        </form>
      </div>
    
    </div>
  </div>
</div>
<div>

<!-- Modal -->
<div class="modal fade" id="eliprov" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">eliminar proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="proveedores.php" method ="POST">
                            <input type="hidden" name="proceso" value="eliminar">
                            <input id="id" type="hidden" name="proid">
                            <div class="modal-body">
                                <p>Va a eliminar un proveedor ¿Está seguro?</p>
                            </div>    
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" value="eliminar">Eliminar</button>
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
    $('#tablaProveedores').DataTable({        
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

       $('#ediprov').on('show.bs.modal', function (event) {
       var button = $(event.relatedTarget) // Button that triggered the modal
       var id = button.data('id') 
       var nom = button.data('nom')
       var dir = button.data('dir')  
       var ciu = button.data('ciu')
       var email = button.data('email') 
       var tel = button.data('tel') 
        
       // Extract info from data-* attributes
       // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
       // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
       var modal = $(this)
       modal.find('.modal-title').text('modificar proveedor  ' + nom)
       modal.find('.modal-body #id').val(id)
       modal.find('.modal-body #nom').val(nom)
       modal.find('.modal-body #dir').val(dir)
       modal.find('.modal-body #ciu').val(ciu)
       modal.find('.modal-body #email').val(email)
       modal.find('.modal-body #tel').val(tel)
      })
      
       $('#eliprov').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var nom = button.data('nom')
            var modal = $(this)
            modal.find('.modal-title').text('Eliminar proveedor ' + nom)
            modal.find('.modal-body #id').val(id)
            })
       
</script> 
  </body>
</html>
<?php } ?>