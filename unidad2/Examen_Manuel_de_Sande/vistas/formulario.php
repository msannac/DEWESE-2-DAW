
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Tiendas</title>
    <link rel="stylesheet" href="../estilos/estilo.css">
</head>
<body>
    <h1>Formulario de Tiendas</h1>
    <form action="../logica/procesar_datos.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="pais">País:</label>
        <input type="text" id="pais" name="pais" required><br>

        <label for="comunidad">Comunidad Autónoma:</label>
        <input type="text" id="comunidad" name="comunidad" required><br>

        <label for="tienda">Tienda seleccionada:</label>
        <select id="tienda" name="tienda">
            <option value="Tienda Natural">Tienda Natural</option>
            <option value="Verde Hogar">Verde Hogar</option>
            <option value="Floral Arte">Floral Arte</option>
        </select><br>

        <label for="eliminar">Eliminar:</label>
        <input type="checkbox" id="eliminar" name="eliminar"><br>

        <label for="tiendas">Tiendas:</label><br>
        <textarea id="tiendas" name="tiendas" rows="5" cols="50" required></textarea><br>

        <label for="plantas">Plantas:</label><br>
        <textarea id="plantas" name="plantas" rows="5" cols="50" required></textarea><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
