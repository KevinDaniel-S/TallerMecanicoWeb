<?php require_once 'views/header.php';?>

<h1>Registro vehículo</h1>

<form action="" method="post">
    <div class="form-group">
      <label for="Cliente">Cliente</label>
      <select class="form-control" id="Cliente" name="Cliente" required>
        <option selected disabled hidden>Cliente</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
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
            placeholder="Introduzca el modelo" required>
    </div>
    <div class="form-group">
        <label for="Color">Color</label>
        <input type="text" class="form-control" name="Color" id="Color"
            placeholder="Introduzca el color" required>
    </div>
    <button type="submit" class="btn btn-primary">Registrar vehículo</button>
</form>

<?php require_once 'views/footer.php';?>