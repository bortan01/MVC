<?php

/* 
con esta funcion cargaremos de manera automatica todos los controladores
 */

function autocargar($classname) {
    include './controllers/'.$classname . '.php';
}

spl_autoload_register('autocargar');