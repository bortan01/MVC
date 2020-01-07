<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Connect {

    public static function conect($param) {
        $db = new mysqli('lochalhost', 'root' , '' , 'tienda_master');
        $db->query("SET NAMES 'UTF-8'");
        return $db; 
        
    }
            
    function __construct() {
        
    } 

}