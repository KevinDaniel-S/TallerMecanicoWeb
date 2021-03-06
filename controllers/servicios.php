<?php

class servicios extends SessionController{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render(){
      if(isset($_POST['id'])){
        $id = $_POST['id'];
        $totals = ['totalMec' => $_POST['totalMec'],
                   'totalRef' => $_POST['totalRef'],
                   'total'    => $_POST['total']];
        $this->model->release($id, $totals);
        $this->view->mensaje = "El servicio número ".$id." fue liberado";
      }
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
      if(isset($_POST['refaccion'])){
        $idRefaccion = $_POST['refaccion'];
        $cantidad = $_POST['cantidad'];
        $this->model->agregarRefaccion($id, $idRefaccion, $cantidad);
      }
        $this->view->id = $id;
        
        $refProyecto = $this->model->refaccionesProyecto($id);
        $refacciones = $this->model->selectRefacciones($id);
        
        
        $this->view->datos = $refacciones;
        $this->view->refacciones = $refProyecto;
        $this->view->render('servicios/detalleRefacciones');
    }

    public function liberarServicio($param){
        $id = $param[0];

        $servicio = $this->model->detalleServicio($id);
        $mecanicos = $this->model->mecanicosProyecto($id);
        $refacciones = $this->model->refaccionesProyecto($id);

        $this->view->id = $id;
        $this->view->servicio = $servicio;
        $this->view->mecanicos = $mecanicos;
        $this->view->refacciones = $refacciones;

        $this->view->render('servicios/detalleLiberacion');
    }

}
