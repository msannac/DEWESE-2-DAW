<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Equipo de Baloncesto</title>
</head>
<body>
    <form action="procesar.php" method="post" enctype="multipart/form-data">
        <h1>Registro de Equipo de Baloncesto</h1>
        <label for="nombre">Nombre del Equipo:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="localidad">Localidad:</label>
        <select id="localidad" name="localidad">
            <option value="Madrid">Madrid</option>
            <option value="Barcelona">Barcelona</option>
            <option value="Valencia">Valencia</option>
        </select><br><br>

        <label for="director">Director General:</label>
        <input type="text" id="director" name="director" required><br><br>

        <label for="num_jugadores">Número de Jugadores:</label>
        <select id="num_jugadores" name="num_jugadores">
            <?php for ($i = 1; $i <= 40; $i++) { echo "<option value='$i'>$i</option>"; } ?>
        </select><br><br>

        <label for="logo">Logo del Equipo:</label>
        <input type="file" id="logo" name="logo" accept="image/*" required><br><br>

        <label for="presupuesto">Presupuesto:</label>
        <input type="radio" name="presupuesto" value="0-10000" required> 0-10,000
        <input type="radio" name="presupuesto" value="10000-100000"> 10,000-100,000
        <input type="radio" name="presupuesto" value=">100000"> >100,000<br><br>

        <label for="categoria">Categoría:</label>
        <select id="categoria" name="categoria">
            <option value="alevín">Alevín</option>
            <option value="general">General</option>
            <option value="veteranos">Veteranos</option>
        </select><br><br>

        <label for="jugadores">Jugadores (uno por línea):</label><br>
        <textarea id="jugadores" name="jugadores" rows="10" cols="50" placeholder="Ejemplo: Juan 23 P S 197"></textarea><br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
