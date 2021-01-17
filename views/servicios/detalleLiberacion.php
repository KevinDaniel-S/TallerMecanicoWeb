<?php include_once 'views/header.php'; ?>
<?php $totalMec = 0; ?>
<?php $totalRef = 0; ?>
<div class="d-flex justify-content-center">
    <h2>Liberar servicio <?php echo $this->id; ?></h2> 
</div>
<h3>Detalle Servicio</h3>
  <b>Id del servicio:</b> <?php echo $this->servicio['ID_Reparacion']; ?><br>
  <b>Fecha de entrada:</b> <?php echo $this->servicio['Fecha_Entrada']; ?><br>
<h3>Detalle vehículo</h3>
  <b>Propietario:</b> <?php echo $this->servicio['Nombre']." ".$this->servicio['Apellido']; ?><br>
  <b>Matricula:</b> <?php echo $this->servicio['Matricula']; ?><br>
  <b>Modelo:</b> <?php echo $this->servicio['Modelo']; ?><br>
  <b>Color:</b> <?php echo $this->servicio['Color']; ?><br>

<div class="container">
  <div class="row">
    <div class="col">
      <div class="row d-flex justify-content-center">
        <h4> Factura </h4>
      </div>
      <div class="row">
        <table class="table table-hover table-striped table-bordered">
          <thead>
            <tr class="text-white bg-dark">
              <th colspan="5" class="text-center">Mecanicos</th>
            </tr>
          </thead>
           <tbody>
            <tr class="bg-primary">
              <th>ID mecánico</th>
              <th colspan="2">Nombre</th>
              <th>Puesto</th>
              <th>Sueldo</th>
            </tr>
            <?php 
              foreach($this->mecanicos as $row){
                $empleado = new Empleado();
                $empleado = $row;
            ?>
            <tr>
              <td><?php echo $empleado->id; ?></td>
              <td colspan="2"><?php echo $empleado->nombre." ".$empleado->apellido; ?></td>
              <td><?php echo $empleado->puesto; ?></td>
              <td><?php if($empleado->puesto=="Jefe mecanico"){
                  $totalMec += 150;
                  echo "$150";
                }else{
                  $totalMec += 100;
                  echo "$100";
                }
              ?></td>
            </tr>                         
            <?php } ?>
            <tr class="bg-success">
              <td colspan="4" class="text-right">Total Mecánicos</td>
              <td><?php echo "$".$totalMec; ?></td>
            </tr>
            <tr class="text-white bg-dark">
              <th colspan="5" class="text-center">Refacciones</th>
            </tr>
            <tr class="bg-primary">
              <th>ID refacción</th>
              <th>Nombre</th>
              <th>Cantidad</th>
              <th>Precio Unitario</th>
              <th>Precio total</th>
            </tr>
                      <?php 
                        foreach($this->refacciones as $row){
                        $refaccion = new Refaccion();
                        $refaccion = $row;
                      ?>
                      <tr>
                        <td><?php echo $refaccion->id; ?></td>
                        <td><?php echo $refaccion->nombre; ?></td>
                        <td><?php echo $refaccion->cantidad; ?></td>
                        <td><?php echo "$".$refaccion->precio; ?></td>
                        <td>$<?php $price = (float)$refaccion->precio * (float)$refaccion->cantidad; 
                                   $totalRef += $price;
                                    echo $price;?>
                        </td>
                      </tr>                         
                    <?php } ?>
            <tr class="bg-success">
              <td colspan="4" class="text-right">Total Refacciones</td>
              <td><?php echo "$".$totalRef; ?></td>
            </tr>
            <tr class="bg-info">
              <td colspan="4" class="text-right">Total</td>
              <td>$<?php echo $totalMec+$totalRef; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include_once 'views/footer.php'; ?> 
