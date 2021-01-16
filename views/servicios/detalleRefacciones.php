<?php include_once 'views/header.php'; ?>
<?php include_once 'models/refaccion.php'; ?>

<div class="d-flex justify-content-center">
    <h2>Refacciones del servicio <?php echo $this->id; ?></h2>
    
</div>
<div class="container">
    <br>    
    <div class="row">
        <!--Refacciones -->
        <div class="col">
            <!-- Agregar Refacción -->
            <div class="row d-flex justify-content-center">
                <h5> Agregar Refacción </h5>
            </div>
            <br>
            <div class="row d-flex justify-content-center">
                <form class="form-inline" action="#" method="POST">
                    <div class="form-group">
                        <label for="nombre">Refacción:  </label>
                        <select class="form-control" name="refaccion" id="">
                          <?php                             
                            foreach($this->datos as $row){
                              $refaccion = new Refaccion();
                              $refaccion = $row;
                          ?>
                            <option value="<?php echo $refaccion->id; ?>">
                              <?php echo $refaccion->nombre; ?>
                            </option>
                          <?php  }?> 
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">  Cantidad:  </label>
                        <input type="number" name="cantidad" id="cantidad" min="1" value="1">
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
            <br>
            <br>
            <!-- Ver Mecánicos -->
            <div class="row d-flex justify-content-center">
                <h5>Refacciones en proyecto</h5>
            </div>
            <br>
            <div class="row">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio unitario</th>
                            <th>Precio Total</th>
                        </tr>
                    </thead>
                    <?php $total = 0 ?>
                    <tbody>
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
                                   $total += $price;
                                    echo $price;?>
                        </td>
                      </tr>                         
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-right">Total</td>
                            <td>$<?php echo $total; ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once 'views/footer.php'; ?>
