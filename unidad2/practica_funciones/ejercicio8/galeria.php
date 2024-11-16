<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Galería de Imágenes</title>
</head>
<body>

<?php

function crearGaleria($texto) {
    // Divide el texto en líneas
    $lineas = explode("\n", trim($texto)); 
    // Configuración de la galería (márgenes y columnas)
    $configuracion = explode("-", trim($lineas[0])); 

    // Configuración de la galería
    $margenSuperior = isset($configuracion[0]) ? intval($configuracion[0]) : 0;
    $margenIzquierdo = isset($configuracion[1]) ? intval($configuracion[1]) : 0;
    $imagenesPorFila = isset($configuracion[2]) ? intval($configuracion[2]) : 3;

    $html = "<div style='display: flex; flex-wrap: wrap; margin-top: {$margenSuperior}px; margin-left: {$margenIzquierdo}px;'>";

    // Iterar sobre las líneas que contienen las imágenes
    for ($i = 1; $i < count($lineas); $i++) {
        $datosImagen = explode("-", trim($lineas[$i]));

        // Extraer el ancho, alto y nombre de la imagen
        $ancho = isset($datosImagen[0]) ? intval($datosImagen[0]) : 100;
        $alto = isset($datosImagen[1]) ? intval($datosImagen[1]) : 100;
        $nombreImagen = isset($datosImagen[3]) ? $datosImagen[3] : "";

        // Extraer los estilos de la imagen
        $estiloDatos = explode("#", $datosImagen[2]);
         // Tipo de borde
        $borde = isset($estiloDatos[0]) ? $estiloDatos[0] : "solid";
         // Color de borde
        $colorBorde = isset($estiloDatos[1]) ? $estiloDatos[1] : "black";
        // Sombra
        $sombra = isset($estiloDatos[2]) && $estiloDatos[2] === "sombra" ? "5px 5px 10px rgba(0,0,0,0.5)" : "none"; 
        // Efecto al pasar el ratón
        $hover = isset($estiloDatos[3]) ? $estiloDatos[3] : "escala"; 

        // Aplicar efecto de hover en función del parámetro
        $efectoHover = "";
        if ($hover === "escala") {
            $efectoHover = "transform: scale(1.1);";
        } elseif ($hover === "giro") {
            $efectoHover = "transform: rotate(10deg);";
        } elseif ($hover === "opacidad") {
            $efectoHover = "opacity: 0.8;";
        }

        // Generar HTML de la imagen con estilos en línea, incluyendo borde, color, sombra y efecto hover
        $html .= "<div style='width: {$ancho}px; height: {$alto}px; margin-right: 10px; margin-bottom: 10px; border: 3px {$borde} {$colorBorde}; box-shadow: {$sombra}; overflow: hidden; transition: transform 0.3s, box-shadow 0.3s;'>";
        $html .= "<img src='recursos/{$nombreImagen}' alt='Imagen' style='width: 100%; height: 100%; transition: 0.3s;'>";
        $html .= "</div>";

        // Aplicar estilo de hover en el documento
        $html .= "<style>
            div:hover { {$efectoHover} }
        </style>";

        // Añadir salto de línea si se alcanza el número máximo de imágenes por fila
        if (($i % $imagenesPorFila) === 0) {
            $html .= "<div style='flex-basis: 100%; height: 0;'></div>";
        }
    }

    $html .= "</div>";
    return $html;
}

// Mostrar la galería cuando el formulario se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigoGaleria = $_POST['codigo_galeria'];
    echo crearGaleria($codigoGaleria);
}

?>

</body>
</html>
