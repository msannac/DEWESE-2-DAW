<?php

// Versión usando funciones de PHP
function procesarNumerosConFunciones($textoNumeros, $orden = true) {
    $numeros = explode(' ', $textoNumeros);
    $numerosValidos = [];

    foreach ($numeros as $num) {
        if (is_numeric($num)) {
            $numerosValidos[] = (int)$num;
        }
    }

    $media = count($numerosValidos) > 0 ? array_sum($numerosValidos) / count($numerosValidos) : 0;
    $minimo = count($numerosValidos) > 0 ? min($numerosValidos) : null;
    $nprimos = 0;

    foreach ($numerosValidos as $numero) {
        if (esPrimo($numero)) {
            $nprimos++;
        }
    }

    $resultado = [
        "nprimos" => $nprimos,
        "media" => $media,
        "mínimo" => $minimo
    ];

    return $orden ? $resultado : array_reverse($resultado);
}

// Versión sin funciones de PHP
function procesarNumerosSinFunciones($textoNumeros, $orden = true) {
    $numerosValidos = [];
    $numeroActual = "";

    for ($i = 0; $i < strlen($textoNumeros); $i++) {
        if ($textoNumeros[$i] != ' ') {
            $numeroActual .= $textoNumeros[$i];
        } else {
            if ($numeroActual !== "" && is_numeric_manual($numeroActual)) {
                $numerosValidos[] = (int)$numeroActual;
            }
            $numeroActual = "";
        }
    }

    if ($numeroActual !== "" && is_numeric_manual($numeroActual)) {
        $numerosValidos[] = (int)$numeroActual;
    }

    $suma = 0;
    $minimo = $numerosValidos[0];
    $nprimos = 0;

    for ($j = 0; $j < count($numerosValidos); $j++) {
        $suma += $numerosValidos[$j];
        if ($numerosValidos[$j] < $minimo) {
            $minimo = $numerosValidos[$j];
        }
        if (esPrimo($numerosValidos[$j])) {
            $nprimos++;
        }
    }

    $media = count($numerosValidos) > 0 ? $suma / count($numerosValidos) : 0;
    $resultado = [
        "nprimos" => $nprimos,
        "media" => $media,
        "mínimo" => $minimo
    ];

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
