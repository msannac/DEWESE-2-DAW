<?php
// Definir constantes para los tipos de plantas
define('HORTALIZAS', 1);
define('FLORALES', 2);
define('ORNAMENTALES', 3);
define('TROPICALES', 4);

// Funciones para las comprobaciones
function plantas_tienda($tienda, $datos_plantas) {
    $plantas_tienda = [];
    foreach ($datos_plantas as $planta) {
        $plantaInfo = explode("-", trim($planta));
        if ($plantaInfo[0] == $tienda) {
            $plantas_tienda[] = $plantaInfo;
        }
    }
    return $plantas_tienda;
}

function comprobar_orquideas_rosas($plantas) {
    foreach ($plantas as $planta) {
        if (($planta[1] == "Orquidea" || $planta[1] == "Rosa") && $planta[3] > 10) {
            return false;
        }
    }
    return true;
}

function comprobar_plantas_por_tienda($tiendasInfo) {
    foreach ($tiendasInfo as $tienda => $datos) {
        if (count($datos['plantas']) < 1) {
            return false;
        }
    }
    return true;
}

function comprobar_requisitos_invernadero($tienda, $tiendasInfo, $comunidad) {
    $tiendaData = $tiendasInfo[$tienda];
    if ($tiendaData['invernadero'] == "S") {
        $plantas = plantas_tienda($tienda, $tiendasInfo);
        $tropicales = 0;
        $florales = 0;
        $trabajadores = $tiendaData['trabajadores'];
        
        foreach ($plantas as $planta) {
            if ($planta[4] == TROPICALES) {
                $tropicales++;
            }
            if ($planta[4] == FLORALES) {
                $florales++;
            }
        }

        if (($tropicales >= 2 && $trabajadores > 3) || ($florales > 5 && $comunidad == "Andalucia")) {
            return true;
        } else {
            return false;
        }
    }
    return true;
}

function tienda_mayor_recaudacion($tiendasInfo) {
    $mayor = null;
    foreach ($tiendasInfo as $tienda => $datos) {
        $total_recaudado = 0;
        foreach ($datos['plantas'] as $planta) {
            $total_recaudado += $planta[3] * $planta[2];
        }
        if ($mayor === null || $total_recaudado > $mayor['recaudacion']) {
            $mayor = ['tienda' => $tienda, 'recaudacion' => $total_recaudado];
        }
    }
    return $mayor;
}

function tienda_menor_recaudacion($tiendasInfo) {
    $menor = null;
    foreach ($tiendasInfo as $tienda => $datos) {
        $total_recaudado = 0;
        foreach ($datos['plantas'] as $planta) {
            $total_recaudado += $planta[3] * $planta[2];
        }
        if ($menor === null || $total_recaudado < $menor['recaudacion']) {
            $menor = ['tienda' => $tienda, 'recaudacion' => $total_recaudado];
        }
    }
    return $menor;
}

// Procesar los datos recibidos
$pais = $_POST['pais'];
$comunidad = $_POST['comunidad'];
$tiendaSeleccionada = $_POST['tienda'];
$eliminar = isset($_POST['eliminar']) ? true : false;
$tiendasData = $_POST['tiendas'];
$plantasData = $_POST['plantas'];

// Convertir los datos de tiendas y plantas en arrays
$tiendas = explode("\n", $tiendasData);
$plantas = explode("\n", $plantasData);

// Crear un arreglo para las tiendas y sus plantas
$tiendasInfo = [];

foreach ($tiendas as $tienda) {
    $tiendaInfo = explode("-", trim($tienda)); // Dividir por guiones
    $nombreTienda = $tiendaInfo[0];
    $numeroPlantasTienda = (int)$tiendaInfo[6];

    $tiendasInfo[$nombreTienda] = [
        'trabajadores' => $tiendaInfo[1],
        'localidad' => $tiendaInfo[2],
        'invernadero' => $tiendaInfo[3],
        'facturacion' => $tiendaInfo[4],
        'numeroPlantas' => $numeroPlantasTienda,
        'plantas' => []
    ];
}

foreach ($plantas as $planta) {
    $plantaInfo = explode("-", trim($planta)); // Dividir por guiones
    $nombreTienda = $plantaInfo[0];
    $nombrePlanta = $plantaInfo[1];
    $cantidad = (int)$plantaInfo[2];
    $precio = (float)$plantaInfo[3];
    $tipo = (int)$plantaInfo[4];

    // Añadir la planta al arreglo correspondiente
    if (isset($tiendasInfo[$nombreTienda])) {
        $tiendasInfo[$nombreTienda]['plantas'][] = [
            'nombrePlanta' => $nombrePlanta,
            'cantidad' => $cantidad,
            'precio' => $precio,
            'tipo' => $tipo
        ];
    }
}

// Comprobaciones
$comprobaciones = [];
$comprobaciones['orquideas_rosas'] = comprobar_orquideas_rosas($plantasInfo);
$comprobaciones['plantas_por_tienda'] = comprobar_plantas_por_tienda($tiendasInfo);
$comprobaciones['invernadero_requisitos'] = [];
foreach ($tiendasInfo as $tienda => $datos) {
    $comprobaciones['invernadero_requisitos'][$tienda] = comprobar_requisitos_invernadero($tienda, $tiendasInfo, $comunidad);
}

// Obtener las tiendas con mayor y menor recaudación
$tiendaMayor = tienda_mayor_recaudacion($tiendasInfo);
$tiendaMenor = tienda_menor_recaudacion($tiendasInfo);

// Mostrar resultados
echo "<h1>Resultados - Análisis</h1>";
echo "<table border='1'>";
echo "<tr><th>Mes</th><th>Valor</th></tr>";
foreach ($comprobaciones as $key => $comprobacion) {
    echo "<tr><td>{$key}</td><td>";
    print_r($comprobacion);
    echo "</td></tr>";
}

echo "<h2>Tienda con mayor recaudación</h2>";
echo "<p>{$tiendaMayor['tienda']} con una recaudación de {$tiendaMayor['recaudacion']}€</p>";

echo "<h2>Tienda con menor recaudación</h2>";
echo "<p>{$tiendaMenor['tienda']} con una recaudación de {$tiendaMenor['recaudacion']}€</p>";

?>
