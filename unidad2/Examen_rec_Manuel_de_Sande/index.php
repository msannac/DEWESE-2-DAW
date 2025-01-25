<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action="procesar.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="edad">Edad:</label>
        <select id="edad" name="edad">
            <?php for ($i = 18; $i <= 100; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?></option>
            <?php endfor; ?>
        </select><br><br>

        <label>Estado Civil:</label><br>
        <input type="radio" id="casado" name="estado_civil" value="casado" required>
        <label for="casado">Casado</label><br>
        <input type="radio" id="soltero" name="estado_civil" value="soltero">
        <label for="soltero">Soltero</label><br>
        <input type="radio" id="otro" name="estado_civil" value="otro">
        <label for="otro">Otro</label><br><br>

        <label for="sueldo">Rango de Sueldo:</label>
        <select id="sueldo" name="sueldo">
            <option value="0">0 - 10,000</option>
            <option value="10000">10,000 - 20,000</option>
            <option value="20000">20,000 - 30,000</option>
            <option value="30000">30,000 - 40,000</option>
            <option value="40000">40,000 - 50,000</option>
        </select><br><br>

        <label for="hijos">Hijos (uno por línea):</label><br>
        <textarea id="hijos" name="hijos" rows="5" cols="30"></textarea><br><br>

        <label for="domicilios">Domicilios (uno por línea):</label><br>
        <textarea id="domicilios" name="domicilios" rows="5" cols="30"></textarea><br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
