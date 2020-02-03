<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



class Pedido {
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $db;
    
    function __construct() {
        $this->db = Database::conect();
    }
    function getId() {
        return $this->id;
    }

    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getLocalidad() {
        return $this->localidad;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCoste() {
        return $this->coste;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    function setLocalidad($localidad) {
        $this->localidad = $localidad;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setCoste($coste) {
        $this->coste = $coste;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

        
    
    
    
    public function getAllCategoria() {
      $sql = "select p.*, c.nombre from productos p "
              . "inner join categorias c ON c.id = p.categoria_id "
              . "where p.categoria_id = '{$this->getCategoria_id()}'"
              . " order by id desc";
      $productos =  $this->db->query($sql);
      
      //var_dump($sql);
      echo  $this->db->error;
     // die();
      
      return $productos;
    }
    
   public function save() {
        $sql = "INSERT INTO pedidos values (null, '{$this->getUsuario_id()}','{$this->getProvincia()}', '{$this->getLocalidad()}', '{$this->getDireccion()}' , {$this->getCoste()}, 'confirm',  CURDATE(),CURTIME() )";
               
        $save = $this->db->query($sql);
        var_dump($sql); 
         var_dump($save);
           echo $this->db->error;
//        die();
 
        return $save;
    }
    public function delete() {
         $sql = "delete from productos where id = '{$this->id}'";
         $delete = $this->db->query($sql);
         return $delete;
    }
    public function getOne() {
        $sql = "select * from productos where id = '{$this->getId()}'";
       $producto = $this->db->query($sql);
       return $producto->fetch_object();
    }
    
     public function update() {
         var_dump($this->id);
     
         
         ///verificamos si se ha subido o no una foto nueva
         if ($this->imagen == null) {
              $sql = "UPDATE productos set nombre='{$this->nombre}',categoria_id = '{$this->categoria_id}',  descripcion= '{$this->getDescripcion()}', precio ='{$this->precio}',stock ='$this->stock' where id = '{$this->id}'  ";
         }else{
              $sql = "UPDATE productos set nombre='{$this->nombre}',descripcion= '{$this->getDescripcion()}', precio ='{$this->precio}',stock ='$this->stock',imagen='{$this->imagen}' where id = '{$this->id}'";
         }
         
         
       
               
        $save = $this->db->query($sql);
         echo $this->db->error;
     
       //die();
 
        return $save;
    }

    

}