<?php

class UsuarioController {

    public function index() {
        echo "controlador usuarios, funcion index";
    }
    
    function registro() {
        require_once 'view/usuario/registro.php';
    }
    
    public function saveUsuario() {
        if (isset($_POST)) {
            var_dump($_POST);
        }
    }

}