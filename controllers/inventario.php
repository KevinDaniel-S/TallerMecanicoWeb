<?php

class Inventario extends SessionController{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->datos = [];
    }

    function render(){
        $productos = $this->model->select();
        $this->view->datos = $productos;
        $this->view->render('inventario/index');
    }

    function verProducto($param = null){
        $idProducto = $param[0];
        $producto = $this->model->selectById($idProducto);

        session_start();
        $_SESSION['idProducto'] = $producto->id;

        $this->view->producto = $producto;
        $this->view->render("inventario/detalle");
    }

    function editarProducto(){
        session_start();
        $id     = $_SESSION['idProducto'];
        $nombre = $_POST['Nombre'];
        $precio = $_POST['Precio'];
        unset($_SESSION['idProducto']);

        try {
            $this->model->update(['id' => $id, 'nombre' => $nombre, 
                                  'precio' => $precio]);
            $item = new Producto();
            $item->id = $id;
            $item->Nombre   = $nombre;
            $item->Precio = $precio;

            $this->view->producto = $item;
            $this->view->mensaje = "Producto actualizado satisfactoriamente";
        } catch (Exception $e) {
            $this->view->mensaje = "Error";
        }
        $this->view->render('inventario/detalle');
    }

    function eliminarProducto($param = null){
        $id = $param[0];
        if ($this->model->delete($id)) {
            $this->view->mensaje = "Producto eliminado correctamente";
        } else {
            $this->view->mensaje = "Error";
        }
        $this->render();
        
    }
}
