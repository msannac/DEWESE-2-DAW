<?php
// Versión usando funciones de PHP
function procesarNumerosConFunciones($textoNumeros, $orden = true) {
    // Convertimos el texto en un array de números
    $numeros = explode(' ', $textoNumeros);
    $numerosValidos = [];

    // Iteramos sobre los números convertidos del texto
    foreach ($numeros as $num) {
        // Verificamos si el valor es numérico y lo agregamos al array de números válidos
        if (is_numeric($num)) {
            $numerosValidos[] = (int)$num;
        }
    }

    // Calculamos la media de los números válidos
    $media = count($numerosValidos) > 0 ? array_sum($numerosValidos) / count($numerosValidos) : 0;
    // Encontramos el valor mínimo en el array de números válidos
    $minimo = count($numerosValidos) > 0 ? min($numerosValidos) : null;
    $nprimos = 0;

    // Iteramos sobre los números válidos para contar los números primos
    foreach ($numerosValidos as $numero) {
        if (esPrimo($numero)) {
            $nprimos++;
        }
    }

    // Creamos un array con los resultados
    $resultado = [
        "nprimos" => $nprimos,
        "media" => $media,
        "mínimo" => $minimo
    ];

    // Retornamos el resultado según el orden especificado
    return $orden ? $resultado : array_reverse($resultado);
}

// Versión sin funciones de PHP
function procesarNumerosSinFunciones($textoNumeros, $orden = true) {
    $numerosValidos = [];
    $numeroActual = "";

    // Recorremos cada carácter del texto ingresado
    for ($i = 0; $i < strlen($textoNumeros); $i++) {
        if ($textoNumeros[$i] != ' ') {
            // Construimos el número actual caracter por caracter
            $numeroActual .= $textoNumeros[$i];
        } else {
            // Validamos y agregamos el número al array si es válido
            if ($numeroActual !== "" && is_numeric_manual($numeroActual)) {
                $numerosValidos[] = (int)$numeroActual;
            }
            $numeroActual = "";
        }
    }

    // Agregamos el último número si es válido
    if ($numeroActual !== "" && is_numeric_manual($numeroActual)) {
        $numerosValidos[] = (int)$numeroActual;
    }

    $suma = 0;
    $minimo = $numerosValidos[0];
    $nprimos = 0;

    // Iteramos sobre los números válidos
    for ($j = 0; $j < count($numerosValidos); $j++) {
        // Calculamos la suma de los números
        $suma += $numerosValidos[$j];
        // Determinamos el valor mínimo
        if ($numerosValidos[$j] < $minimo) {
            $minimo = $numerosValidos[$j];
        }
        // Contamos los números primos
        if (esPrimo($numerosValidos[$j])) {
            $nprimos++;
        }
    }

    // Calculamos la media de los números válidos
    $media = count($numerosValidos) > 0 ? $suma / count($numerosValidos) : 0;
    $resultado = [
        "nprimos" => $nprimos,
        "media" => $media,
        "mínimo" => $minimo
    ];

    // Retornamos el resultado según el orden especificado
    return $orden ? $resultado : array_reverse_manual($resultado);
}

// Función auxiliar para verificar si un número es primo
function esPrimo($numero) {
    if ($numero < 2) return false;
    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0) return false;
    }
    return true;
}

// Simula `is_numeric` manualmente
function is_numeric_manual($str) {
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] < '0' || $str[$i] > '9') {
            return false;
        }
    }
    return true;
}

// Simula `array_reverse` manualmente
function array_reverse_manual($array) {
    $reversed = [];
    foreach (array_keys($array) as $key) {
        $reversed = array($key => $array[$key]) + $reversed;
    }
    return $reversed;
}

?>
