<?php

class Main extends Controller_{
    function __construct(){
        parent::__construct();
        $this->view->render('main/index');
    }

    function saludo(){
        echo "<p>Método Saludo</p>";
    }
}