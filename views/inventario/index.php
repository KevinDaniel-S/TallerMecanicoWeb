<?php require_once "views/admHeader.php";?>

<h1>Inventario</h1>

<div class="text-center text-danger"><?php echo $this->mensaje; ?></div>

<table class="table table-hover table-striped table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        <?php 
            include_once "models/cliente.php";
              foreach ($this->datos as $row) {
              $producto = new Producto();
              $producto = $row;
              echo "<tr><td>".$producto->Nombre."</td>";
              echo "<td>$".$producto->Precio."</td>";
              echo "<td><a href='#'>editar</a></td>";
              echo "<td><a href='#'>eliminar</a></td></tr>";
            }  
        ?>
    </tbody>
  </table>
<?php require_once "views/footer.php";?>