<?php

class Categoria {

   private $id;
   private $nombre;
   private $db;
   
   function __construct() {
       $this->db = Database::conect();
   }
   
   function getId() {
       return $this->id;
   }

   function getNombre() {
       return $this->nombre;
   }

   function setId($id) {
       $this->id = $id;
   }

   function setNombre($nombre) {
       $this->nombre = $nombre;
   }
   
   public function getAll() {
       $categorias = $this->db->query("select * from categorias");
       return $categorias;
   }




   

}
