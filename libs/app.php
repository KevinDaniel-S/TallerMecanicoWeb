<?php

require_once 'controllers/error.php';

class App{
    
    function __construct(){
        echo "<p>Nueva App</p>";   

        $url = $_SERVER["REQUEST_URI"];
        
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        array_shift($url);

        //var_dump($url);

        $archivoController = 'controllers/' .$url[0] . '.php'; 

        if(file_exists($archivoController)){

            require_once $archivoController; 
            $controller = new $url[0];
            
            if(method_exists($controller ,$url[1])){
                $controller->{$url[1]}();
            }else{
                $controller = new Error_404;    
            }

        }else{
            $controller = new Error_404;
        }
    }
}
?>