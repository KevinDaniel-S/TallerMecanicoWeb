<?php require_once 'views/admHeader.php';?>

<h1>Registrar empleado</h1>

<div class="text-center text-danger"><?php echo $this->mensaje; ?></div>

<form action="<?php echo constant('URL'); ?>/registroEmpleado/registrar" method="POST">
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" 
      pattern="^[A-Za-z]{3,10}( [A-Za-z]{3,10})?$"
      placeholder="Introduzca nombre" required>
  </div>
  <div class="form-group">
    <label for="apellidos">Apellidos</label>
    <input type="text" class="form-control" id="apellidos" name="apellidos"
      pattern="^[A-Za-z]{3,10}( [A-Za-z]{3,10})?$"
      placeholder="Introduzca apellidos" required>
  </div>
  <div class="form-group">
    <label for="direccion">Dirección</label>
    <input type="text" class="form-control" id="direccion" name="direccion"
      pattern="^[A-Za-z0-9 ]{3,50}$"
      placeholder="Introduzca la dirección" required>
  </div>
  <div class="form-group">
    <label for="telefono">Teléfono</label>
    <input type="tel" class="form-control" id="telefono" name="telefono"
      pattern="^\+?[0-9]{7,15}$" 
      placeholder="Introduzca el telefono" required>
  </div>
  <div class="form-group">
    <label for="email">Correo</label>
    <input type="email" class="form-control" id="email" name="email" 
      pattern="^[A-Za-z0-9]{3,}@[a-z]{3,}\.[a-z]{2,3}$"
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
