<?php
require_once './autoload.php';
require_once './view/layout/header.php';
require_once './view/layout/sidebar.php';


if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'].'Controller';
} else {
    echo 'la pagina que buscas no exise 1';
    exit();
}

if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();
    
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    }else{
        echo 'la pagina que buscas no existe 2';
    }
    
} else {
    echo 'la pagina que buscas no existe 3';
}
echo 'dfadfadfadfadfaf';
include_once './view/layout/footer.php';