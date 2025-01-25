<?php
function contarFases($fases) {
    $lineas = explode("\n", trim($fases));
    return count($lineas);
}

function calcularDuracion($fases) {
    $lineas = explode("\n", trim($fases));
    $duracion = 0;
    foreach ($lineas as $linea) {
        $datos = explode(" ", $linea);
        $duracion += (int)$datos[1];
    }
    return $duracion;
}

function calcularStock($esDigital, $almacenes) {
    if ($esDigital) return "Ilimitadas";
    $lineas = explode("\n", trim($almacenes));
    $total = 0;
    foreach ($lineas as $linea) {
        $datos = explode(" ", $linea);
        $total += (int)$datos[2];
    }
    return $total;
}

function calcularPrecio($precioBase, $esDigital, $desarrollador, $duracion, $stockTotal) {
    if ($esDigital) $precioBase *= 0.8;
    if ($stockTotal < 20) $precioBase *= 1.2;
    if (($desarrollador === "nintendo" || $desarrollador === "rockstar") && $duracion > 1200) {
        $precioBase += 5;
    }
    return round($precioBase, 2);
}

function calcularStockPorProvincia($almacenes) {
    $lineas = explode("\n", trim($almacenes));
    $stockPorProvincia = [];
    foreach ($lineas as $linea) {
        $datos = explode(" ", $linea);
        $provincia = strtolower($datos[0]);
        $cantidad = (int)$datos[2];
        if (!isset($stockPorProvincia[$provincia])) {
            $stockPorProvincia[$provincia] = 0;
        }
        $stockPorProvincia[$provincia] += $cantidad;
    }
    return $stockPorProvincia;
}
?>
