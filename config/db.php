<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Database {

    public static function conect() {
        $db = new mysqli('localhost', 'root' , '' , 'tienda_master');
        $db->query("SET NAMES 'UTF-8'");
        return $db; 
        
    }
           

}
Database::conect();