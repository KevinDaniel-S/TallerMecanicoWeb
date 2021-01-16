<?php require_once "views/admHeader.php";?>

<h1>Empleados</h1>

<div class="text-center text-danger"><?php echo $this->mensaje; ?></div>

<table class="table table-hover table-striped table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Email</th>
        <th>Teléfono</th>
        <th>Puesto</th>
        <th>Estado</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        <?php 
          include_once "models/empleado.php";
          foreach ($this->datos as $row) {
            $empleado = new Empleado();
            $empleado = $row;
        ?>
            <tr>
              <td><?php echo $empleado->id; ?></td>
              <td><?php echo $empleado->nombre." ".$empleado->apellido; ?></td>
              <td><?php echo $empleado->direccion; ?></td>
              <td><?php echo $empleado->email; ?></td>
              <td><?php echo $empleado->telefono; ?></td>
              <td><?php echo $empleado->puesto; ?></td>
              <td><?php echo $empleado->libre; ?></td>
              <td>
                <a href="<?php echo constant('URL')."/empleados/verEmpleado/".$empleado->id;?>">editar</a>
              </td>
              <td>
                <a href="<?php echo constant('URL')."/empleados/eliminarEmpleado/".$empleado->id;?>">eliminar</a>
              </td>
          <?php } ?>
    </tbody>
  </table>

<?php require_once "views/footer.php";?>
