<?php require_once "views/admHeader.php";?>

<h1>Inventario</h1>

<div class="text-center text-danger"><?php echo $this->mensaje; ?></div>

<table class="table table-hover table-striped table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th></th>
        <!--th></th-->
      </tr>
    </thead>
    <tbody>
        <?php 
          include_once "models/producto.php";
          foreach ($this->datos as $row) {
            $producto = new Producto();
            $producto = $row;
        ?>
            <tr>
              <td><?php echo $producto->id; ?></td>
              <td><?php echo $producto->Nombre; ?></td>
              <td><?php echo "$".$producto->Precio; ?></td>
              <td>
                <a href="<?php echo constant('URL')."/inventario/verProducto/".$producto->id;?>">editar</a>
              </td>
<!--              <td>
                <a href="<!?php echo constant('URL')."/inventario/eliminarProducto/".$producto->id;?>">eliminar</a>
              </td>-->
            </tr>
          <?php } ?>
    </tbody>
  </table>

<?php require_once "views/footer.php";?>
