<?php
include_once 'models/pedido.php';
class PedidoController {

    
    public function index() {
        echo "controlador producto, funcion index";
    }
    
      public function hacer() {
          include_once 'view/pedido/hacer.php';
    }
    public function add() {
       
        if (isset($_SESSION['identity'])) {
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false ;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false ;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false ;
            
    
            
            if ($provincia && $direccion && $localidad) {
                $usuario_id = $_SESSION['identity']->id;
                $stats = Utils::statsCarrito();
                $coste = $stats['total']; 
                
                   $pedido = new Pedido();
                   $pedido->setCoste($coste);
                   $pedido->setUsuario_id($usuario_id);
                   $pedido->setProvincia($provincia);
                   $pedido->setLocalidad($localidad);
                   $pedido->setDireccion($direccion);
                
                $save =   $pedido->save();
                if ($save) {
                    $_SESSION['pedido'] = true;
                }else{
                    $_SESSION['pedido'] = false; 
                }
                   
            }else{
                $_SESSION['pedido'] = false; 
            }
             
            
        }else{
            header("Location:".base_url);
        }
    }

}