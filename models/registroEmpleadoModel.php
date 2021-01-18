<?php

class registroEmpleadoModel extends Model_{

    public function __construct(){
        parent::__construct();
    }
    
    public function insert($datos){
      if($datos['puesto']=='Administrativo'){
        $Estado = 'Ocupado';
      } else {
        $Estado = 'Libre'
      }
      $query = $this->db->connect()->prepare('INSERT INTO Empleado (Nombre, Apellidos, Direccion, Telefono, Puesto, Correo, Contrasena :Estado) 
                                              VALUES (:Nombre, :Apellidos, :Direccion, :Telefono, :Puesto, :Correo, :Pass, :Estado)');
        $query->execute(['Nombre'=>$datos['nombre'],
                         'Apellidos'=>$datos['apellidos'], 
                         'Direccion'=>$datos['direccion'],
                         'Telefono'=>$datos['telefono'],
                         'Puesto'=>$datos['puesto'],
                         'Correo'=>$datos['email'],
                         'Pass'=>substr($datos['nombre'], 0, 3).substr($datos['telefono'], -4)]);
    }
}
