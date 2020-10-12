<?php

class Error_ extends Controller_{

    function __construct(){
        parent::__construct();
        $this->view->render('error/index');
    }

    
}

?>