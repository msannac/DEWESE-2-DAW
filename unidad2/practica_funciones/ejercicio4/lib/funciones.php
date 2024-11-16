<?php

function sumarEnteros($enteros) {
    return array_sum($enteros);
}

function sumarFloats($floats) {
    return array_reduce($floats, fn($carry, $item) => $carry + $item, 0.0);
}

function sumarTotal($enteros, $floats) {
    return sumarEnteros($enteros) + sumarFloats($floats);
}

function calcularMedia(array $numeros) {
    $total = count($numeros);
    return $total > 0 ? array_sum($numeros) / $total : 0;
}

function generarSucesion($inicio, $cantidad) {
    $sucesion = [];
    for ($i = 0; $i < $cantidad; $i++) {
        $sucesion[] = $inicio + $i;
    }
    return $sucesion;
}

function calcularFactorial($numero) {
    if ($numero < 0) return 0;
    $factorial = 1;
    for ($i = 1; $i <= $numero; $i++) {
        $factorial *= $i;
    }
    return $factorial;
}

function obtenerPalabraMasLarga($cadenas) {
    $masLarga = '';
    foreach ($cadenas as $cadena) {
        if (strlen($cadena) > strlen($masLarga)) {
            $masLarga = $cadena;
        }
    }
    return $masLarga;
}
