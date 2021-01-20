<?php 
session_start();

class Login extends Controller_{

  function __construct(){
    parent::__construct();
    $this->view->mensaje = "";
    $this->view->data = "";
    $response = False;
  }

  function render(){
    if(isset($_POST['user'])){
      $user = $_POST['user'];
      $pass = $_POST['password'];
      try{
      $response = $this->model->verify($user, $pass);
      } catch(Exception $e){
        $this->view->mensaje = $e->getMessage();
      }
      if($response){
        $puesto = $response['Puesto'];
        $_SESSION['id'] = $response['ID_Empleado'];
        $_SESSION['puesto'] = $puesto;
        $_SESSION['nombre'] = $response['Nombre'].' '.$response['Apellidos'];
        if($puesto != 'Administrativo'){
          parent::redirect('/');
        }else{
          parent::redirect('/admin');
        }
      } else {
        $this->view->mensaje = "Usuario o contraseña incorrecta";
      }
      
    }
    $this->view->render('login/index');
  }
}
?>
