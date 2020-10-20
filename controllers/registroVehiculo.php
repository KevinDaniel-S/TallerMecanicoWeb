<?php 

class registroVehiculo extends Controller_{
    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render("registroVehiculo/index");
    }

}