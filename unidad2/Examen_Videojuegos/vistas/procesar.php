<?php
require_once __DIR__ . '/../datos/funciones.php'; // Uso de ruta absoluta
// Recoger datos del formulario
$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$digital = $_POST['digital'] === 'si';
$desarrollador = $_POST['desarrollador'];
$precio = $_POST['precio'];
$fecha = $_POST['fecha'];
$fases = $_POST['fases'];
$almacenes = $_POST['almacenes'];

// Procesar datos con las funciones
$numFases = contarFases($fases);
$duracionTotal = calcularDuracion($fases);
$stockTotal = calcularStock($digital, $almacenes);
$precioFinal = calcularPrecio($precio, $digital, $desarrollador, $duracionTotal, $stockTotal);
$stockPorProvincia = calcularStockPorProvincia($almacenes);

// Mostrar resultados
echo "<h1>Estadísticas del Videojuego</h1>";
echo "Número de Fases: $numFases<br>";
echo "Duración Total: $duracionTotal min<br>";
echo "Cantidad de Unidades Disponibles: $stockTotal<br>";
echo "Precio Final: €$precioFinal<br>";

echo "<h2>Stock por Provincia:</h2>";
foreach ($stockPorProvincia as $provincia => $cantidad) {
    echo "$provincia: $cantidad unidades<br>";
}
?>

