<?php

class RegistroProducto extends Controller_{
    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render('registroProducto/index');
    }
}