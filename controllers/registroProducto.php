<?php

class RegistroProducto extends SessionController{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render(){
        $this->view->render('registroProducto/index');
    }

    function registrar(){
      $Nombre = $_POST['Nombre'];
      $Nombre = strtolower($Nombre);
      $Nombre = ucfirst($Nombre);

      $Precio = $_POST['Precio'];

      try {
        $this->model->insert(['Nombre' => $Nombre, 'Precio' => $Precio]);
        $this->view->mensaje = "Refacción agregada correctamente";
        parent::redirect('/inventario');
      } catch (Exception $e) {
        $this->view->mensaje = $e->getMessage();
      }
      $this->render();
    }
}
