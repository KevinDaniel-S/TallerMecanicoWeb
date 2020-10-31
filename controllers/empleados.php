<?php

class Empleados extends Controller_{
    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render('empleados/index');
    }
}