<ul class="nav flex-column">
     <li class="nav-item">
        <li class="nav-item border-bottom border-dark">
          <a class="nav-link active h5 "style="color: #4f1c0f"  href="index.php">INICIO</a>       
        </li>
        
<?php  if($_SESSION['usurol'] == '1' ){?>
          <li class="nav-item border-bottom border-dark">
               <a class="nav-link active h5" style= "color: #4f1c0f" href="clientes.php">CLIENTES</a>
          </li>
        
        <?php } if($_SESSION['usurol'] == '1' ){?>
        <li class="nav-item border-bottom border-dark">
          <a class="nav-link active h5" style="color: #4f1c0f" href="proveedores.php">PROVEEDORES</a>
        </li>
        
        <?php } if($_SESSION['usurol'] == '1' || $_SESSION['usurol'] == '2'){?>
        <li class="nav-item border-bottom border-dark">
          <a class="nav-link active h5" style="color: #4f1c0f" href="productos.php">PRODUCTOS</a>
        </li>
        
        <?php } if($_SESSION['usurol'] == '1' ){?>
        
        <li class="nav-item border-bottom border-dark">
            <a class="nav-link active h5" style="color: #4f1c0f" href="compras.php">COMPRAS</a>
        </li>
        
        <?php } if($_SESSION['usurol'] == '1' || $_SESSION['usurol'] == '2'){?>
        
        <li class="nav-item border-bottom border-dark">
            <a class="nav-link active h5" style="color: #4f1c0f" href="ventass.php">VENTAS</a>
        </li>
        
        <?php } if($_SESSION['usurol'] == '1' || $_SESSION['usurol'] == '2'){?>
        
        
        <li class="nav-item border-bottom border-dark">
           <a class="nav-link active h5" style="color: #4f1c0f" href="facturas.php">FACTURAS</a>
        </li>
        
        
                
        <?php } if($_SESSION['usurol'] == '1' || $_SESSION['usurol'] == '2'){?>
        
        <li class="nav-item border-bottom border-dark">
            <a class="nav-link active h5" style="color: #4f1c0f" href="usuarios.php">USUARIOS</a>
        </li>
        
        <?php } if($_SESSION['usurol'] == '1' || $_SESSION['usurol'] == '2' ){?>
        
        <li class="nav-item border-bottom border-dark">
            <a class="nav-link active h5" style="color: #4f1c0f" href="reporte.php">REPORTES</a>
        </li>
        
        <?php } ?>
    </li>
    
</ul>


