<?php

class servicios extends Controller_{
    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render('servicios/index');
    }
}