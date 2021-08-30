<?php if($sesion == false){
        header('Location: ../loguin.php');
    }else{ ?>
<!doctype html>
<html lang="es">
  <head>
    <title>costuras</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  
  <body>
  <div class="container">
     <?php include ( 'vistas/header.php');?>

  <section>
       <div class="row">
          <div class="col-lg-2 text-center" style="background-color:#fcd241;">
            <?php include ('vistas/menu.php');?>          
          </div> 
       <div class="col-lg-10 pt-2"style="background-color:#FFA07A">
            <h4>modulo costuras</h4>

            <button type="button" class="btn btn-primary mt-3 mb-3" data-toggle="modal" data-target="#ingcos" data-whatever="@mdo">nueva costura</button>
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
                <th scope="col">tipo servicio</th>
                <th scope="col">observaciones</th>
                <th scope="col">valor</th>
                <th scope="col">estado</th>
                
              </tr>
             </thead>
            <tbody id = "table">
              <tr>
                <th scope="row">1</th>
                <td>ropa mujer</td>
                <td>dobladillo de jean</td>
                <td>4000</td>
                <td>pagado</td>
                
                <td><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#edicos" data-tip="ropa mujer" data-obs="dobladillo de jean" data-val="4000" data-est="pagado">editar</button></td>
                <td><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#elicos" data-tip="ropa mujer">eliminar</button></td>
                
              </tr>
 
            </tbody>
            </table>
          </div>

<div class="modal fade" id="ingcos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nueva costura</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
        <div class="modal-body">
              <form method="post" action="costuras.php">
              <input type="hidden" name="proceso" value="ingresar">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">tipo de costura:</label>
                  <input type="enum" required name="tipcos" placeholder="ingrese el tipo de costura" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">observaciones:</label>
                  <input  type="text" required name="obscos" placeholder="ingrese las observaciones" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> valor:</label>
                  <input  type="int" name="valcos" placeholder="ingrese el valor" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">estado:</label>
                  <input  type="text" name="estcos" placeholder="ingrese el estado" class="form-control" id="recipient-name">
                </div>
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">enviar</button>
         
              </form>
        </div>
    
      </div>
  </div>
</div>

<div class="modal fade" id="edicos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar costura: </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >      
        <form method="post" action="costuras.php">
        <input type="hidden" name="proceso" value="editar">
        <input type="hidden" id="tip" name="tipcos" value="ropa mujer">
          
          <div class="form-group" >
            <label for="recipient-name" class="col-form-label">tipo de costura:</label>
            <input id="tip" type="enum" required name="tipcos" placeholder="ingrese el tipo de costura:" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">observaciones:</label>
            <input id="obs" type="text" name="obscos" placeholder="ingrese las observaciones" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">valor:</label>
            <input id="val" type="int" name="valcos" placeholder="ingrese el valor" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">estado:</label>
            <input id="est" type="text" name="estcos" placeholder="ingrese el valor" class="form-control" id="recipient-name">
          </div>
          
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">guardar cambios</button>
         
        </form>
      </div>
    
    </div>
  </div>
</div>
<div>

<!-- Modal -->
<div class="modal fade" id="elicos" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">eliminar costura</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="costuras.php" method ="POST">
                            <input type="hidden" name="proceso" value="eliminar">
                            <input type="hidden" name="tipcos" value="">
                            <div class="modal-body">
                                <p>Va a eliminar una costura ¿Está seguro?</p>
                            </div>    
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary">Eliminar</button>
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
       $('#edicos').on('show.bs.modal', function (event) {
       var button = $(event.relatedTarget) // Button that triggered the modal
       var tip = button.data('tip') 
       var obs = button.data('obs') 
       var val = button.data('val')
       var est = button.data('est') 
       
       // Extract info from data-* attributes
       // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
       // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
       var modal = $(this)
       modal.find('.modal-title').text('editar costura: ' + tip)
       modal.find('.modal-body #tip').val(tip)
       modal.find('.modal-body #obs').val(obs)
       modal.find('.modal-body #val').val(val)
       modal.find('.modal-body #est').val(est)
       
       
})</script> 
  </body>
</html>
<?php } ?>