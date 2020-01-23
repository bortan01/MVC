<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Utils {

    public static function deleteSession($nombre) {
        if (isset($_SESSION[$nombre])) {
            $_SESSION[$nombre] = null;
            unset($_SESSION[$nombre]);
        }
        return $nombre;
    }

    public static function EsAdmin() {
        if (!isset($_SESSION['admin'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }

    public static function showCategorias() {
        require_once 'models/Categoria.php';
        $categoria = new Categoria();
        return $categoria->getAll();
    }

   public static function Generar_codigoImagen($cadena) {
        $alatorio = rand(0, 10000);
        $cadena = $alatorio.trim(str_replace(' ', '_', $cadena));
        return $cadena;
    }

}
