<?php
require_once 'models/Producto.php';
class CarritoController{
    public function index() {
        echo 'controlador controller, index';   
    }
    
    public function add() {
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        }else{
            //die
         
           // die();
            header("Location:" .base_url);
        }
        
        if (isset($_SESSION['carrito'])) {  
            $producto = new Producto();
            $producto->setId($producto_id);
            $productoSeleccionado = $producto->getOne();
            
            if (is_object($productoSeleccionado)) {
                $_SESSION['carrito'][] =  array(
                    "id_producto" => $productoSeleccionado->id,
                    "precio" => $productoSeleccionado->precio,
                    "unidades" => 1,
                    "producto" => $productoSeleccionado
                );
            }
            
        }else{
            //conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $productoSeleccionado = $producto->getOne();
            
            if (is_object($productoSeleccionado)) {
                $_SESSION['carrito'][] =  array(
                    "id_producto" => $productoSeleccionado->id,
                    "precio" => $productoSeleccionado->precio,
                    "unidades" => 1,
                    "producto" => $productoSeleccionado
                );
            }
            
          
        }
        var_dump($_SESSION['carrito']);
        echo 'adadfa';
        die();
        
        header("Location".base_url."carrito/index");
    }
    
    public function remove() {
        
    }
    
    public function eliminaAll() {
        unset($_SESSION['carrito']);
    }
    
}