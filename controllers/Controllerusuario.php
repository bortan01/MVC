<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UsuarioController {

    public function mostrarTodos() {
        require_once 'models/usuario.php';
        $usuario = new Usuario();
        $todos_los_usuarios = $usuario->conseguirTodos();
        require_once 'view/usuarioView/mostrarTodos.php';
    
    }
    function crear() {
        require_once 'view/usuarioView/Crear.php';
    }

}


