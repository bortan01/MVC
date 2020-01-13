<!--         BARRA LATERAL  -->
<aside id="lateral">
    <h3>ENTRAR A LA WEB</h3>
    <div id="login" class="block_aside">
        <?php if (!isset($_SESSION['identity'])) : ?>
        
        <form action="<?= base_url ?>usuario/login" method="post">
            
    
            <label for="email">Email</label>
            <input type="email" name="email"/>

            <label for="password">password</label>
            <input type="password" name="password"/>
            <input type="submit" value="Eviar">
       
        </form>   
        <?php else :?>
        <h3> <?= ($_SESSION['identity']->nombre . " " . $_SESSION['identity']->email);?> </h3>
        <?php endif; ?>
        <ul>
            <li><a href="#">Mis pedidos</a></li>
            <li><a href="#">Gestionar Categorias</a></li>
            <li><a href="#">Gestionar Productos</a></li>
        </ul>
    </div>
</aside>
<!--        CONTENIDO CENTRAL  -->

<div id="central">
    
    