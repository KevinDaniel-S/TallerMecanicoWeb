<?php include_once 'views/header.php'; ?>

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
                <form class="form-inline" action="#">
                    <div class="form-group">
                        <label for="nombre">Refacción:  </label>
                        <select class="form-control" name="nombre" id="nombre">
                            <option value="">Refacción 1</option>
                            <option value="">Refacción 2</option>
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
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-right">Total</td>
                            <td>$50</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
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
