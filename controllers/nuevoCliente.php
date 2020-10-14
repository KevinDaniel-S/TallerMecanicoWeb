<?php

class nuevoCliente extends Controller_{
    function __construct(){
        parent::__construct();
        $this->view->render('nuevoCliente/index');
    }

    function registrar(){
        $DNI = $_POST['DNI'];
        $Nombre = $_POST['Nombre'];
        $Apellido = $_POST['Apellido'];
        $Direccion = $_POST['Direccion'];
        $Telefono = $_POST['Telefono'];

        $this->model->insert(['DNI'=>$DNI, 'Nombre'=>$Nombre,
                              'Apellido'=>$Apellido, 'Direccion'=>$Direccion,
                              'Telefono'=>$Telefono]);
    }


}