<?php

/*Escriba un programa que cada vez que se ejecute muestre 
la tirada de dos jugadores que tiran dos monedas al azar cada uno. 
Gana el que saque dos caras.
Si no ha ganado nadie debe de mostrar un botón que vuelva a ejecutar el programa.*/


// Inicializar variables
$jugador1 = array();
$jugador2 = array();
$ganador = null;
// Lanzar las monedas para el Jugador 1
$moneda1 = rand(0, 1); // 0 = cruz, 1 = cara
if ($moneda1 == 1) {
    $jugador1[] = 'cara';
} else {
    $jugador1[] = 'cruz';
}
$moneda2 = rand(0, 1); // 0 = cruz, 1 = cara
if ($moneda2 == 1) {
    $jugador1[] = 'cara';
} else {
    $jugador1[] = 'cruz';
}
// Lanzar las monedas para el Jugador 2
$moneda3 = rand(0, 1); // 0 = cruz, 1 = cara
if ($moneda3 == 1) {
    $jugador2[] = 'cara';
} else {
    $jugador2[] = 'cruz';
}
$moneda4 = rand(0, 1); // 0 = cruz, 1 = cara
if ($moneda4 == 1) {
    $jugador2[] = 'cara';
} else {
    $jugador2[] = 'cruz';
}
// Determinar el ganador
if ($jugador1[0] == 'cara' && $jugador1[1] == 'cara') {
    $ganador = 'Jugador 1';
} elseif ($jugador2[0] == 'cara' && $jugador2[1] == 'cara') {
    $ganador = 'Jugador 2';
}
// Mostrar los resultados
// Incluir imágenes de cara y cruz
$cara = "<img src='/DEWESE-2-DAW/unidad2/practica_tema2/monedas/cara.jpg' alt='cara'>";
$cruz = "<img src='/DEWESE-2-DAW/unidad2/practica_tema2/monedas/cruz.jpg' alt='cruz'>";
// Mostrar los resultados
echo "<h3>Resultados de la tirada:</h3>";
echo "<p>Jugador 1: " . ($jugador1[0] == 'cara' ? $cara : $cruz) . ", " . ($jugador1[1] == 'cara' ? $cara : $cruz) . "</p>";
echo "<p>Jugador 2: " . ($jugador2[0] == 'cara' ? $cara : $cruz) . ", " . ($jugador2[1] == 'cara' ? $cara : $cruz) . "</p>";
//echo "<h3>Resultados de la tirada:</h3>";
//echo "<p>Jugador 1: " . ($jugador1[0] == 'cara' ? 'cara' : 'cruz') . ", " . ($jugador1[1] == 'cara' ? 'cara' : 'cruz') . "</p>";
//echo "<p>Jugador 2: " . ($jugador2[0] == 'cara' ? 'cara' : 'cruz') . ", " . ($jugador2[1] == 'cara' ? 'cara' : 'cruz') . "</p>";

if ($ganador) {
    echo "<h2>¡$ganador ha ganado!</h2>";
} else {
    echo "<h2>No hay ganador. ¡Intenta de nuevo!</h2>";
    // Botón para reiniciar
    echo "<form method='post'>";
    echo "<button type='submit' name='reiniciar'>Reiniciar Tirada</button>";
    echo "</form>";
}
// Reiniciar el programa si se ha solicitado
if (isset($_POST['reiniciar'])) {
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

