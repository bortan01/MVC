<?php
require_once 'librerias/vendor/autoload.php';


class Usuario {

    private $id;
     public $nombre;
    public $apellido;
    public $email;
    public $password;
    private $imagen;
    private $rol;
    private $db;
            
    
    function __construct() {
        $this->db = Database::conect();
    }

    
    function getId() {
        return real_escape_string($this->id);
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getRol() {
        return $this->rol;
    }
 
    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    public function save() {
        $sql = "INSERT INTO usuarios values (null, '{$this->getNombre()}', '{$this->getApellido()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user',null) ";
       //var_dump($sql);
        //die();
        \FB::log($sql);
        $save = $this->db->query($sql);
        \FB::log($save);
 
        return $save;
    }

    
}