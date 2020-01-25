<?php
///las variables edit y prod son definidas en el archivo producto controller
///metodo editar
if (isset($edit) && isset($prod) && is_object($prod)):
    //// definimos cual sera la url a donde enviara el formularo
    $rellenar = true;
    $action = base_url . 'producto/editar&id=' . $prod->id;
 
    ?>
    <h1>EDITAR PRODUCTOS <?= $prod->nombre ?></h1>
    <?php
else:
    $action = base_url . 'producto/save';
    $rellenar = false;
    ?>
    <h1>CREAR NUEVOS PRODUCTOS</h1>
<?php endif; ?>


<form action="<?= $action ?>" method="post" enctype="multipart/form-data">
    <label for="nombre">nombre</label>
    <input type="text" name="nombre" value="<?= $rellenar ? $prod->nombre : '' ?>">

    <label for="descripcion">descripcion</label>
    <textarea type="text" name="descripcion"  ><?= $rellenar ? $prod->descripcion : '' ?></textarea>


    <label for="precio">precio</label>
    <input type="text" name="precio" value="<?= $rellenar ? $prod->precio : '' ?>">


    <label for="stok">stok</label>
    <input type="number" name="stok" value="<?= $rellenar ? $prod->stock : '' ?>"> 


    <?php
    require_once './helpers/Utils.php';
    $categorias = Utils::showCategorias();
    ?>
    <label for="categoria">categoria</label>
    <select type="text" name="categoria">
        <?php while ($cat = $categorias->fetch_object()) : ?>
            <option
                value="<?= $cat->id; ?>" <?= $rellenar && $cat->id == $prod->categoria_id ? 'selected' : ''; ?> >
                    <?= $cat->nombre ?>
            </option>
        <?php endwhile; ?>
    </select>



    <label for="imagen">imagen</label>
    <?php if ($rellenar && !empty($prod->imagen)): ?>
    <img src="<?= base_url ?>uploads/images/<?= $prod->imagen ?>" class="thumb">
    <?php endif; ?>
<br>
    <input type="file" name="imagen">
    <input type="submit">
</form>