<!--$categoriaSeleccionada esta  definida en categoria controller funcion ver-->

<?php if (isset($categoriaSeleccionada)): ?>
    <h1><?= $categoriaSeleccionada->nombre ?></h1>
    <?php if ($productosSeleccionados->num_rows == 0) : ?>

        <p>No hay productos</p>
    <?php else: ?>
        <?php while ($prod = $productosSeleccionados->fetch_object()): ?>

            <div class="product">
                <a href="<?= base_url ?>producto/ver&id=<?= $prod->id ?>">
                    <img src=<?= base_url ?>uploads/images/<?= $prod->imagen ?>>
                    <h2><?= $prod->nombre ?></h2>
                    <p><?= $prod->precio ?></p>
                </a>
                <a href="<?= base_url?>carrito/add&id=<?= $prod->id?>" class="button">COMPRAR</a>
            </div> 

        <?php endwhile; ?>
    <?php endif; ?>
<?php else: ?>
    <h1>la categoria no existe</h1>
<?php endif; ?>
