<?php

include_once 'models/servicio.php';
include_once 'models/empleado.php';
include_once 'models/refaccion.php';

class serviciosModel extends Model_{
    

    public function __construct(){
        parent::__construct();
    }

    public function select(){
        $items = [];

        $query = $this->db->connect()->query("SELECT r.ID_Reparacion, CONCAT(c.Nombre, ' ' ,c.Apellido) as Propietario, v.Matricula, v.Modelo, v.Color, r.Fecha_Entrada FROM Reparacion r LEFT JOIN Vehiculo v ON r.FK_Matricula = v.Matricula LEFT JOIN Cliente c ON c.DNI = v.FK_DNI WHERE r.Estado='Activo'");
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

    public function release($id, $totals){
      $totalMec = $totals['totalMec'];
      $totalRef = $totals['totalRef'];
      $total    = $totals['total'];
      //Actualizar Reparacion
      $query  = $this->db->connect()->prepare("UPDATE Reparacion 
                                               SET Estado = 'Liberado',
                                                   Fecha_Salida = NOW()        
                                              WHERE ID_Reparacion = :id");
      $query->execute(['id' => $id]);
      //Actualizar Empleados
      $query1 = $this->db->connect()->prepare("UPDATE Empleado
                                               SET Estado = 'Libre'
                                               WHERE ID_Empleado IN (
                                                    SELECT mp.FK_Mecanico 
                                                    FROM Mecanicos_Proyecto mp 
                                                    WHERE mp.FK_Reparacion = :id)");
      $query1->execute(['id' => $id]);
      //Crear factura
      $query2 = $this->db->connect()->prepare("INSERT INTO Factura 
                                                  (ID_Reparacion, Total_Refacciones, Total_Mano_obra, Total)
                                                  VALUES (:id, :totalRef, :totalMec, :total)");
      $query2->execute(['id' => $id,
                        'totalRef'=> $totalRef,
                        'totalMec'=> $totalMec,
                        'total'=>$total]);
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

    public function selectRefacciones($id){
      $items = [];
      $query = $this->db->connect()->prepare("SELECT r.Codigo_R, r.Nombre 
        FROM Refacciones r 
        WHERE r.Codigo_R NOT IN 
          (SELECT hp.FK_Refaccion 
           FROM Hoja_Parte hp 
           WHERE hp.FK_Reparacion = :id)");
      $query->execute(['id'=>$id]);
      while($row = $query->fetch()){
          $item = new Refaccion();
          $item->id = $row['Codigo_R'];
          $item->nombre = $row['Nombre'];
          array_push($items, $item);
        }
      return $items;
    }

    public function agregarMecanico($id, $idMecanico){
      $query1 = $this->db->connect()->prepare("UPDATE Empleado SET Estado='Ocupado' WHERE ID_Empleado = :idMecanico");
      $query1->execute(['idMecanico'=>$idMecanico]);
      $query2 = $this->db->connect()->prepare("INSERT INTO Mecanicos_Proyecto (FK_Mecanico, FK_Reparacion) VALUES (:idMecanico, :id)");
      $query2->execute(['idMecanico'=>$idMecanico,
                        'id'=>$id]);
    }

    public function agregarRefaccion($id, $idRefaccion, $cantidad){
      $query = $this->db->connect()->prepare("INSERT INTO Hoja_Parte (FK_Reparacion, FK_Refaccion, Cantidad) 
                                                              VALUES (:id, :idRefaccion, :cantidad)");
      $query->execute(['id'=>$id,
                       'idRefaccion'=>$idRefaccion,
                       'cantidad'=>$cantidad]);
    }

    public function mecanicosProyecto($id){
        $items = [];
        $query = $this->db->connect()->prepare("SELECT e.ID_Empleado, CONCAT(e.Nombre, ' ', e.Apellidos) nombre, e.Puesto FROM Mecanicos_Proyecto mp 
        JOIN Empleado e 
        ON mp.FK_Mecanico = e.ID_Empleado  
        WHERE mp.FK_Reparacion = :id");
        $query->execute(['id'=>$id]);
        while($row = $query->fetch()){
          $item = new Empleado();
          $item->id = $row['ID_Empleado'];
          $item->nombre = $row['nombre'];
          $item->puesto = $row['Puesto'];
          array_push($items, $item);
        }
        return $items;
    }

    public function refaccionesProyecto($id){
        $items = [];
        $query = $this->db->connect()->prepare("SELECT r.Codigo_R, r.Nombre, hp.Cantidad, r.Precio 
                                                FROM Hoja_Parte hp 
                                                JOIN Refacciones r
                                                  ON r.Codigo_R = hp.FK_Refaccion 
                                                WHERE hp.FK_Reparacion = :id");
        $query->execute(['id'=>$id]);
        while($row = $query->fetch()){
          $item = new Refaccion();
          $item->id = $row['Codigo_R'];
          $item->nombre = $row['Nombre'];
          $item->cantidad = $row['Cantidad'];
          $item->precio = $row['Precio'];
          array_push($items, $item);
        }
        return $items;
    }
    public function detalleServicio($id){
      $query = $this->db->connect()->prepare("SELECT r.ID_Reparacion, r.Fecha_Entrada, r.Fecha_Salida, 
		                                     v.Matricula, v.Modelo, v.Color,
		                                     c.Nombre, c.Apellido
                                              FROM Reparacion r
                                                INNER JOIN Vehiculo v 
    		                                  ON v.Matricula = r.FK_Matricula
	                                        INNER JOIN Cliente c
                                                  ON v.FK_DNI = c.DNI
                                              WHERE r.ID_Reparacion = :id;");
      $query->execute(['id'=>$id]);
      $row = $query->fetch();
      return $row;
    }
}
