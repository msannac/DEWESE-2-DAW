<?php
// Incluye los archivos con las funciones
require_once 'funciones/calcular_valor_palabra.php';// garantiza que solo se incluya una vez con require_once
require_once 'funciones/comparar_valores.php';// garantiza que solo se incluya una vez con require_once

// Prueba de la primera versión de calcularValorPalabra
$palabra1 = "hola";
echo "Valor de '$palabra1' con funciones: " . calcularValorPalabraConFunciones($palabra1) . "<br>";

// Prueba de la segunda versión de calcularValorPalabra
echo "Valor de '$palabra1' con array: " . calcularValorPalabraConArray($palabra1) . "<br>";

// Definición de la segunda palabra para las pruebas
$palabra2 = "mundo";

// Prueba de la primera versión de calcularValorPalabra con $palabra2
echo "Valor de '$palabra2' con funciones: " . calcularValorPalabraConFunciones($palabra2) . "<br>";

// Prueba de la segunda versión de calcularValorPalabra con $palabra2
echo "Valor de '$palabra2' con array: " . calcularValorPalabraConArray($palabra2) . "<br>";

// Prueba de la función compararValores
$palabra2 = "mundo";
echo compararValores($palabra1, $palabra2);
?>
