<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'models/Categoria.php';
class CategoriaController {

    public function index() {
        $categoria = new Categoria();
        $todas_categorias = $categoria->getAll();
        require_once 'view/categorias/index.php';
    }
    public function crear() {
        require_once 'view/categorias/crear.php';
    }
    
    public function save() {
       // var_dump(Utils::EsAdmin());
        ///guardar la categoria en la base de datos  
        
        if (isset($_POST) && isset($_POST['nombre'])) {
            $categoria = new Categoria;
            $categoria->setNombre($_POST['nombre']);
            $categoria->save();
            header("Location:".base_url.'categoria/index');
            echo "Location:".base_url.'categoria/index';
            die();
           
        }
        header("Location:".base_url);
 
    }

}
 