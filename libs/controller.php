<?php

class Controller_{
    
    function __construct(){
        $this->view = new View_();
    }

    function loadModel($model){
        $url = 'models/'.$model.'Model.php';
        if(file_exists($url)){
            require $url;
            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }

    function redirect($route){
      header('Location: ' . constant('URL') . $route);
    }
}

?>
