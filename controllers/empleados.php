<?php

class Empleados extends SessionController{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->datos = [];
    }

    function render(){
      try{
        $empleados = $this->model->select();
      } catch (Exception $e){
        $this->view->mensaje = $e->getMessage();
      }
        $this->view->datos = $empleados;
        $this->view->render('empleados/index');
    }

    function verEmpleado($param = null){
        $idEmpleado = $param[0];
        $empleado = $this->model->selectById($idEmpleado);

        session_start();
        $_SESSION['idEmpleado'] = $empleado->id;

        $this->view->empleado = $empleado;
        $this->view->render("empleados/detalle");
    }

    function editarEmpleado(){
        session_start();
        $id     = $_SESSION['idEmpleado'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $puesto = $_POST['puesto'];
        unset($_SESSION['idEmpleado']);

        try {
            $this->model->update(['id' => $id, 
                                  'nombre' => $nombre, 
                                  'apellido' => $apellidos,
                                  'direccion' => $direccion,
                                  'telefono' => $telefono,
                                  'email' => $email,
                                  'puesto' => $puesto]);
            $item = new Empleado();
            $item->id = $id;
            $item->nombre   = $nombre;
            $item->apellido = $apellidos;
            $item->direccion = $direccion;
            $item->email = $email;
            $item->telefono = $telefono;
            $item->puesto = $puesto;

            $this->view->empleado = $item;
            $this->view->mensaje = "Empleado actualizado satisfactoriamente";
        } catch (Exception $e) {
            $this->view->mensaje = $e->getMessage();
        }
        $this->view->render('empleados/detalle');
    }

    function eliminarEmpleado($param = null){
      $id = $param[0];
      if($id != $_SESSION['id']){
        try {
            $this->model->delete($id);
            $this->view->mensaje = "Empleado eliminado correctamente";
        } catch (Exception $e) {
            $this->view->mensaje = $e->getMessage();
        }
      } else {
        $this->view->mensaje = "No puedes eliminarte a ti mismo";
      }
        $this->render();
    }
}
