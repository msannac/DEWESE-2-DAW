<?php

/*Escriba un programa que cada vez que se ejecute:
saque dos cartas de baraja de poker al azar 
y diga si ha salido una pareja de valores iguales 
y el mayor de los valores obtenidos. 
Mostrar las cartas con imágenes */


// Seleccionar dos cartas al azar
$valor1 = rand(2, 14);
$valor2 = rand(2, 14);

// Asignar nombres a los valores
$nombreValor1 = ($valor1 == 11) ? "jota" : (($valor1 == 12) ? "reina" : (($valor1 == 13) ? "rey" : (($valor1 == 14) ? "as" : (string)$valor1)));
$nombreValor2 = ($valor2 == 11) ? "jota" : (($valor2 == 12) ? "reina" : (($valor2 == 13) ? "rey" : (($valor2 == 14) ? "as" : (string)$valor2)));

// Asignar palos al azar
$palo1 = (rand(1, 4) == 1) ? "corazones" : ((rand(1, 4) == 2) ? "diamantes" : ((rand(1, 4) == 3) ? "picas" : "treboles"));
$palo2 = (rand(1, 4) == 1) ? "corazones" : ((rand(1, 4) == 2) ? "diamantes" : ((rand(1, 4) == 3) ? "picas" : "treboles"));

// Mostrar las imágenes de las cartas
echo "<h3>Primera carta:</h3>";
echo "<img src='/DES/unidad2/practica_tema2/PNG-cards-1.3/{$nombreValor1}_{$palo1}.png' alt='{$nombreValor1} de {$palo1}' />";
echo "<h3>Segunda carta:</h3>";
echo "<img src='/DES/unidad2/practica_tema2/PNG-cards-1.3/{$nombreValor2}_{$palo2}.png' alt='{$nombreValor2} de {$palo2}' />";

// Comprobar si las cartas son una pareja
if ($valor1 == $valor2) {
    echo "<p>¡Ha salido una pareja de " . $nombreValor1 . "!</p>";
} else {
    // Comparar cuál es la carta de mayor valor
    if ($valor1 > $valor2) {
        echo "<p>El valor más alto es " . $nombreValor1 . ".</p>";
    } else {
        echo "<p>El valor más alto es " . $nombreValor2 . ".</p>";
    }
}

?>
