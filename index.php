<?php
session_start();
require_once './autoload.php';
include_once './config/parameters.php';
require_once './view/layout/header.php';
require_once './view/layout/sidebar.php';
require_once './config/db.php';
require_once './helpers/Utils.php';
////conexion a la base de datos 


function showError() {
    $err = new errorController();
    $err->index();
}

if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'].'Controller';
} else {
   // echo '<br>la pagina que buscas no exise 1';
   showError();
    exit();
}

if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();
    
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    }else{
       // echo 'la pagina que buscas no existe 2';
       showError();
    }
    
} else {
    //echo 'la pagina que buscas no existe 3';
         showError();
}

include_once './view/layout/footer.php';