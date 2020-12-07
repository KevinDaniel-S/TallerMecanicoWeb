<?php

include_once 'models/servicio.php';
include_once 'models/empleado.php';

class serviciosModel extends Model_{
    

    public function __construct(){
        parent::__construct();
    }

    public function select(){
        $items = [];

        $query = $this->db->connect()->query("SELECT r.ID_Reparacion, CONCAT(c.Nombre, ' ' ,c.Apellido) as Propietario, v.Matricula, v.Modelo, v.Color, r.Fecha_Entrada FROM Reparacion r LEFT JOIN Vehiculo v ON r.FK_Matricula = v.Matricula LEFT JOIN Cliente c ON c.DNI = v.FK_DNI WHERE Estado='Activo'");
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

    public function release($id){
        $query = $this->db->connect()->prepare("UPDATE Reparacion SET Estado = 'Liberado' WHERE ID_Reparacion = :id");
        $query->execute(['id' => $id]);

    }
    
    public function selectMecanicos(){
        $items = [];
        $query = $this->db->connect()->query("SELECT ID_Empleado, Nombre, Apellidos FROM Empleado WHERE Estado='Libre'");
        while($row = $query->fetch()){
          $item = new Empleado();
          $item->id = $row['ID_Empleado'];
          $item->nombre = $row['Nombre'];
          $item->apellidos = $row['Apellidos'];
          array_push($items, $item);
        }
        return $items;
    }

    public function agregarMecanico($id, $idMecanico){
      //$query1 = $this->db->connect()->prepare("UPDATE Empleado SET Estado='Ocupado' WHERE ID_Empleado = :id"));
      //$query2 = $this->db->connect()->prepare();
      echo $id." ".$idMecanico;
    }
}
