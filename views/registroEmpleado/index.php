<?php require_once 'views/admHeader.php';?>

<h1>Registrar empleado</h1>

<div class="text-center text-danger"><?php echo $this->mensaje; ?></div>

<form action="<?php echo constant('URL'); ?>/registroEmpleado/registrar" method="POST">
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduzca nombre" required>
  </div>
  <div class="form-group">
    <label for="apellidos">Apellidos</label>
    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Introduzca apellidos" required>
  </div>
  <div class="form-group">
    <label for="direccion">Dirección</label>
    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Introduzca la dirección" required>
  </div>
  <div class="form-group">
    <label for="telefono">Teléfono</label>
    <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Introduzca el telefono" required>
  </div>
  <div class="form-group">
    <label for="email">Correo</label>
    <input type="email" class="form-control" id="email" name="email" 
      placeholder="Introduzca el correo electrónico" required>
  </div>
  <div class="form-group">
    <label for="puesto">Puesto</label>
    <select class="form-control" id="puesto" name="puesto" required>
      <option selected disabled hidden>Seleccionar puesto</option>
      <option value="Administrativo">Administrativo</option>
      <option value="Ayudante">Ayudante mecánico</option>
      <option value="Jefe mecanico">Jefe mecánico</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Registrar empleado</button>
</form>

<?php require_once 'views/footer.php';?>
