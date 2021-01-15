<?php include_once('views/header.php'); ?>

<h1> Modificar Servicio </h1>

<div class="text-center text-danger"><?php echo $this->mensaje; ?></div>

<table class="table table-hover table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Propietario</th>
            <th>Matricula</th>
            <th>Color</th>
            <th>Modelo</th>
            <th>Fecha de entrada</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php 
          include_once "models/servicio.php";
          foreach ($this->datos as $row) {
            $servicio = new Servicio();
            $servicio = $row;
        ?>
        <tr>
            <td><?php echo $servicio->id; ?></td>
            <td><?php echo $servicio->propietario; ?></td>
            <td><?php echo $servicio->matricula; ?></td>
            <td><?php echo $servicio->color; ?></td>
            <td><?php echo $servicio->modelo; ?></td>
            <td><?php echo $servicio->fechaEntrada; ?></td>
            <td><a href="<?php echo constant('URL')."/servicios/verMecanicos/".$servicio->id;?>">Mecánicos</a></td>
            <td><a href="<?php echo constant('URL')."/servicios/verRefacciones/".$servicio->id;?>">Refacciones</a></td>
            <td><a href="<?php echo constant('URL')."/servicios/liberarServicio/".$servicio->id;?>">Liberar</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php include_once('views/footer.php'); ?>
