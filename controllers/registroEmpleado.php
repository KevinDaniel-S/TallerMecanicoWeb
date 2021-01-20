<?php

class RegistroEmpleado extends SessionController{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render(){
        $this->view->render('registroEmpleado/index');
    }

    function registrar(){
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $puesto = $_POST['puesto'];

        try {
            $this->model->insert(['nombre'=>$nombre,
                                  'apellidos'=>$apellidos,
                                  'direccion'=>$direccion,
                                  'telefono'=>$telefono,
                                  'email'=>$email,
                                  'puesto'=>$puesto]);
            $this->view->mensaje="El empleado ha sido ingresado satisfactoriamente";
        } catch (PDOException $e) {
            $this->view->mensaje = $e->getMessage();
        }
        $this->render();
    }
}
