<?php require_once 'views/admHeader.php';?>

<h1>Registrar empleado</h1>

<form action="#" method="POST">
  <div class="form-group">
    <label for="Nombre">Nombre</label>
    <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Introduzca nombre" required>
  </div>
  <div class="form-group">
    <label for="Apellido">Apellidos</label>
    <input type="text" class="form-control" id="Apellido" name="Apellido" placeholder="Introduzca apellido" required>
  </div>
  <div class="form-group">
    <label for="Direccion">Dirección</label>
    <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Introduzca la dirección" required>
  </div>
  <div class="form-group">
    <label for="Telefono">Telefono</label>
    <input type="tel" class="form-control" id="Telefono" name="Telefono" placeholder="Introduzca el telefono" required>
  </div>
  <div class="form-group">
    <label for="email">Correo</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Introduzca el correo electrónico" required>
  </div>
  <div class="form-group">
    <label for="Telefono">Usuario</label>
    <input type="tel" class="form-control" id="Telefono" name="Telefono" placeholder="Introduzca el telefono" required>
  </div>
  <div class="form-group">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Introduzca la contraseña" required>
  </div>
  <button type="submit" class="btn btn-primary">Registrar empleado</button>
</form>

<?php require_once 'views/footer.php';?>