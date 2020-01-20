<h1>GESTION DE PRODUCTOS</h1>

<a class="button button-small" href="<?= base_url ?>producto/crear" >CREAR PRODUCTO</a>

<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == "complete") : ?>
<strong class="alert_green">EL PRODUCTO SE A CREADO CORRECTAMENTE</strong>

<?php elseif (isset($_SESSION['producto']) && $_SESSION['prodcuto'] != "complete") : ?>
<strong class="alert_red">EL PRODUCTO NO SE HA CREADO</strong>

<?php endif; ?>

<?php Utils::deleteSession("producto"); ?>


<!--el objeto $allProductos se define en el archivo ProductoController-->
<table class="tabla">
    <tr>

        <td>NOMBRE</td> 
        <td>PRECIO</td>
        <td>STOCK</td>
    </tr>
    <?php while ($pro = $allProductos->fetch_object()) : ?>

    <tr>

        <td ><?= $pro->nombre; ?></td>
        <td ><?= $pro->precio; ?></td>
        <td ><?= $pro->stock; ?></td>

    </tr>
    <?php endwhile; ?>
</table>