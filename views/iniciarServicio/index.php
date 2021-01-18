<?php include_once('views/header.php'); ?>
<?php require_once 'views/navbar.php'; ?>

<h1> Iniciar Servicio </h1>

<div class="text-center text-danger"><?php echo $this->mensaje; ?></div>

<table class="table table-hover table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Matricula</th>
            <th>Color</th>
            <th>Modelo</th>
            <th>Propietario</th>
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
            <td><?php echo $servicio->matricula; ?></td>
            <td><?php echo $servicio->color; ?></td>
            <td><?php echo $servicio->modelo; ?></td>
            <td><?php echo $servicio->propietario; ?></td>
            <td><a href="<?php echo constant('URL')."/iniciarServicio/iniciar/".$servicio->matricula;?>">Iniciar</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php include_once('views/footer.php'); ?>
