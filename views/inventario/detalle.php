<?php require_once 'views/admHeader.php';?>

<h1>Detalle de <?php echo $this->producto->Nombre;?></h1>

<?php echo $this->mensaje;?>

<form action="<?php echo constant('URL'); ?>/inventario/editarProducto" method="POST">
  <div class="form-group">
    <label for="Nombre">Nombre</label>
    <input type="text" class="form-control" id="Nombre" name="Nombre"
    value="<?php echo $this->producto->Nombre;?>" 
    placeholder="Introduzca nombre" required>
  </div>
  <div class="form-group">
    <label for="Precio">Precio</label>
    <input type="number" class="form-control" id="Precio" name="Precio" 
        value="<?php echo $this->producto->Precio;?>"
        placeholder="Introduzca precio" min="0" required>
  </div>
  <button type="submit" class="btn btn-primary">Actualizar producto</button>
</form>

<?php require_once 'views/footer.php';?>
