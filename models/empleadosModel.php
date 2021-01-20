<?php

include_once 'models/empleado.php';

class empleadosModel extends Model_{
    
    public function __construct(){
        parent::__construct();
    }

    public function select(){
        $items = [];

        $query = $this->db->connect()->query('SELECT ID_Empleado, Nombre, Apellidos, Direccion, Telefono, Estado, Puesto, Correo FROM Empleado WHERE Estado!="Despedido"');
        while($row = $query->fetch()){
            $item = new Empleado();
            $item->id = $row['ID_Empleado'];
            $item->nombre   = $row['Nombre'];
            $item->apellido = $row['Apellidos'];
            $item->direccion = $row['Direccion'];
            $item->email = $row['Correo'];
            $item->telefono = $row['Telefono'];
            $item->libre = $row['Estado'];
            $item->puesto = $row['Puesto'];
            
            array_push($items, $item);
        }
        return $items;
    }

    public function selectById($id){
        $item = new Empleado;

        $query = $this->db->connect()->prepare("SELECT ID_Empleado, Nombre, Apellidos, Direccion, Telefono, Estado, Puesto, Correo FROM Empleado WHERE ID_Empleado=:id");
        $query->execute(['id'=>$id]);
        while($row = $query->fetch()){
            $item->id = $row['ID_Empleado'];
            $item->nombre   = $row['Nombre'];
            $item->apellido = $row['Apellidos'];
            $item->direccion = $row['Direccion'];
            $item->email = $row['Correo'];
            $item->telefono = $row['Telefono'];
            $item->libre = $row['Estado'];
            $item->puesto = $row['Puesto'];
        }
        return $item;
    }

    public function update($item){
        $query = $this->db->connect()->prepare("UPDATE Empleado SET Nombre = :nombre, Apellidos = :apellido, Direccion = :direccion, Telefono = :telefono, Puesto = :puesto, Correo = :correo WHERE ID_Empleado = :id");
        $query->execute(['id'=>$item['id'], 
                         'nombre'=>$item['nombre'],
                         'apellido'=>$item['apellido'],
                         'direccion'=>$item['direccion'],
                         'telefono'=>$item['telefono'],
                         'puesto'=>$item['puesto'],
                         'correo'=>$item['email']]);
    }

    public function delete($id){
        $query = $this->db->connect()->prepare("UPDATE Empleado SET Estado = 'Despedido' WHERE ID_Empleado = :id");
        $query->execute(['id'=>$id]);
    }
}
