<?php require_once 'views/admHeader.php';?>

<h1>Registro producto</h1>

<form action="<?php echo constant('URL'); ?>registroProducto/registrar" method="POST">
  <div class="form-group">
    <label for="Nombre">Nombre</label>
    <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Introduzca nombre" required>
  </div>
  <div class="form-group">
    <label for="Precio">Precio</label>
    <input type="number" class="form-control" id="Precio" name="Precio" placeholder="Introduzca precio" min="0" required>
  </div>
  <button type="submit" class="btn btn-primary">Registrar producto</button>
</form>

<?php require_once 'views/footer.php';?>
