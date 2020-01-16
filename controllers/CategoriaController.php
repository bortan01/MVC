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

}
