<?php

class Inventario extends Controller_{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->datos = [];
    }

    function render(){
        $clientes = $this->model->select();
        $this->view->datos = $clientes;
        $this->view->render('inventario/index');
    }

    function verProducto(){

    }

    function editarProducto(){

    }

    function eliminarProducto(){
        
    }
}