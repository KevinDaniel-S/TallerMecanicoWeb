<?php

class servicios extends Controller_{
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
        $this->view->render('servicios/index');
    }

    public function verServicio($param){
        $id = $param[0];
        echo "Ver ".$id;
    }

    public function liberarServicio($param){
        $id = $param[0];
        echo "liberar ".$id;
    }
}