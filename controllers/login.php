<?php 

class Login extends Controller_{

  function __construct(){
    parent::__construct();
    $this->view->mensaje = "";
    $this->view->datos = [];
  }

  function render(){
    $this->view->render('login/index');
  }
}
?>
