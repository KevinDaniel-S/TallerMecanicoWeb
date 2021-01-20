<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="shortcut icon" 
          href="/assets/favicon.ico"
          type="image/x-icon">
<!-- JavaScript Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo constant('URL')?>/admin">Admin</a>
    </div>
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo constant('URL')?>/registroEmpleado">Registro empleado</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo constant('URL')?>/empleados">Empleados</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo constant('URL')?>/registroProducto">Registro producto</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo constant('URL')?>/inventario">Inventario</a>
        </li>
      </ul>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo constant('URL')?>/logout">Cerrar sesión</a>
        </li>
      </ul>
    </div>
</nav>
<div style="padding:5% 7%">
