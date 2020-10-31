<?php

class RegistroEmpleado extends Controller_{
    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render('registroEmpleado/index');
    }
}