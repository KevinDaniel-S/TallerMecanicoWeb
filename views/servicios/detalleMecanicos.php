<?php include_once 'views/header.php'; ?>

<div class="d-flex justify-content-center">
    <h2>Mecánicos del servicio <?php echo $this->id; ?></h2>
    
</div>

<div class="container">
    <br>    
    <div class="row">
        <!--Mecánicos -->
        <div class="col">
            <!-- Agregar Mecánico -->
            <div class="row d-flex justify-content-center">
                <h5> Agregar mecánico </h5>
            </div>
            <br>
            <div class="row d-flex justify-content-center">
                <form class="form-inline" 
                  action="#" method="POST">
                    <div class="form-group">
                        <label for="nombre">Mecánico</label>
                        <select class="form-control" name="mecanico" id="">
                          <?php 
                            include_once 'models/empleado.php';
                            foreach($this->datos as $row){
                              $empleado = new Empleado();
                              $empleado = $row;
                          ?>
                            <option value="<?php echo $empleado->id; ?>">
                              <?php echo $empleado->nombre." ".$empleado->apellidos; ?>
                            </option>
                          <?php  }?>                        
                          </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
            <br>
            <br>
            <!-- Ver Mecánicos -->
            <div class="row d-flex justify-content-center">
                <h5>Mecánicos en proyecto</h5>
            </div>
            <br>
            <div class="row">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Puesto</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right">Total</td>
                            <td>$50</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once 'views/footer.php'; ?>
