<?php
// Compara el valor numérico de dos palabras
function compararValores($palabra1, $palabra2) {
    // Calcula el valor de ambas palabras usando una de las funciones anteriores
    $valor1 = calcularValorPalabraConFunciones($palabra1);
    $valor2 = calcularValorPalabraConFunciones($palabra2);
    
    // Compara los valores y devuelve un mensaje indicando cuál es mayor
    if ($valor1 > $valor2) {
        return "'$palabra1' tiene un valor numérico mayor.";
    } elseif ($valor1 < $valor2) {
        return "'$palabra2' tiene un valor numérico mayor.";
    } else {
        return "Ambas palabras tienen el mismo valor numérico.";
    }
}
?>
