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
            //if ($result->rowCount() > 0){
            //    foreach ($result->fetchAll() as $column) {
            //        echo "<option value=\"".$column[0]."\">".$column[1]." ".$column[2]."</option>";
            //    }
            //}
        } catch (PDOException $e) {
            return [];
        }
    }

}