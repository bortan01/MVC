<?php

require_once 'models/usuario.php';
class UsuarioController {

    public function index() {
        echo "controlador usuarios, funcion index";
    }
    
    function registro() {
        require_once 'view/usuario/registro.php';
    }
    
    public function save() {
        if (isset($_POST)) {
             $usuario = new Usuario;
             $usuario->setNombre($_POST['nombre']);
             $usuario->setApellido($_POST['apellido']);
             $usuario->setEmail($_POST['email']);
             $usuario->setPassword($_POST['password']);
             $save = $usuario->save();
            // var_dump($usuario);
            var_dump($save);
            if ($save) {
                echo 'registro completado';
            } else {
                echo 'registro fallido';
            }
        }
    
    }

}