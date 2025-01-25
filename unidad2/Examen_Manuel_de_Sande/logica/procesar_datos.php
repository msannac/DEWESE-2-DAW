<<?php

// Obtener datos enviados desde el formulario
$nombre = $_POST['nombre'] ?? '';
$pais = $_POST['pais'] ?? '';
$comunidad = $_POST['comunidad'] ?? '';
$tiendas_texto = $_POST['tiendas'] ?? '';
$plantas_texto = $_POST['plantas'] ?? '';

// Separar los datos de texto en arrays
$tiendas = explode("\n", trim($tiendas_texto));
$plantas = explode("\n", trim($plantas_texto));

// Función para comprobar la recaudación (Comprobación 6)
function comprobacion6($plantas) {
    $recaudaciones = [];

    
    foreach ($plantas as $linea) {
        $datos = explode('-', trim($linea));
        if (count($datos) !== 5) {
            continue; 
        }

        $nombre_tienda = $datos[0];   
        $cantidad = (int) $datos[2];  
        $precio = (float) $datos[3];  

        // Calcular la recaudación para la tienda actual
        $recaudacion = $cantidad * $precio;

        //array para recaudación
        if (isset($recaudaciones[$nombre_tienda])) {
            $recaudaciones[$nombre_tienda] += $recaudacion;
        } else {
            $recaudaciones[$nombre_tienda] = $recaudacion;
        }
    }


    if (empty($recaudaciones)) {
        return [
            'max' => null,
            'min' => null,
        ]; 
    }

    //Tienda con mayor y menor recaudación
    $tienda_max = array_keys($recaudaciones, max($recaudaciones))[0];
    $tienda_min = array_keys($recaudaciones, min($recaudaciones))[0];

    // Devolver los resultados en un array asociativo
    return [
        'max' => $tienda_max,
        'min' => $tienda_min,
    ];
}

// comprobacion6
$analisis6 = comprobacion6($plantas);

// Validar los resultados de comprobacion6
if ($analisis6['max'] === null || $analisis6['min'] === null) {
    $mensaje_recaudacion = "Error: No se pudo calcular la recaudación. Verifica los datos.";
} else {
    $mensaje_recaudacion = "Tienda con más recaudación: " . $analisis6['max'] . "<br>";
    $mensaje_recaudacion .= "Tienda con menos recaudación: " . $analisis6['min'];
}

// ejemplo para comprobar resultados de las comprobaciones
$resultados = [
    'comprobaciones' => [
        'comprobacion1' => true,  
        'comprobacion2' => false, 
        'comprobacion3' => true,  
        'comprobacion5' => false,
    ],
    'analisis4' => [
        'Tienda Natural' => 15, 
        'Tienda Eco' => 20,
        'Tienda Verde' => 10,
    ],
    'analisis6' => $analisis6,
];

// Mostrar resultados en la tabla
echo "<h1>Resultados del Análisis</h1>";
echo "<h2>Mes: " . date('F') . "</h2>";  
echo "<h2>Comunidad: $comunidad</h2>";  
echo "<h2>País: $pais</h2>";

// Tabla con los resultados
echo "<table border='1' cellpadding='10'>";
echo "<tr>
        <th>Mes</th>
        <th>Comunidad</th>
        <th>País</th>
        <th>Resultados</th>
      </tr>";

// Mostrar los resultados en la tabla
echo "<tr>
        <td>" . date('F') . "</td>
        <td>$comunidad</td>
        <td>$pais</td>
        <td>Resultados</td>
      </tr>";

echo "</table>";

echo "<h2>Comprobaciones</h2>";
foreach ($resultados['comprobaciones'] as $comprobacion => $resultado) {
    echo "<p>$comprobacion: " . ($resultado ? 'True' : 'False') . "</p>";
}

// Mostrar la lista de cantidades de plantas por tienda 
echo "<h2>Lista de Plantas por Tienda</h2>";
foreach ($resultados['analisis4'] as $tienda => $cantidad) {
    echo "<p>$tienda -> $cantidad plantas</p>";
}

// Mostrar las tiendas con más y menos recaudación
echo "<h2>Recaudación</h2>";
echo $mensaje_recaudacion;


?>






































