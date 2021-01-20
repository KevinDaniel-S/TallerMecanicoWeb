<?php

class nuevoCliente extends SessionController{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render(){
        $this->view->render('nuevoCliente/index');
    }

    function registrar(){
        $DNI = $_POST['DNI'];
        
        $Nombre = $_POST['Nombre'];
        $Nombre = strtolower($Nombre);
        $Nombre = ucfirst($Nombre);

        $Apellido = $_POST['Apellido'];
        $Apellido = strtolower($Apellido);
        $Apellido = ucfirst($Apellido);

        $Direccion = $_POST['Direccion'];
        $Telefono = $_POST['Telefono'];

        try{$this->model->insert(['DNI'=>$DNI, 'Nombre'=>$Nombre,
                'Apellido'=>$Apellido, 'Direccion'=>$Direccion,
                'Telefono'=>$Telefono]);
            $this->view->mensaje = "Cliente agregado correctamente";
        }
        catch(Exception $e){
            $this->view->mensaje = $e->getMessage();
        }

        
        $this->render();
    }


}
