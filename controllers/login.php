<?php 

class Login extends Controller_{

  function __construct(){
    parent::__construct();
    $this->view->mensaje = "";
    $this->view->datos = [];

  }

  function render(){
    if(isset($_POST['user'])){
      $user = $_POST['user'];
      $pass = $_POST['password'];
      $response = $this->model->verify($user, $pass);
      $this->view->mensaje = $response;
      //parent::redirect('/');
    }
    $this->view->render('login/index');
  }
}
?>
