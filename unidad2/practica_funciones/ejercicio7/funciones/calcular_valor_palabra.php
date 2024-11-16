<?php
// Versión 1: Calcula el valor de una palabra usando funciones de PHP
function calcularValorPalabraConFunciones($palabra) {
    // Inicializa el valor total de la palabra
    $valorTotal = 0;
    
    // Recorre cada letra de la palabra
    for ($i = 0; $i < strlen($palabra); $i++) {
        // Obtiene el código ASCII de la letra actual y lo convierte a su valor (a=1, b=2, ..., z=26)
        $valorLetra = ord($palabra[$i]) - ord('a') + 1;
        
        // Suma el valor de la letra al valor total
        $valorTotal += $valorLetra;
    }
    
    // Retorna el valor total de la palabra
    return $valorTotal;
}
?>

<?php
// Versión 2: Calcula el valor de una palabra usando un array asociativo
function calcularValorPalabraConArray($palabra) {
    // Array asociativo donde cada letra se asocia a su valor numérico
    $valoresLetras = [
        'a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => 6, 'g' => 7, 'h' => 8, 'i' => 9, 'j' => 10,
        'k' => 11, 'l' => 12, 'm' => 13, 'n' => 14, 'o' => 15, 'p' => 16, 'q' => 17, 'r' => 18, 's' => 19, 't' => 20,
        'u' => 21, 'v' => 22, 'w' => 23, 'x' => 24, 'y' => 25, 'z' => 26
    ];

    $valorTotal = 0;

    // Recorre cada letra de la palabra
    for ($i = 0; $i < strlen($palabra); $i++) {
        // Obtiene el valor de la letra desde el array y lo suma al total
        $letra = $palabra[$i];
        $valorTotal += $valoresLetras[$letra];
    }

    return $valorTotal;
}
?>
