<?php

include_once 'models/producto.php';

class inventarioModel extends Model_{
    
    public function __construct(){
        parent::__construct();
    }

    public function select(){
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT Nombre, Precio FROM Refacciones');
            while($row = $query->fetch()){
                $item = new Producto();
                $item->Nombre   = $row['Nombre'];
                $item->Precio = $row['Precio'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
}