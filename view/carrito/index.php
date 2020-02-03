<h1>Carrito de la compra</h1> 

<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>

    <?php
    $carrito = $_SESSION['carrito'];
    foreach ($carrito as $indice => $value) :
        ?>


        <tr>
            <th>
                <img src="<?= base_url ?>uploads/images/<?= $value['producto']->imagen ?>" class="img_carrito">

            </th>
            <th><?= $value['producto']->nombre ?></th>
            <th><?= $value['producto']->precio ?></th>
            <th><?= $value['unidades'] ?></th>

        </tr>
<?php endforeach; ?>

</table>
<?php $stats = Utils::statsCarrito(); ?>

<div class="total-carrito">
    <h3>PRECIO TOTAL: $<?= $stats['total'] ?> </h3>

    <a href="<?=base_url?>pedido/hacer" class="button button-pedido">CONFIRMAR EL PEDIDO</a>
</div>