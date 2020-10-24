<?php

include_once 'models/cliente.php';

class registroVehiculoModel extends Model_{
    
    public function __construct(){
        parent::__construct();
    }

    public function select(){
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT DNI, Nombre, Apellido FROM Cliente');
            while($row = $query->fetch()){
                $item = new Cliente();
                $item->DNI      = $row['DNI'];
                $item->Nombre   = $row['Nombre'];
                $item->Apellido = $row['Apellido'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function insert($datos){
        $query = $this->db->connect()->prepare('INSERT INTO Vehiculo (Matricula, FK_DNI, Modelo, Color) VALUES (:Matricula, :Cliente, :Modelo, :Color)');
        $query->execute(['Matricula'=>$datos['Matricula'], 'Cliente'=>$datos['Cliente'],
                         'Modelo'=>$datos['Modelo'], 'Color'=>$datos['Color']]);
    }

}