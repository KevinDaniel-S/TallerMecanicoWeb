<?php

include_once 'models/servicio.php';

class iniciarServicioModel extends Model_{
    

    public function __construct(){
        parent::__construct();
    }

    function select(){
        $items = [];

        $query = $this->db->connect()->query("SELECT v.Matricula, v.Color, v.Modelo, CONCAT(c.Nombre, ' ', c.Apellido) Propietario FROM Vehiculo v INNER JOIN Cliente c	ON v.FK_DNI=c.DNI WHERE v.Matricula NOT IN (SELECT r.FK_Matricula FROM  Reparacion r WHERE Estado='Activo');");
        while($row = $query->fetch()){
            $item = new Servicio();
            $item->matricula = $row['Matricula'];
            $item->color = $row['Color'];
            $item->modelo = $row['Modelo'];
            $item->propietario = $row['Propietario'];

            array_push($items, $item);
        }
        return $items;
    }

    function start($id){

        $query = $this->db->connect()->prepare("INSERT Reparacion (FK_Matricula) VALUES (:id)");
        $query->execute(['id'=>$id]);
         }
}