<?php

include_once 'models/empleado.php';

class loginModel extends Model_{
    
    public function __construct(){
        parent::__construct();
    }

    public function verify($user, $pass){
      $query = $this->db->connect()->prepare("SELECT ID_Empleado, Nombre, Apellidos, Puesto
                                              FROM Empleado
                                              WHERE ID_Empleado = :user AND Contrasena = :pass");
      $query->execute(['user'=>$user,
                       'pass'=>$pass]);
      $response = $query->fetch();

      return $response;
    }
}
?>
