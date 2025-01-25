
<?php
function plantas_tienda($nombre_tienda, $plantas) {
    $lista_planta = [];
    foreach ($plantas as $planta) {
        $datos = explode('-', $planta);
        if (trim($datos[0]) === $nombre_tienda) {
            $lista_planta[] = $planta;
        }
    }
    return $lista_planta;
}
function comprobacion1($tiendas, $plantas) {
    $resultado = [];
    foreach ($tiendas as $tienda) {
        $cantidad = 0;
        foreach ($plantas as $planta) {
            $datos = explode('-', $planta);
            if (trim($datos[0]) === $tienda) {
                $cantidad++;
            }
        }
        $resultado[] = $cantidad;
    }
    return $resultado;
}

function comprobacion2($tiendas, $plantas) {
    $resultado = [];
    foreach ($tiendas as $tienda) {
        $mayor = 0;
        foreach ($plantas as $planta) {
            $datos = explode('-', $planta);
            if (trim($datos[0]) === $tienda) {
                $precio = (float) $datos[3];
                if ($precio > $mayor) {
                    $mayor = $precio;
                }
            }
        }
        $resultado[] = $mayor;
    }
    return $resultado;
}

function comprobacion3($plantas) {
    $resultado = [];
    foreach ($plantas as $planta) {
        $datos = explode('-', $planta);
        $resultado[] = (int) $datos[2];
    }
    return $resultado;
}

function comprobacion4($plantas) {
    $resultado = [];
    foreach ($plantas as $planta) {
        $datos = explode('-', $planta);
        $resultado[] = (float) $datos[3];
    }
    return $resultado;
}

function comprobacion5($tiendas, $plantas) {
    $resultado = [];
    foreach ($tiendas as $tienda) {
        $total = 0;
        foreach ($plantas as $planta) {
            $datos = explode('-', $planta);
            if (trim($datos[0]) === $tienda) {
                $total += (int) $datos[2] * (float) $datos[3];
            }
        }
        $resultado[] = $total;
    }
    return $resultado;
}
?>

