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
//         var_dump($nombre);
//         var_dump($descripcion);
//         var_dump($precio);
//         var_dump($stok); 
//         var_dump($categoria); 
         
            
            if ($nombre && $descripcion && $precio && $stok && $categoria) {
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setCategoria_id($categoria);
                $producto->setStock($stok);
                
                ///GUARDAR LA IMAGEN
                $archivo = $_FILES['imagen'];
                $fileName = $archivo['name'];
                $extencion = $archivo['type']; ////mime types PHP
                
               
                
                if ($extencion == "image/jpg" || $extencion == "image/jpeg" || $extencion=="image/png" || $extencion=="image/git") {
                   ///para saber si no existe la carpeta uploads en la raiz del proyecto
                    if (!is_dir('uploads/images')) {
                        ///si no existe la creamos
                        mkdir("uploads/images", 0777, true); ///sin el true no se puede crear un arrchivo de manera recursiva
                    }
                    ///para mover el archivo a la carpeta correspondiente
                    move_uploaded_file($archivo['tmp_name'], 'uploads/images/'.$fileName);
                    $producto->setImagen($fileName);
                    
                   

                }
                 $save = $producto->save();

                
                
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