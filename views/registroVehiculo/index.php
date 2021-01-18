<?php require_once 'views/header.php';?>
<?php require_once 'views/navbar.php'; ?>

<h1>Registro vehículo</h1>

<div class="text-center text-danger"><?php echo $this->mensaje; ?></div>

<form action="<?php echo constant('URL');?>/registroVehiculo/registrar" method="POST">
    <div class="form-group">
      <label for="Cliente">Cliente</label>
      <select class="form-control" id="Cliente" name="Cliente" required>
        <option selected disabled hidden>Seleccionar cliente</option>
        <?php 
            include_once "models/cliente.php";
              foreach ($this->datos as $row) {
              $cliente = new Cliente();
              $cliente = $row;
              
              echo "<option value=\"".$cliente->DNI."\">".$cliente->Nombre." ". $cliente->Apellido."</option>";
            }  
        ?>
      </select>
    </div>
    <div class="form-group">
        <label for="Matricula">Matricula</label>
        <input type="text" class="form-control" name="Matricula" id="Matricula"
            placeholder="Introduzca la matricula" required>
    </div>
    <div class="form-group">
        <label for="Modelo">Modelo</label>
        <input type="text" class="form-control" name="Modelo" id="Modelo"
            pattern="^[A-Za-z]{3,10}( [A-Za-z]{3,10})?$"
            placeholder="Introduzca el modelo" required>
    </div>
    <div class="form-group">
        <label for="Color">Color</label>
        <input type="text" class="form-control" name="Color" id="Color"
            pattern="^[A-Za-z]{3,10}( [A-Za-z]{3,10})?$"
            placeholder="Introduzca el color" required>
    </div>
    <button type="submit" class="btn btn-primary">Registrar vehículo</button>
</form>

<?php require_once 'views/footer.php';?>
