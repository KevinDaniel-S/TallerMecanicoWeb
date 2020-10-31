<?php

class Admin extends Controller_{
    function __construct(){
        parent::__construct();
        
    }

    function render(){
        $this->view->render('admin/index');
    }
}