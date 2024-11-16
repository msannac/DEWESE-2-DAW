<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alturas</title>
</head>
<body>
    <?php 
    // Inicializar las variables para evitar errores si el formulario no ha sido enviado
    $nombres = [];
    $alturas_str = [];
    $alturas = [];
    
    // Verificar si los nombres y las alturas han sido enviadas
    if (
        isset($_GET['nombre1'], $_GET['nombre2'], $_GET['nombre3'], $_GET['nombre4'], $_GET['nombre5']) &&
        isset($_GET['altura1'], $_GET['altura2'], $_GET['altura3'], $_GET['altura4'], $_GET['altura5'])
    ) {
        // Capturando los nombres del formulario
        $nombres = [
            $_GET['nombre1'],
            $_GET['nombre2'],
            $_GET['nombre3'],
            $_GET['nombre4'],
            $_GET['nombre5']
        ];

        // Capturando las alturas en formato string del formulario
        $alturas_str = [
            $_GET['altura1'],
            $_GET['altura2'],
            $_GET['altura3'],
            $_GET['altura4'],
            $_GET['altura5']
        ];

        // Convertir las alturas de string a float con 3 decimales
        $alturas = [];

        for ($i = 0; $i < count($alturas_str); $i++) {
             $alturas[] = round(floatval($alturas_str[$i]), 3);
        }


        // Calcular la altura media
        $suma_alturas = array_sum($alturas);
        $altura_media = round($suma_alturas / count($alturas), 1); // Altura media con un decimal

        // Encontrar la persona más alta
        $altura_mas_alto = 0;
        $indice_mas_alto = 0;

        for ($i = 0; $i < count($alturas); $i++) {
             if ($alturas[$i] > $altura_mas_alto) {
            $altura_mas_alto = $alturas[$i];
            $indice_mas_alto = $i;
            }
        }

        $nombre_mas_alto = $nombres[$indice_mas_alto];
        $altura_mas_alto = round($altura_mas_alto); // Sin decimales


        // Mostrar los resultados
        echo "La altura media de las personas es: {$altura_media} metros.<br>";
        echo "La persona más alta es {$nombre_mas_alto} con una altura de {$altura_mas_alto} metros.";
    }
?>

<form action="" method="GET">
        <h3>Ingrese los nombres y alturas de 5 personas</h3>

        <!-- Persona 1 -->
        <label for="nombre1">Nombre 1:</label>
        <input type="text" id="nombre1" name="nombre1" required><br><br>

        <label for="altura1">Altura 1 (en metros):</label>
        <input type="text" id="altura1" name="altura1" required><br><br>

        <!-- Persona 2 -->
        <label for="nombre2">Nombre 2:</label>
        <input type="text" id="nombre2" name="nombre2" required><br><br>

        <label for="altura2">Altura 2 (en metros):</label>
        <input type="text" id="altura2" name="altura2" required><br><br>

        <!-- Persona 3 -->
        <label for="nombre3">Nombre 3:</label>
        <input type="text" id="nombre3" name="nombre3" required><br><br>

        <label for="altura3">Altura 3 (en metros):</label>
        <input type="text" id="altura3" name="altura3" required><br><br>

        <!-- Persona 4 -->
        <label for="nombre4">Nombre 4:</label>
        <input type="text" id="nombre4" name="nombre4" required><br><br>

        <label for="altura4">Altura 4 (en metros):</label>
        <input type="text" id="altura4" name="altura4" required><br><br>

        <!-- Persona 5 -->
        <label for="nombre5">Nombre 5:</label>
        <input type="text" id="nombre5" name="nombre5" required><br><br>

        <label for="altura5">Altura 5 (en metros):</label>
        <input type="text" id="altura5" name="altura5" required><br><br>

        <input type="submit" value="Enviar">
    </form>

</body>
</html>