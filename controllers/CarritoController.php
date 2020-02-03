<?php
require_once 'models/Producto.php';
class CarritoController{
    public function index() {
        include_once 'view/carrito/index.php';
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
           
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }
            
            
        }
        if(!isset($counter)|| $counter == 0  ){
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
          
   
        header("Location:" . base_url . "carrito/index");
    }
    
    public function remove() {
         
    }
    
    public function eliminaAll() {
        unset($_SESSION['carrito']);
    }
    
    
    
}