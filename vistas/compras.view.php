<?php if($sesion == false){
        header('Location: ../loguin.php');
    }else{ ?>
<!doctype html>
<html lang="es">
  <head>
    <title>compras</title>
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
            <h4>modulo compras</h4>
            <?php if($_SESSION['usurol'] == '1' ){?>

            <button type="button" class="btn btn-primary mt-3 mb-3" data-toggle="modal" data-target="#ingcom" data-whatever="@mdo">nueva compra</button>
            <?php } require 'error.msn.php'; ?>
            
            
            <div class="table-responsive">
          <form class="form-inline my-2" id="search">
          
          <label class="">Buscar:</label>
          <div class="col-md-2">
            <input class="form-control" id="tableSearch" type="text" placeholder="Buscar">
         </div>
       </form>


          
            <table id = "table" class="table table-bordered table-dark">
             <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">numero de compra</th>
                <th scope="col">valor total</th>
                <th scope="col">descripcion</th>
                <th scope="col">fecha compra</th>
               <!-- <th scope="col">id producto</th>
                <th scope="col">id usuario</th>-->
                <th scope="col">acciones</th>
                
              </tr>
             </thead>
            <tbody id= "table">
            <?php 
                if($resultado): foreach($resultado as $compras): 
                  $contador += 1;
                  $comid = $compras['comid'];
                  $comnumcomprobante = $compras['comnumcomprobante'];
                  $comvalor_total = $compras['comvalor_total'];
                  $comdescripcion = $compras['comdescripcion'];
                  $comfechacompra = $compras['comfechacompra'];
                  $comproid = $compras['comproid'];
                  $comusuid = $compras['comusuid'];

            ?>
                  
              <tr>
                <th scope="row"><?php echo $contador; ?></th>
                <td><?php echo $comnumcomprobante; ?></td>
                <td><?php echo $comvalor_total; ?></td>
                <td><?php echo $comdescripcion; ?></td>
                <td><?php echo $comfechacompra; ?></td>
                <!--<td><?php echo $comproid; ?></td>
                <td><?php echo $comusuid; ?></td>-->
                
                <td>
                <?php if($_SESSION['usurol'] == '1'){?>
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#edicom" data-id="<?php echo $comid; ?>" data-num="<?php echo $comnumcomprobante; ?>"data-val="<?php echo $comvalor_total; ?>" data-des="<?php echo $comdescripcion; ?>" data-fec="<?php echo $comfechacompra; ?>" data-proid="<?php echo $comproid; ?>" data-usuid="<?php echo $comusuid; ?>">editar</button>
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#elicom" data-id="<?php echo $comid; ?>" data-num="<?php echo $comnumcomprobante; ?>">eliminar</button>
                </td>
                <?php } ?>
                
              </tr>
              <?php endforeach; endif; ?>
 
            </tbody>
            </table>
          </div>

<div class="modal fade" id="ingcom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nueva compra</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
        <div class="modal-body">
              <form method="post" action="compras.php">
              <input type="hidden" name="proceso" value="ingresar">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">numero compra:</label>
                  <input id="num" type="int" required name="num" placeholder="ingrese el numero de compra" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">valor total:</label>
                  <input id="val" type="int" required name="val" placeholder="ingrese el valor total" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> descripcion:</label>
                  <input  id="des" type="text" required name="des" placeholder="haga una descripcion" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">fecha:</label>
                  <input id="fecha" type="date" required name="fecha" placeholder="ingrese la fecha" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">id producto:</label>
                  <input id="comproid" type="int" required name="comproid" placeholder="ingrese el id producto" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">id usuario:</label>
                  <input id="comusuid" type="int" required name="comusuid" placeholder="ingrese el id usuario" class="form-control" id="recipient-name">
                </div>
                
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" name ="submit" value="ingresar" class="btn btn-primary">enviar</button>
         
              </form>
        </div>
    
      </div>
  </div>
</div>

<div class="modal fade" id="edicom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar compra: </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >      
        <form method="post" action="compras.php">        
        <input type="hidden" id="id" name="comid">
          
          <div class="form-group" >
            <label for="recipient-name" class="col-form-label">numero de compra:</label>
            <input id="num" type="int" required name="num" placeholder="ingrese el numero de compra:" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">valor total:</label>
            <input id="val" type="int" required name="val" placeholder="ingrese el valor total" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">descripcion:</label>
            <input id="des" type="text" required name="des" placeholder="haga una descripcion" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">fecha:</label>
            <input id="fecha" type="date" required name="fecha" placeholder="ingrese la fecha" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">id producto:</label>
            <input id="comproid" type="int" required name="comproid" placeholder="ingrese el id producto" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">id usuario:</label>
            <input id="comusuid" type="int" required name="comusuid" placeholder="ingrese el id usuario" class="form-control" id="recipient-name">
          </div>
          
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary"name= "submit" value="modificar">guardar cambios</button>
         
        </form>
      </div>
    
    </div>
  </div>
</div>
<div>

<!-- Modal -->
<div class="modal fade" id="elicom" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">eliminar compra</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="compras.php" method ="POST">
                            <input type="hidden" name="proceso" value="eliminar">
                            <input id= "id" type="hidden" name="comid" >
                            <div class="modal-body">
                                <p>Va a eliminar una compra ¿Está seguro?</p>
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
    
    <script>

$(document).ready(function(){
  $("#tableSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#table tr").filter(function() {
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
       $('#edicom').on('show.bs.modal', function (event) {
       var button = $(event.relatedTarget) // Button that triggered the modal
       var id = button.data('id')
       var num = button.data('num') 
       var val = button.data('val') 
       var des = button.data('des')
       var fecha = button.data('fecha')
       var comproid = button.data('comproid')
       var comusuid = button.data('comusuid') 
       
       // Extract info from data-* attributes
       // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
       // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
       var modal = $(this)
       modal.find('.modal-title').text('editar compra: ' + num)
       modal.find('.modal-body #id').val(id)
       modal.find('.modal-body #num').val(num)
       modal.find('.modal-body #val').val(val)
       modal.find('.modal-body #des').val(des)
       modal.find('.modal-body #fecha').val(fecha)
       modal.find('.modal-body #comproid').val(comproid)
       modal.find('.modal-body #comusuid').val(comusuid)
       
       
})
$('#elicom').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var num = button.data('num')
            var modal = $(this)
            modal.find('.modal-title').text('Eliminar compra ' + num)
            modal.find('.modal-body #id').val(id)
            })
            
            var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
  return new bootstrap.Dropdown(dropdownToggleEl)
})

  </script> 
  </body>
</html>
<?php } ?>