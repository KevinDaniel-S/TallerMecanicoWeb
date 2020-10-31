<?php

include_once 'models/cliente.php';

class registroProductoModel extends Model_{
    
    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        $query = $this->db->connect()->prepare('INSERT INTO Refacciones (Nombre, Precio) VALUES (:Nombre, :Precio)');
        $query->execute(['Nombre'=>$datos['Nombre'], 
                         'Precio'=>$datos['Precio']]);
    }

}