<?php if (isset($_SESSION['identity'])) : ?>
    <h1>HACER PEDIDO</h1>
    <a href="<?= base_url ?>carrito/index" >ver los productos y el precio del pedido</a>
    <h3>DOMICILIO DE ENVIO</h3>
    
    
    
    <form action="<?= base_url?>pedido/add" method="post">
        <label for="provincia">PROVICIA</label>
        <input type="text" value="" name="provincia" id="provincia">
        
        <label for="localidad">LOCALIDAD</label>
        <input type="text" value="" name="localidad" id="localidad">
        
        <label for="direccion">DIRECCION</label>
        <input type="text" value="" name="direccion" id="direccion">
        
        <input type="submit" value="confirmar ">
        
    </form>
    
    
<?php else: ?>
    <h1>NECESITAS ESTAR IDENTIFICADO</h1>
<?php endif; ?>
