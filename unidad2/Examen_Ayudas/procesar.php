<?php
// Recibir los datos del formulario
$nombre = $_POST['nombre'];
$edad = intval($_POST['edad']);
$estado = $_POST['estado'];
$sueldo = $_POST['sueldo'];
$hijos = explode("\n", trim($_POST['hijos']));
$domicilios = explode("\n", trim($_POST['domicilios']));

// Inicializar variables de evaluación
$hijos_validos = 0; // Número de hijos menores de 14 o con minusvalía
$provincias = [];   // Almacena las provincias de los domicilios
$casas_totales = 0; // Cuenta la cantidad de casas

// Evaluar hijos
foreach ($hijos as $hijo) {
    $datos_hijo = explode(" ", trim($hijo));
    if (count($datos_hijo) === 4) {
        list($nombre_hijo, $edad_hijo, $sexo_hijo, $minusvalia) = $datos_hijo;
        $edad_hijo = intval($edad_hijo);
        if ($edad_hijo < 14 || strtoupper($minusvalia) === 'S') {
            $hijos_validos++;
        }
    }
}

// Evaluar domicilios
foreach ($domicilios as $domicilio) {
    $datos_domicilio = explode(" ", trim($domicilio));
    if (count($datos_domicilio) === 4) {
        list($provincia, $habitaciones, $piso, $habitual) = $datos_domicilio;
        $provincias[] = $provincia;
        $casas_totales++;
    }
}

// Validar condiciones
$es_adulto = $edad >= 18;
$es_casado = $estado === 'Casado';
list($sueldo_min, $sueldo_max) = explode('-', $sueldo);
$sueldo_valido = intval($sueldo_min) > 10000 && intval($sueldo_max) < 30000;
$hijos_valido = $hijos_validos >= 2;
$provincias_unicas = count(array_unique($provincias)) === 1;
$casas_validas = $casas_totales <= 2;

// Determinar si cumple con las condiciones
if ($es_adulto && $es_casado && $sueldo_valido && $hijos_valido && $provincias_unicas && $casas_validas) {
    echo "<h1>¡Felicidades, $nombre!</h1>";
    echo "<p>Cumples con los requisitos para obtener la ayuda.</p>";
} else {
    echo "<h1>Lo sentimos, $nombre</h1>";
    echo "<p>No cumples con los requisitos para obtener la ayuda.</p>";
}
?>
