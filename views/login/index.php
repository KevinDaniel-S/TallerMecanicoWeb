<?php include_once 'views/header.php' ?>

<div class="sidenav">
  <div class="login-main-text">
    <h1>Taller</h1>
    <br>
    <h2>Página de inicio de sesión</h2>
    <p>Inicia sesión para acceder al sistema</p>
    <br>        
    <i>Sólo un administrador tiene la capacidad de registrar usuarios.</i>
  </div>
</div>
<div class="main">
  <div class="col-md-6 col-sm-12">
    <div class="login-form">
      <form method="POST">
        <div class="form-group">
          <label>Usario</label>
          <input type="text" class="form-control" 
            placeholder="Usuario" required>
        </div>
        <div class="form-group">
          <label>Contraseña</label>
          <input type="password" class="form-control" 
            placeholder="Contraseña" required>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar sesión</button>

      </form>
    </div>
  </div>
</div>
