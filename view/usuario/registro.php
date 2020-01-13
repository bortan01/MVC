<h1>Registrarte  
</h1>

<?php
///ESTO ES POR SI YA VIENE REDIRIGIDO Y SE HA GUARDADO O NO 
if (isset($_SESSION['register']) && ($_SESSION['register'] == 'completo')) :?>
    <strong>registro completado</strong>
    <?php elseif  (isset($_SESSION['register']) && ($_SESSION['register'] == 'fallido')): ?>
    <strong>registro fallido</strong>
<?php endif; ?>
   <?php Utils::deleteSession('register') ?> 
   
<!--<form action="index.php?controller=usuario&action=save" method="POST">-->
<form action="<?=base_url?>usuario/save" method="POST">
    
      <label for="nombre">nombre</label>
    <input type="text" name="nombre" >

    <label for="apellido">Apellido</label>
    <input type="text" name="apellido" >

    <label for="email">Email</label>
    <input type="email" name="email" >

    <label for="password">Pasword</label>
    <input type="password" name="password" reired="">

    <input type="submit" value="Registrar">
    
    
</form>

