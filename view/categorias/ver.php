<!--$categoriaSeleccionada esta  definida en categoria controller funcion ver-->

<?php if (isset($categoriaSeleccionada)): ?>
    <h1><?= $categoriaSeleccionada->nombre ?></h1>
    <?php if ($myProducto->num_rows == 0) : ?>

        <p>No hay productos</p>
    <?php else: ?>
        <?php while ($prod = $myProducto->fetch_object()): ?>

            <div class="product">
                <a href=""></a>
                <img src=<?= base_url ?>uploads/imageddds/<?= $prod->imagen ?>  />
                <h2><?= $prod->nombre ?></h2>
                <p><?= $prod->precio ?></p>
                <a href="" class="button">COMPRAR</a>
            </div> 

        <?php endwhile; ?>
    <?php endif; ?>
<?php else: ?>
    <h1>la categoria no existe</h1>
<?php endif; ?>
