<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Personales</title>
</head>
<body>
    
    <form action="" method="GET">
        <label for="dni">NIF:</label>
        <input type="text" id="dni" name="dni" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br><br>

        <label for="estado_social">Estado social:</label>
        <select id="estado_social" name="estado_social">
            <option value="soltero">Soltero</option>
            <option value="casado">Casado</option>
            <option value="divorciado">Divorciado</option>
            <option value="viudo">Viudo</option>
        </select><br><br>

        <label>Tipo de vehículo:</label><br>
        <input type="radio" id="coche" name="vehiculo" value="coche" required>
        <label for="coche">Coche</label><br>
        <input type="radio" id="moto" name="vehiculo" value="moto">
        <label for="moto">Moto</label><br>
        <input type="radio" id="bicicleta" name="vehiculo" value="bicicleta">
        <label for="bicicleta">Bicicleta</label><br><br>

        <input type="submit" value="Enviar">
    </form>
    <?php 
         // Verificar si los datos han sido enviados por el formulario
        if (isset($_GET['dni'], $_GET['telefono'], $_GET['estado_social'], $_GET['vehiculo'])) {
            // Capturando los datos del formulario usando $_GET
            $dni = $_GET['dni'];
            $telefono = $_GET['telefono'];
            $estado_social = $_GET['estado_social'];
            $vehiculo = $_GET['vehiculo'];

        // Usando interpolación de variables para mostrar el resultado
        echo "El usuario con {$dni} responde al {$telefono}, es {$estado_social} y viaja en {$vehiculo}.";
        }
    ?>
    
</body>
</html>