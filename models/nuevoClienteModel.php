<?php

class nuevoClienteModel extends Model_{

    public function __construct(){
        parent::__construct();
    }
    
    public function insert($datos){
        $query = $this->db->connect()->prepare('INSERT INTO Cliente (DNI, Nombre, Apellido, Dirección, Teléfono) VALUES (:DNI, :Nombre, :Apellido, :Direccion, :Telefono)');
        $query->execute(['DNI'=>$datos['DNI'], 'Nombre'=>$datos['Nombre'],
                         'Apellido'=>$datos['Apellido'], 'Direccion'=>$datos['Direccion'],
                         'Telefono'=>$datos['Telefono']]);
    }
}