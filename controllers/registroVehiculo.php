<?php 

class registroVehiculo extends SessionController{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->datos = [];
    }

    function render(){
        $clientes = $this->model->select();
        $this->view->datos = $clientes;
        $this->view->render("registroVehiculo/index");
    }

    function registrar(){
        $Cliente = $_POST['Cliente'];
        $Matricula = $_POST['Matricula'];
        $Modelo = $_POST['Modelo'];
        $Color = $_POST['Color'];

        try {
            $this->model->insert(['Cliente' => $Cliente, 'Matricula' => $Matricula,
                                  'Modelo' => $Modelo, 'Color' => $Color]);
            $this->view->mensaje = "Vehículo agregado correctamente";
            if($_SESSION['puesto']=='Ayudante'){
              parent::redirect('/');
            } else {
              parent::redirect('/iniciarServicio');
            }
        } catch (Exception $e) {
            $this->view->mensaje = $e->getMessage();
        }

        $this->render();
    }

}
