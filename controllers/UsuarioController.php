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
            //var_dump($usuario);
            if ($save) {
                ///si el registro a terminado con exito 
                $_SESSION['register'] = "completo";
            } else {
                  $_SESSION['register'] = "fallido";
            }
        }else{
              $_SESSION['register'] = "fallido";
              header('Location:'.base_url.'usuario/registro');
        }
      header('Location:'.base_url.'usuario/registro');
    }
    
    public function login() {
        if (isset($_POST)) {
             ///IDENTIFICAR USUARIO
            ///consulta a la base de datos 
            $usuario = new Usuario();

            $resultado = ($usuario->login($_POST['email'], $_POST['password']));
            if ($resultado && is_object($resultado)) {
                $_SESSION['identity'] = $resultado;
                if ($resultado->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['error_login'] = "identificacion fallidia !!!";
            }
            
            

        }
        header("Location:".base_url."usuario/registro");
    }

}