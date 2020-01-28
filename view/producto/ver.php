<!--$myProducto esta definido en producto controller metodo ver-->
<h1>ver producto </h1> 


<?php if (isset($myProducto)): ?>
    <h1><?= $myProducto->nombre ?></h1>

    <?php if ($myProducto->imagen != null) : ?>
        <img src="<?= base_url ?>uploads/images/<?= $myProducto->imagen ?> " >
    <?php else: ?>
        <img src="<?= base_url ?>uploads/images/<?= $myProducto->imagen ?>"  >
    <?php endif; ?>
        <p><?= $myProducto->descripcion?></p>
        <p><?= $myProducto->precio?></p>
        <a href="" class="button">COMPRAR</a>

<?php else: ?>
    <h1>el producto no existe</h1>
<?php endif; ?>
