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
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellido($apellido) {
        $this->apellido = $this->db->real_escape_string($apellido);
    }

    function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    function setPassword($password) {
        $this->password = password_hash($this->db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);
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
        
        $save = $this->db->query($sql);
        
 
        return $save;
    }

    
}