<?php

include_once 'models/servicio.php';

class serviciosModel extends Model_{
    

    public function __construct(){
        parent::__construct();
    }

    public function select(){
        $items = [];

        $query = $this->db->connect()->query("SELECT r.ID_Reparacion, CONCAT(c.Nombre, ' ' ,c.Apellido) as Propietario, v.Matricula, v.Modelo, v.Color, r.Fecha_Entrada FROM Reparacion r LEFT JOIN Vehiculo v ON r.FK_Matricula = v.Matricula LEFT JOIN Cliente c ON c.DNI = v.FK_DNI ");
        while($row = $query->fetch()){
            $item = new Servicio();
            $item->id = $row['ID_Reparacion'];
            $item->propietario = $row['Propietario'];
            $item->matricula = $row['Matricula'];
            $item->color = $row['Color'];
            $item->modelo = $row['Modelo'];
            $item->fechaEntrada = $row['Fecha_Entrada'];

            array_push($items, $item);
        }
        return $items;
    }

}