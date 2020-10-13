<?php require_once 'views/header.php';?>

<h1>Registrar nuevo cliente</h1>
<div style="padding:3% 7%">
<form action="<?php echo constant('URL'); ?>nuevoCliente/registrar" method="POST">
    <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="text" class="form-control" id="Nombre"
        placeholder="Introduzca nombre">
    </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Registrar cliente</button>
</form>
</div>
<?php require_once 'views/footer.php';?>