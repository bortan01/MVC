<h1>CREAR NUEVA CATEGORIA</h1>

<form action="<?= base_url?>/categoria/save" method="POST">
    <label for="nombre">nombre de categoria</label>
    <input type="text" name="nombre">
    <input type="submit" value="guardar"> 
    
</form>