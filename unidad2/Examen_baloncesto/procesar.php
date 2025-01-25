<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados del Equipo</title>
</head>
<body>
    <?php
    function cumpleDomicilio($textoJugadores, $numJugadores, $categoria) {
        $jugadores = explode("\n", trim($textoJugadores));
        $resultados = [
            "cantidad_coincide" => count($jugadores) == $numJugadores,
            "todos_federados" => true,
            "edad_correcta" => true,
            "veteranos_correctos" => true,
            "altura_pivots" => true,
        ];

        foreach ($jugadores as $jugador) {
            list($nombre, $edad, $posicion, $federado, $altura) = explode(" ", trim($jugador));
            $edad = (int)$edad;
            $altura = (int)$altura;

            if ($federado !== "S" && $categoria !== "veteranos") {
                $resultados["todos_federados"] = false;
            }

            if ($categoria === "alevín" && ($edad < 8 || $edad > 11)) {
                $resultados["edad_correcta"] = false;
            }

            if ($categoria === "veteranos" && $edad <= 40) {
                $resultados["veteranos_correctos"] = false;
            }

            if ($posicion === "P" && $altura < 180) {
                $resultados["altura_pivots"] = false;
            }
        }

        return $resultados;
    }

    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $localidad = $_POST['localidad'];
    $director = $_POST['director'];
    $numJugadores = (int)$_POST['num_jugadores'];
    $categoria = $_POST['categoria'];
    $jugadores = $_POST['jugadores'];

    $resultados = cumpleDomicilio($jugadores, $numJugadores, $categoria);

    // Mostrar resultados
    echo "<h1>Resultados del Equipo: $nombre</h1>";
    foreach ($resultados as $condicion => $cumple) {
        $color = $cumple ? "green" : "red";
        echo "<p style='color: $color;'>Condición $condicion: " . ($cumple ? "Cumple" : "No cumple") . "</p>";
    }
    ?>
</body>
</html>
