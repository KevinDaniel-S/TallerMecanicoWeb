<?php require_once 'views/header.php';?>

<h1>Registrar nuevo cliente</h1>

<div class="text-center text-danger"><?php echo $this->mensaje; ?></div>

<form action="<?php echo constant('URL');?>nuevoCliente/registrar" method="POST">
<div class="form-group">
      <label for="DNI">DNI</label>
      <input type="text" class="form-control" id="DNI" name="DNI"
      placeholder="Introduzca DNI" required>
  </div>
  <div class="form-group">
      <label for="Nombre">Nombre</label>
      <input type="text" class="form-control" id="Nombre" name="Nombre"
      placeholder="Introduzca nombre" required>
  </div>
  <div class="form-group">
    <label for="Apellido">Apellidos</label>
    <input type="text" class="form-control" id="Apellido" name="Apellido"
    placeholder="Introduzca apellido" required>
  </div>
  <div class="form-group">
    <label for="Direccion">Dirección</label>
    <input type="text" class="form-control" id="Direccion" name="Direccion"
    placeholder="Introduzca la dirección" required>
  </div>
  <div class="form-group">
    <label for="Telefono">Telefono</label>
    <input type="tel" class="form-control" id="Telefono" name="Telefono"
    placeholder="Introduzca el telefono" required>
  </div>
  <button type="submit" class="btn btn-primary">Registrar cliente</button>
</form>

<?php require_once 'views/footer.php';?>

