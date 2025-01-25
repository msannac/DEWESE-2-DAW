<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Videojuego</title>
</head>
<body>
    <h1>Información del Videojuego</h1>
    <form action="procesar.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="categoria">Categoría:</label>
        <select id="categoria" name="categoria">
            <option value="aventura">Aventura</option>
            <option value="plataformas">Plataformas</option>
            <option value="shooter">Shooter</option>
        </select><br><br>

        <label>Digital:</label>
        <input type="radio" name="digital" value="si" required> Sí
        <input type="radio" name="digital" value="no"> No<br><br>

        <label for="desarrollador">Desarrollador:</label>
        <input type="text" id="desarrollador" name="desarrollador" required><br><br>

        <label for="precio">Precio (€):</label>
        <select id="precio" name="precio">
            <?php for ($i = 1; $i <= 150; $i++) echo "<option value='$i'>$i</option>"; ?>
        </select><br><br>

        <label for="fecha">Fecha de Lanzamiento:</label>
        <input type="date" id="fecha" name="fecha" required><br><br>

        <label for="fases">Fases:</label>
        <textarea id="fases" name="fases" rows="5" cols="30" placeholder="Ejemplo: Selva 50 S"></textarea><br><br>

        <label for="almacenes">Almacenes:</label>
        <textarea id="almacenes" name="almacenes" rows="5" cols="30" placeholder="Ejemplo: jaén colibri 4 españa"></textarea><br><br>

        <button type="submit">Enviar Solicitud</button>
    </form>
</body>
</html>
