<?php

class Inventario extends Controller_{
    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render('inventario/index');
    }
}