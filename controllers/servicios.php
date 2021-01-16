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
      if(isset($_POST['mecanico'])){
        $idMecanico = $_POST['mecanico'];
        $this->model->agregarMecanico($id, $idMecanico);
      }
      $mecProyecto = $this->model->mecanicosProyecto($id);
      $mecanicos   = $this->model->selectMecanicos();

      $this->view->datos = $mecanicos;
      $this->view->mecanicos = $mecProyecto;
      $this->view->id = $id;
      $this->view->render('servicios/detalleMecanicos');
    }

    public function verRefacciones($param){
        $id = $param[0];
        $this->view->id = $id;

        $refacciones = $this->model->selectRefacciones($id);

        $this->view->datos = $refacciones;
        $this->view->render('servicios/detalleRefacciones');
    }

    public function liberarServicio($param){
        $id = $param[0];
        $this->model->release($id);
        $this->view->id = $id;
        $this->render('servicios/index');
    }

}
