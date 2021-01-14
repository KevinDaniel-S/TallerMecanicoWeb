<?php

require_once 'controllers/error.php';

class App{

    function __construct(){
        //echo "<p>Nueva app</p>";

        $url = isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : null; 
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $url = array_slice($url, constant('PAR'));

        array_shift($url);
        
        // cuando se ingresa sin definir controlador
        if(empty($url[0])){
            $archivoController = 'controllers/main.php';
            require_once $archivoController;
            $controller = new Main();
            $controller->loadModel('main');
            $controller->render();
            return false;
        }
        $archivoController = 'controllers/' . $url[0] . '.php';

        if(file_exists($archivoController)){
            require_once $archivoController;

            // inicializar controlador
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            $nparam = sizeof($url);

            if($nparam>1){
                if($nparam>2){
                    $param = [];
                    for($i = 2; $i< $nparam; $i++){
                        array_push($param, $url[$i]);
                    }
                    $controller->{$url[1]}($param);
                    
                } else{
                    $controller->{$url[1]}();
                }
            } else {
                $controller->render();
            }

        }else{
            $controller = new Error_();
        }
    }
}

?>
