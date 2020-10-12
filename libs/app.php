<?php

require_once 'controllers/error.php';

class App{
    
    function __construct(){

        $url = isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : null;
        
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        array_shift($url);
        
        if(empty($url[0])){
            $archivoController = 'controllers/main.php';
            require_once $archivoController;
            $controller = new Main;
            return false;
        }
       
        $archivoController = 'controllers/' .$url[0] . '.php'; 
        if(file_exists($archivoController)){
            require_once $archivoController; 
            $controller = new $url[0];
            if(count($url)>1){
                if(method_exists($controller ,$url[1])){
                    $controller->{$url[1]}();
                    if(count($url)>2){
                        $controller = new Error_; 
                    } 
                }else{
                    $controller = new Error_;    
                }
                 
            }
                

        }else{
            $controller = new Error_;
        }
        
    }
}
?>