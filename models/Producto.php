<?php

class Producto {
    private $id;
    private $nombre;
    private $categoria_id;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
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

    function getCategoria_id() {
        return $this->categoria_id;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function getOferta() {
        return $this->oferta;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string( $nombre);
    }

    function setCategoria_id($categoria_id) {
        $this->categoria_id = $this->db->real_escape_string($categoria_id);
    }

    function setDescripcion($descripcion) {
        $this->descripcion =$this->db->real_escape_string( $descripcion);
    }

    function setPrecio($precio) {
        $this->precio = $this->db->real_escape_string($precio);
    }

    function setStock($stock) {
        $this->stock =$this->db->real_escape_string( $stock);
    }

    function setOferta($oferta) {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    function setFecha($fecha) {
        $this->fecha =$this->db->real_escape_string( $fecha);
    }

    function setImagen($imagen) {
        $this->imagen = $this->db->real_escape_string($imagen);
    }
    public function getAll() {
      $productos =  $this->db->query("select * from productos order by id desc");
      return $productos;
    }
   public function save() {
        $sql = "INSERT INTO productos values  (null,'{$this->categoria_id}','{$this->nombre}', '{$this->getDescripcion()}', '{$this->precio}', '$this->stock', '{$this->oferta}', curdate(),'{$this->imagen}' )";
               
        $save = $this->db->query($sql);
//        var_dump($sql);
//         var_dump($save);
//        die();
 
        return $save;
    }

    

}