<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>HTML-Formularios</title>
    </head>
    <body>
        <h1>Inscripción al Congreso de Medicina Santiago 2048</h1><br/>
        <h2>Inscripción al Congreso para médicos especialistas</h2>
        <form action="http://aprenderaprogramar.com" method="get">

            <label for="nombree">Nombre: </label>
            <input type="text" name="nombree" id="nombree">
            <br/> <br/>
            <label for="apellidoe">Apellido: </label>
            <input type="text" name="apellidoe" id="apellidoe">
            <br/> <br/>
            <label for="especialidade">Especialidad: </label>
            <input type="text" name="especialidade" id="especialidade">
            <br/> <br/>
            <label for="obtencione">Año obtencion especialidad: </label>
            <input type="number" name="obtencione" id="obtencione">
            <br/> <br/>
            <input type="submit" value="Enviar">
            <input type="reset">

        </form>
        <br/><br/>
        <h2>Inscripción al Congreso para médicos generalistas</h2>
        <form action="http://aprenderaprogramar.com" method="get">

            <label for="nombreg">Nombre: </label>
            <input type="text" name="nombreg" id="nombreg">
            <br/> <br/>
            <label for="apellidog">Apellido: </label>
            <input type="text" name="apellidog" id="apellidog">
            <br/> <br/>
            <label for="centrog">Centro médico donde ejerce: </label>
            <input type="text" name="centrog" id="centrog">
            <br/> <br/>
            <label for="titulog">Año obtencion del título: </label>
            <input type="number" name="titulog" id="titulog">
            <br/> <br/>
            <input type="submit" value="Enviar">
            <input type="reset">

        </form>
    </body>
</html>