<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'models/Producto.php';
require_once 'helpers/Utils.php';
class ProductoController {
    

    public function index() {
        include_once 'view/producto/destacados.php';
    }
    
    public function gestion() {
        Utils::EsAdmin();
        $producto = new Producto();
        $allProductos = $producto->getAll();
        require_once 'view/producto/gestion.php';
    }
    public function crear() {
        
        Utils::EsAdmin();
        require_once 'view/producto/crear.php';
        
    }
    
    public function save() {
        Utils::EsAdmin();
        if (isset($_POST)) {
                      
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stok = isset($_POST['stok']) ? $_POST['stok'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
         var_dump($nombre);
         var_dump($descripcion);
         var_dump($precio);
         var_dump($stok); 
         var_dump($categoria); 
         
            
            if ($nombre && $descripcion && $precio && $stok && $categoria) {
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setCategoria_id($categoria);
                $producto->setStock($stok);
                
                $save = $producto->save();
                var_dump($save);
                //die();
                
                
                if ($save) {
                    $_SESSION['producto'] = 'complete';
                } else {
                     $_SESSION['producto'] = 'fail';
                }
                
                
                
            } else {
                 $_SESSION['producto'] = 'fail';
            }
            
        }else{
             $_SESSION['producto'] = 'fail';
        }
        header("Location:".base_url.'producto/gestion');
    }

}