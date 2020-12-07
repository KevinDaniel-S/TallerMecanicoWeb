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

    public function verMecanicos($param){
        $id = $param[0];
        if(count($param)>2){
          if($param[1]=="agregar"){
            $idMecanico = $param[2];
            $this->model->agregarMecanico($id, $idMecanico);
          }
        }
        $mecanicos = $this->model->selectMecanicos();

        $this->view->datos = $mecanicos;
        $this->view->id = $id;
        //$this->view->render('servicios/detalleMecanicos');
    }

    public function agregarMecanico($param){
        
    }

    public function verRefacciones($param){
        $id = $param[0];
        $this->view->id = $id;
        $this->view->render('servicios/detalleRefacciones');
    }

    public function agregarRefaccion($param){

    }

    public function liberarServicio($param){
        $id = $param[0];
        $this->model->release($id);
        $this->view->id = $id;
        $this->render('servicios/index');
    }

}
