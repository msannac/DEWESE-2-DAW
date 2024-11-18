<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Procesador de Números</title>
    <link rel="stylesheet" href="style.css"> <!-- Incluye el CSS -->
</head>
<body>

<form method="POST">
    <label for="numeros">Ingrese una serie de números separados por espacios:</label>
    <input type="text" id="numeros" name="numeros" required>
    <button type="submit">Enviar</button>
</form>

<?php
// Incluimos el archivo `funciones.php` para acceder a nuestras funciones
include 'funciones.php';

// Verificamos si el formulario ha sido enviado
if (isset($_POST['numeros'])) {
    // Obtenemos el texto ingresado de números
    $textoNumeros = $_POST['numeros'];
    
    // Llamamos a la función con la primera versión (usando funciones) y ordenamos por defecto (true)
    $resultado = procesarNumerosConFunciones($textoNumeros);
    
    // Mostramos el resultado en una tabla
    echo "<h2>Resultados:</h2>";
    echo "<table border='1'>";
    foreach ($resultado as $clave => $valor) {
        echo "<tr><td><strong>$clave</strong></td><td>$valor</td></tr>";
    }
    echo "</table>";
}
?>
</body>
</html>
