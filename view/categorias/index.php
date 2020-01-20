 <h1>GESTIONAR CATEGORIAS </h1>

<a class="button button-small" href="<?= base_url?>categoria/crear" >CREAR CATEGORIA</a>


<!--el objeto $todas_categorias se define en el archivoCategoriaController-->
<table class="tabla">
    <tr>
        <td>ID</td>
        <td>NOMBRE</td> 
    </tr>
    <?php while ($cat = $todas_categorias->fetch_object()) : ?>

        <tr>
            <td><?= $cat->id; ?></td>
            <td ><?= $cat->nombre; ?></td>

        </tr>
    <?php endwhile; ?>
</table>