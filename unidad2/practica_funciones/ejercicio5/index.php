<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contador de consonantes y letras</title>
    <link rel="stylesheet" href="style.css"> <!-- Incluye el CSS -->
</head>
<body>

<form method="POST">
    <label for="nombre">Ingrese su nombre completo:</label>
    <input type="text" id="nombre" name="nombre" required>
    <button type="submit">Enviar</button>
</form>

<?php
// Incluimos las funciones del archivo `funciones.php`
include 'funciones.php';

// Verificamos si el formulario ha sido enviado comprobando la existencia de la clave 'nombre' en $_POST
if (isset($_POST['nombre'])) {
    // Obtenemos el nombre ingresado y lo limpiamos de espacios innecesarios
    $nombre = $_POST['nombre'];
    
    // Eliminamos los espacios en blanco al inicio y al final de la cadena
    $nombre = trim($nombre);

    // Mostramos el nombre ingresado en el formulario
    echo "<h2>Nombre ingresado: $nombre</h2>";
    
    // Imprimir resultados usando funciones de cadena y sin funciones
    echo "<h2>Resultado usando funciones de cadena:</h2>";
    analizarNombreConFunciones($nombre);
    
    echo "<h2>Resultado sin funciones de cadena:</h2>";
    analizarNombreSinFunciones($nombre);
}
?>
</body>
</html>
