<h1>GESTION DE PRODUCTOS</h1>

<a class="button button-small" href="<?= base_url?>producto/crear" >CREAR PRODUCTO</a>


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