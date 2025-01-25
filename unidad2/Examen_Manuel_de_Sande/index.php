<?php
// Definir constantes para los tipos de plantas
define('HORTALIZAS', 1);
define('FLORALES', 2);
define('ORNAMENTALES', 3);
define('TROPICALES', 4);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Tiendas y Plantas</title>
</head>
<body>
    <h1>Formulario Tiendas y Plantas</h1>
    <form action="procesar.php" method="POST">
        <label for="pais">País:</label><br>
        <input type="text" id="pais" name="pais" required><br><br>
        
        <label for="comunidad">Comunidad Autónoma:</label><br>
        <input type="text" id="comunidad" name="comunidad" required><br><br>
        
        <label for="tienda">Tienda Seleccionada:</label><br>
        <select id="tienda" name="tienda">
            <option value="Tienda1">Tienda 1</option>
            <option value="Tienda2">Tienda 2</option>
            <option value="Tienda3">Tienda 3</option>
        </select><br><br>
        
        <label for="eliminar">Eliminar:</label>
        <input type="checkbox" id="eliminar" name="eliminar"><br><br>
        
        <label for="tiendas">Tiendas (formato: Tienda-Nombre-Empleados-Localidad-Invernadero-Facturación-Plantas):</label><br>
        <textarea id="tiendas" name="tiendas" rows="10" cols="50" required></textarea><br><br>
        
        <label for="plantas">Plantas (formato: Tienda-NombrePlanta-Cantidad-Precio-Tipo):</label><br>
        <textarea id="plantas" name="plantas" rows="10" cols="50" required></textarea><br><br>
        
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
