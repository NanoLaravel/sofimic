<?php if($sesion == false){
        header('Location: ../loguin.php');
    }else{ ?>
<!doctype html>
<html lang="es">
  <head>
    <title>usuarios</title>
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
       
            <h4>modulo usuarios</h4>
            <?php if($_SESSION['usurol'] == '1' ){?>

            <button type="button" class="btn btn-primary mt-3 mb-3" data-toggle="modal" data-target="#ingusu" data-whatever="@mdo">nuevo usuario</button>
            <?php } require 'error.msn.php'; ?>
            
            <div class="table-responsive">
          <form class="form-inline my-2" id="search">
          <label class="">Buscar:</label>
          <div class="col-md-2">
            <input class="form-control" id="tableSearch" type="text" placeholder="Buscar">
         </div>
       </form>
       


          <div class="table-responsive">
            <table class="table table-bordered table-dark">
             <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">nombre</th>
                <th scope="col">contraseña</th>
                <th scope="col">rol</th>
                
                
              </tr>
             </thead>
            <tbody id= "table">
            <?php 
                if($resultado): foreach($resultado as $usuarios): 
                $contador += 1;
                $usuid = $usuarios['usuid'];
                $usunombre = $usuarios['usunombre'];
                $usucontrasena = $usuarios['usucontrasena'];
                $usurolid = $usuarios['usurolid'];                              
                ?>
             
             <tr>
                <th scope="row"><?php echo $contador; ?></th>
                <td><?php echo $usunombre; ?></td>
                <td><?php echo $usucontrasena; ?></td>
                <td><?php echo $usurolid; ?></td>
                
                
                <td>
                <?php   if($_SESSION['usurol'] == '1'){?>
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#ediusu" data-id= "<?php echo $usuid; ?>" data-nom="<?php echo $usunombre; ?>" data-con="<?php echo $usucontrasena; ?>" data-rol="<?php echo $usurolid; ?>">editar</button>
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#eliusu" data-id= "<?php echo $usuid; ?>" data-nom="<?php echo $usunombre; ?>">eliminar</button>
                </td>
                <?php } ?>
              </tr>
              <?php  endforeach; endif; ?>
 
            </tbody>
            </table>
          </div>

<div class="modal fade" id="ingusu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
        <div class="modal-body">
              <form method="post" action="usuarios.php">
              <input type="hidden" name="proceso" value="ingresar">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">nombre:</label>
                  <input type="text" required name="usunombre" placeholder="ingrese su nombre" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">contraseña:</label>
                  <input  type="password" required name="usucontrasena" placeholder="ingrese la contraseña" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> rol:</label>
                  <input  type="text" required name="usurol" placeholder="ingrese su rol" class="form-control" id="recipient-name">
                </div>                
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" name= "submit" value= "ingresar" class="btn btn-primary">enviar</button>
         
              </form>
        </div>
    
      </div>
  </div>
</div>

<div class="modal fade" id="ediusu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar usuario: </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >      
        <form method="post" action="usuarios.php">        
        <input type="hidden" id="id" name="usuid">
          
          <div class="form-group" >
            <label for="recipient-name" class="col-form-label">nombre:</label>
            <input id="nom" type="text" required name="usunombre" placeholder="ingrese el nombre:" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">contraseña:</label>
            <input id="con" type="password" required name="usucontrasena" placeholder="ingrese la contraseña" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">usuario rol:</label>
            <input id="rol" type="int" required name="usurolid" placeholder="ingrese su rol" class="form-control" id="recipient-name">
          </div>
          
          
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" name= "submit" value= "modificar">guardar cambios</button>
         
        </form>
      </div>
    
    </div>
  </div>
</div>
<div>

<!-- Modal -->
<div class="modal fade" id="eliusu" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">eliminar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="usuarios.php" method ="POST">
                            <input type="hidden" name="proceso" value="eliminar">
                            <input id= "id" type="hidden" name="usuid">
                            <div class="modal-body">
                                <p>Va a eliminar un usuario ¿Está seguro?</p>
                            </div>    
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" value= "eliminar">Eliminar</button>
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
       $('#ediusu').on('show.bs.modal', function (event) {
       var button = $(event.relatedTarget) // Button that triggered the modal
       var id = button.data('id')
       var nom = button.data('nom') 
       var con = button.data('con') 
       var rol = button.data('rol')
        
       
       // Extract info from data-* attributes
       // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
       // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
       var modal = $(this)
       modal.find('.modal-title').text('editar usuario: ' + nom)
       modal.find('.modal-body #id').val(id)
       modal.find('.modal-body #nom').val(nom)
       modal.find('.modal-body #con').val(con)
       modal.find('.modal-body #rol').val(rol)
       
       
       
})
$('#eliusu').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var nom = button.data('nom')
            var modal = $(this)
            modal.find('.modal-title').text('Eliminar usuario ' + nom)
            modal.find('.modal-body #id').val(id)
            })

</script> 
  </body>
</html>
<?php } ?>