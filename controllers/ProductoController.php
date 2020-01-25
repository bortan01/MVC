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


            if ($nombre && $descripcion && $precio && $stok && $categoria && $imagen) {
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setCategoria_id($categoria);
                $producto->setStock($stok);

                ///GUARDAR LA IMAGEN
                if (isset($_FILES['imagen'])) {

                    $archivo = $_FILES['imagen'];
                    $fileName = $archivo['name'];
                    $extencion = $archivo['type']; ////mime types PHP

                    if ($extencion == "image/jpg" || $extencion == "image/jpeg" || $extencion == "image/png" || $extencion == "image/git") {
                        ///para saber si no existe la carpeta uploads en la raiz del proyecto
                        if (!is_dir('uploads/images')) {
                            ///si no existe la creamos
                            mkdir("uploads/images", 0777, true); ///sin el true no se puede crear un arrchivo de manera recursiva
                        }
                        ///para mover el archivo a la carpeta correspondiente
                        $nombreImagen = Utils::Generar_codigoImagen($fileName, $extencion); ///esta funcion es para evitar perdida de imagenes cuando tengan el mimsmo nombre
                        ///con esto creamos movemos el arrchivo temporar de la imagen a la carpeta correspondiente
                        move_uploaded_file($archivo['tmp_name'], 'uploads/images/' . $nombreImagen);
                        $producto->setImagen($nombreImagen);
                    }
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
        } else {
            $_SESSION['producto'] = 'fail';
        }
        header("Location:" . base_url . 'producto/gestion');
    }

    public function CargarVistaEditar() {
        Utils::EsAdmin();
        $edit = true;
        if (isset($_GET['id'])) {
            $producto = new Producto();
            $producto->setId($_GET['id']);
            $prod = $producto->getOne();
            ///aqui mandamos a llamar a la una vista para que edite los datos del producto 
            require_once 'view/producto/crear.php';
        } else {
            header('Location:' . base_url . 'producto/gestion');
        }
    }

    public function editar() {
   
        
        Utils::EsAdmin();
     
        if (isset($_POST) & isset($_GET)) {
               
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stok = isset($_POST['stok']) ? $_POST['stok'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
            


            if ($nombre && $descripcion && $precio && $stok && $categoria ) {
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setCategoria_id($categoria);
                $producto->setStock($stok);
                $producto->setId($_GET['id']);

                          
                ///GUARDAR LA IMAGEN SI ES QUE SE HA SUBIDO UN ARCHIVO
                if (isset($_FILES['imagen'])) {

                    $archivo = $_FILES['imagen'];
                    $fileName = $archivo['name'];
                    $extencion = $archivo['type']; ////mime types PHP
                    
                  
                    if ($extencion == "image/jpg" || $extencion == "image/jpeg" || $extencion == "image/png" || $extencion == "image/git") {
                        ///para saber si no existe la carpeta uploads en la raiz del proyecto
                        if (!is_dir('uploads/images')) {
                            ///si no existe la creamos
                            mkdir("uploads/images", 0777, true); ///sin el true no se puede crear un arrchivo de manera recursiva
                        }
                        ///para mover el archivo a la carpeta correspondiente
                        $nombreImagen = Utils::Generar_codigoImagen($fileName, $extencion); ///esta funcion es para evitar perdida de imagenes cuando tengan el mimsmo nombre
                        ///con esto creamos movemos el arrchivo temporar de la imagen a la carpeta correspondiente
                        move_uploaded_file($archivo['tmp_name'], 'uploads/images/' . $nombreImagen);
                        $producto->setImagen($nombreImagen);
                    }
                }
                
           

                $update = $producto->update();

                if ($update) {
                    $_SESSION['producto'] = 'complete';
                } else {
                    $_SESSION['producto'] = 'fail';
                }
            } else {
                $_SESSION['producto'] = 'fail';
            }
        } else {
            $_SESSION['producto'] = 'fail';
        }
        header("Location:" . base_url . 'producto/gestion');
    }

    public function eliminar() {
        Utils::EsAdmin();
        if (isset($_GET['id'])) {
            $producto = new Producto();
            $producto->setId($_GET['id']);
            $resultado = $producto->delete();

            if ($resultado) {
                $_SESSION['dellete'] = 'complete';
            } else {
                $_SESSION['dellete'] = 'fail';
            }
        } else {
            $_SESSION['dellete'] = 'fail';
        }
        header('Location:' . base_url . 'producto/gestion');
    }

}
