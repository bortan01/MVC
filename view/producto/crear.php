<h1>CREAR NUEVOS PRODUCTOS</h1>

<form action="<?= base_url ?>producto/save" method="post" enctype="multipart/form-data">
    <label for="nombre">nombre</label>
    <input type="text" name="nombre">

    <label for="descripcion">descripcion</label>
    <textarea type="text" name="descripcion"></textarea>

  
    <label for="precio">precio</label>
    <input type="text" name="precio">


    <label for="stok">stok</label>
    <input type="number" name="stok"> 


    <?php
    require_once './helpers/Utils.php';
    $categorias = Utils::showCategorias();
    ?>
    <label for="categoria">categoria</label>
    <select type="text" name="categoria">
        <?php while ($cat = $categorias->fetch_object()) : ?>
            <option value="<?= $cat->id ?>">
                <?= $cat->nombre ?>
            </option>
        <?php endwhile; ?>
    </select>



    <label for="imagen">imagen</label>
    <input type="file" name="imagen">

    <input type="submit">
</form>