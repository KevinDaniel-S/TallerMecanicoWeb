<?php

class RegistroProducto extends Controller_{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render(){
        $this->view->render('registroProducto/index');
    }

    function registrar(){
        $Nombre = $_POST['Nombre'];
        $Precio = $_POST['Precio'];

        try {
            $this->model->insert(['Nombre' => $Nombre, 'Precio' => $Precio]);
            $this->view->mensaje = "Refacción agregada correctamente";
        } catch (Exception $e) {
            $this->view->mensaje = $e->getMessage();
        }

        $this->render();
    }
}