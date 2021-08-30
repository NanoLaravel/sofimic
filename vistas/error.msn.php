<?php if(!empty($errores)): ?>
          <div class="alert alert-danger" role="alert">
            <p><?php echo $errores; ?></p>
        </div>
        <?php elseif(!empty($mensaje)): ?>
          <div class="alert alert-success" role="alert">
            <p><?php echo $mensaje; ?></p>
        </div>
         <?php endif; ?>

          <?php if(isset($mensaje_archivo) && !empty($mensaje_archivo)): ?>
            <div class="alert alert-info" role="alert">
            <p><?php echo $mensaje_archivo; ?></p>
        </div>
        <?php endif; ?> 