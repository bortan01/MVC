<!--la variable todosLosProductos es definida en productoController en metodo index-->
<h1>PRODUCTO DESTACADOS</h1>
<?php while ($prod = $todosLosProductots->fetch_object()): ?>

    <div class="product">
        <a href="<?= base_url?>producto/ver&id<?=$prod->id?>">
            <img src=<?= base_url ?>uploads/images/<?= $prod->imagen ?>>
            <h2><?= $prod->nombre ?></h2>
            <p><?= $prod->precio ?></p>
        </a>
        <a href="" class="button">COMPRAR</a>
    </div> 

<?php endwhile; ?>
