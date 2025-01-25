
<?php
// Verificar si se han enviado los datos por POST
if (!isset($_POST['comunidad'])) {
    echo "No hay resultados disponibles.";
    exit;
}

// Obtener los valores enviados por POST
$nombre = $_POST['nombre'];
$pais = $_POST['pais'];
$comunidad = $_POST['comunidad'];
$comprobaciones = [
    'comprobacion1' => $_POST['comprobacion1'] === 'true',
    'comprobacion2' => $_POST['comprobacion2'] === 'true',
    'comprobacion3' => $_POST['comprobacion3'] === 'true',
    'comprobacion5' => $_POST['comprobacion5'] === 'true',
];
$analisis4 = $_POST['analisis4'];
$analisis6_max = $_POST['analisis6_max'];
$analisis6_min = $_POST['analisis6_min'];

// Mostrar resultados
echo "<h1>Resultados del Análisis</h1>";
echo "<p>Mes actual: " . date('F') . "</p>";
echo "<p>Comunidad: " . htmlspecialchars($comunidad) . "</p>";
echo "<p>País: " . htmlspecialchars($pais) . "</p>";

echo "<h2>Comprobaciones</h2>";
foreach ($comprobaciones as $key => $value) {
    echo "<p>" . htmlspecialchars($key) . ": " . ($value ? 'True' : 'False') . "</p>";
}

echo "<h2>Lista de plantas por tienda</h2>";
// Convertir el string en un array
$analisis4_array = explode('|', $analisis4); 
foreach ($analisis4_array as $entrada) {
    [$tienda, $cantidad] = explode(':', $entrada);
    echo "<p>" . htmlspecialchars($tienda) . " -> " . htmlspecialchars($cantidad) . " plantas</p>";
}

echo "<h2>Recaudación</h2>";
echo "<p>Tienda con más recaudación: " . htmlspecialchars($analisis6_max) . "</p>";
echo "<p>Tienda con menos recaudación: " . htmlspecialchars($analisis6_min) . "</p>";
?>



