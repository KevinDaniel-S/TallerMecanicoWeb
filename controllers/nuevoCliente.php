<?php

class nuevoCliente extends Controller_{
    function __construct(){
        parent::__construct();
        $this->view->render('nuevoCliente/index');
    }

    function registrar(){
        echo "Alumno creado";
        $this->model->insert();
     
    }


}