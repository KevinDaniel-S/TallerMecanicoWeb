<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo constant('URL')?>/">Taller</a>
  </div>
  <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo constant('URL')?>/nuevoCliente">Nuevo Cliente</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo constant('URL')?>/registroVehiculo">Registro vehículo</a>
      </li>
<?php if($_SESSION['puesto']!='Ayudante') { ?>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo constant('URL')?>/iniciarServicio">Iniciar servicio</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo constant('URL')?>/servicios">Servicios</a>
      </li>
<?php } ?>
    </ul>
  </div>
  <div class="navbar-collapse collapse w-100 order-2 dual-collapse2">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo constant('URL')?>/logout">Cerrar sesión</a>
      </li>
    </ul>
  </div>

</nav>
<div style="padding:5% 7%">
