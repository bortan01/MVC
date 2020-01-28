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
        $this->nombre =  $this->db->real_escape_string($nombre);
    }

    public function getAll() {
        $categorias = $this->db->query("select * from categorias");
        return $categorias;
    }
    
    public function getOne() {
        $categorias = $this->db->query("select * from categorias where id = '{$this->id}'");
        return $categorias->fetch_object();
    }

    public function save() {
        $sql = "INSERT INTO categorias values (null, '{$this->getNombre()}') ";
        $save = $this->db->query($sql);
        return $save;
    }

}
