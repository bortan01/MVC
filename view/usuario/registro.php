<h1>Registrarte  
</h1>

<form action="index.php?controller=usuario&action=save" method="POST">
    <label for="nombre">nombre</label>
    <input type="text" name="nombre" required="">
    
    <label for="apellido">Apellido</label>
    <input type="text" name="apellido" required="">
    
    <label for="email">Email</label>
    <input type="email" name="email" required="">
    
    <label for="password">Pasword</label>
    <input type="password" name="password" required="">
    
    <input type="submit" value="Registrarte">
</form>