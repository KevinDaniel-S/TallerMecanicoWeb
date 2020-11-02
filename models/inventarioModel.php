<?php

include_once 'models/producto.php';

class inventarioModel extends Model_{
    
    public function __construct(){
        parent::__construct();
    }

    public function select(){
        $items = [];

        $query = $this->db->connect()->query('SELECT Codigo_R, Nombre, Precio FROM Refacciones');
        while($row = $query->fetch()){
            $item = new Producto();
            $item->id = $row['Codigo_R'];
            $item->Nombre   = $row['Nombre'];
            $item->Precio = $row['Precio'];
            array_push($items, $item);
        }
        return $items;
    }

    public function selectById($id){
        $item = new Producto;

        $query = $this->db->connect()->prepare("SELECT * FROM Refacciones WHERE Codigo_R=:id");
        $query->execute(['id'=>$id]);
        while($row = $query->fetch()){
            $item->id = $row['Codigo_R'];
            $item->Nombre   = $row['Nombre'];
            $item->Precio = $row['Precio'];
        }
        return $item;
    }

    public function update($item){
        $query = $this->db->connect()->prepare("UPDATE Refacciones SET nombre = :nombre, precio = :precio WHERE Codigo_R = :id");
        $query->execute(['id'=>$item['id'], 
                         'nombre'=>$item['nombre'],
                         'precio'=>$item['precio']]);
    }

    public function delete($id){
        $query = $this->db->connect()->prepare("DELETE FROM Refacciones WHERE Codigo_R = :id");
        $query->execute(['id'=>$id]);
    }
}