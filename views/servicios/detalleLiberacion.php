<?php include_once 'views/header.php'; ?>
<div class="d-flex justify-content-center">
    <h2>Liberar servicio <?php echo $this->id; ?></h2> 
</div>
<h3>Detalle Servicio</h3>
  <b>Id del servicio:</b> <?php echo $this->servicio['ID_Reparacion']; ?><br>
  <b>Fecha de entrada:</b> <?php echo $this->servicio['Fecha_Entrada']; ?><br>
<h3>Detalle vehículo</h3>
  <b>Propietario:</b> <?php echo $this->servicio['Nombre']." ".$this->servicio['Apellidos']; ?><br>
  <b>Matricula:</b> <?php echo $this->servicio['Matricula']; ?><br>
  <b>Modelo:</b> <?php echo $this->servicio['Modelo']; ?><br>
  <b>Color:</b> <?php echo $this->servicio['Color']; ?><br>

<?php include_once 'views/footer.php'; ?> 
