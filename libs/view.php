<?php

class View_{
    
    function __construct(){
    }

    function render($nombre){
        require 'views/'.$nombre.'.php';
    }
}

?>