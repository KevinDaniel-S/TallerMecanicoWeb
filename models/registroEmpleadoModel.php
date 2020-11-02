<?php

class registroEmpleadoModel extends Model_{

    public function __construct(){
        parent::__construct();
    }
    
    public function insert($datos){
        $query = $this->db->connect()->prepare('INSERT INTO Empleado (Nombre, Apellidos, Direccion, Telefono, Puesto, Correo) VALUES (:Nombre, :Apellidos, :Direccion, :Telefono, :Puesto, :Correo)');
        $query->execute(['Nombre'=>$datos['nombre'],
                         'Apellidos'=>$datos['apellidos'], 
                         'Direccion'=>$datos['direccion'],
                         'Telefono'=>$datos['telefono'],
                         'Puesto'=>$datos['puesto'],
                         'Correo'=>$datos['email']]);
    }
}