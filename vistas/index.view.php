<?php  if($sesion == false){
        header('Location: ../loguin.php');
    }else{ ?>
<!doctype html>
<html lang="es">
  <head>
    <title>inicio</title>
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
       <div class="row" >
          <div class="col-lg-2  text-center" style="background-color:#fcd241;" >
          <?php include ( 'vistas/menu.php');?>
          </div>

          <div class="col-lg-10" style="background-color:#eed3ca">
          
          <div class=" float-left pt-3 pl-5 mr-5">
          <div class="card text-white bg-primary  mb-3" style="max-width: 24rem;">
          <div class="card-header">Clientes
          </div>
          <div class="card-body">
             <h5 class="card-title">Tenemos <?php echo $resultado_cli['total']; ?> clientes nuevos
             </h5>             
          </div>
          </div>
          </div>
          <div class="float-right pt-3 mr-1">
          <div class="card text-white bg-secondary mb-3" style="max-width: 24rem;">
          <div class="card-header">Proveedores
          </div>
          <div class="card-body">
             <h5 class="card-title">Tenemos 1 nuevo proveedor
             </h5>
             
          </div>
          </div>
          </div> 
          
           
          <div class=" float-left pt-3 pl-5 mr-5">
          <div class="card text-white bg-danger mb-3" style="max-width: 24rem;">
          <div class="card-header">productos
          </div>
          <div class="card-body">
             <h5 class="card-title">hay <?php echo $resultado_pro['total']; ?> productos en stock
             </h5>
             
          </div>
          </div>
          </div>  
          <div class=" float-right pt-3 mr-1">
          <div class="card text-white bg-warning mb-3" style="max-width: 24rem;">
          <div class="card-header">Compras</div>
          <div class="card-body">
             <h5 class="card-title">hemos hecho 10 compras nuevas
             </h5>
               </div>
          </div>
          </div>
                    
          <div class=" float-left pt-3 pl-5 mr-5">
          <div class="card text-white bg-success mb-3" style="max-width: 24rem;">
          <div class="card-header">ventas</div>
          <div class="card-body">
             <h5 class="card-title">hemos hecho 15 ventas</h5>             
          </div>
          </div>
          </div>
          
          
          <div class="float-right pt-3 mr-1">
          <div class="card text-white bg-info mb-3" style="max-width: 24rem;">
          <div class="card-header">usuarios</div>
          <div class="card-body">
             <h5 class="card-title">tenemos 5 usuarios activos</h5>
             
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
    
  </body>
</html>
<?php  } ?>