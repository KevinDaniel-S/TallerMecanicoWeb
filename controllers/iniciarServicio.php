<?php

class iniciarServicio extends SessionController{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render(){
        try {
            $servicio = $this->model->select();
            
        } catch (Exception $e) {
            $this->view->mensaje = $e->getMessage();
        }
        $this->view->datos = $servicio;    
        $this->view->render('iniciarServicio/index');
    }

    function iniciar($param){
        $id = $param[0];
        $this->model->start($id);

        $this->render();
    }
}
