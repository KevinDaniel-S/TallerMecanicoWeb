<?php 

class Login extends Controller_{

  function __construct(){
    parent::__construct();
    $this->view->mensaje = "";
    $this->view->datos = [];
    if(isset($_POST['user'])){
      $this->view->mensaje = $_POST['user'] . $_POST['password'];
      parent::redirect('/');
    }
  }

  function render(){
    $this->view->render('login/index');
  }
}
?>
