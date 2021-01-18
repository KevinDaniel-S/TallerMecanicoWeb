<?php require_once 'views/header.php'; ?>

<h1>Registrar nuevo cliente</h1>

<div class="text-center text-danger"><?php echo $this->mensaje; ?></div>

<form action="<?php echo constant('URL'); ?>/nuevoCliente/registrar" method="POST">
  <div class="form-group">
    <label for="DNI">CURP</label>
    <input type="text" class="form-control" id="DNI" name="DNI" 
      pattern="^[A-Z]{4}\d{6}[A-Z]{6}[A-Z0-9]\d$"
      placeholder="Introduzca CURP" required>
  </div>
  <div class="form-group">
    <label for="Nombre">Nombre</label>
    <input type="text" class="form-control" id="Nombre" name="Nombre" 
      pattern="^[A-Za-z]{3,10}( [A-Za-z]{3,10})?$"
      placeholder="Introduzca nombre" required>
  </div>
  <div class="form-group">
    <label for="Apellido">Apellidos</label>
    <input type="text" class="form-control" id="Apellido" name="Apellido" 
      pattern ="^[A-Za-z]{3,10}( [A-Za-z]{3,10})?$"
      placeholder="Introduzca apellido" required>
  </div>
  <div class="form-group">
    <label for="Direccion">Dirección</label>
    <input type="text" class="form-control" id="Direccion" name="Direccion" 
      pattern="^[A-Za-z0-9 ]{3,50}$"
      placeholder="Introduzca la dirección" required>
  </div>
  <div class="form-group">
    <label for="Telefono">Telefono</label>
    <input type="tel" class="form-control" id="Telefono" name="Telefono"
      pattern="^\+?[0-9]{7,15}$"
      placeholder="Introduzca el telefono" required>
  </div>
  <button type="submit" class="btn btn-primary">Registrar cliente</button>
</form>

<?php require_once 'views/footer.php'; ?>
