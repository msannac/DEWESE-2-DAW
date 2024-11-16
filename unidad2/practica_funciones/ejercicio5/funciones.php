<?php

// Función para analizar nombre usando funciones de cadena
function analizarNombreConFunciones($nombre) {
    // Dividimos el nombre en palabras, eliminando espacios adicionales
    $palabras = preg_split('/\s+/', $nombre); 
    
    foreach ($palabras as $indice => $palabra) {
        // Contar consonantes y letras en la palabra actual
        $cantidadLetras = strlen($palabra);
        $cantidadConsonantes = contarConsonantes($palabra);
        
        // Imprimir el resultado para la palabra
        echo "Palabra" . ($indice + 1) . ": $cantidadConsonantes Consonantes, $cantidadLetras Letras<br>";
    }
}

// Función que cuenta consonantes
function contarConsonantes($palabra) {
    return preg_match_all('/[bcdfghjklmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ]/', $palabra);
}

// Función para analizar nombre sin funciones de cadena
function analizarNombreSinFunciones($nombre) {
    $nombre = eliminarEspacios($nombre);
    
    $i = 0;
    $contadorPalabras = 1;
    $palabraActual = "";
    
    while ($i < strlen($nombre)) {
        $caracter = $nombre[$i];
        
        if ($caracter != ' ') {
            $palabraActual .= $caracter;
        } else if ($palabraActual != "") {
            mostrarInfoPalabra($palabraActual, $contadorPalabras);
            $contadorPalabras++;
            $palabraActual = "";
        }
        
        $i++;
    }
    
    if ($palabraActual != "") {
        mostrarInfoPalabra($palabraActual, $contadorPalabras);
    }
}

// Función para mostrar información de una palabra sin funciones de cadena
function mostrarInfoPalabra($palabra, $numeroPalabra) {
    $contadorLetras = 0;
    $contadorConsonantes = 0;
    $vocales = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
    
    for ($j = 0; $j < strlen($palabra); $j++) {
        $letra = $palabra[$j];
        $contadorLetras++;
        
        if (!in_array($letra, $vocales)) {
            $contadorConsonantes++;
        }
    }
    
    echo "Palabra" . $numeroPalabra . ": $contadorConsonantes Consonantes, $contadorLetras Letras<br>";
}

// Función para eliminar espacios al inicio y al final sin `trim`
function eliminarEspacios($cadena) {
    $inicio = 0;
    $fin = strlen($cadena) - 1;
    
    while ($inicio < strlen($cadena) && $cadena[$inicio] == ' ') {
        $inicio++;
    }
    
    while ($fin >= 0 && $cadena[$fin] == ' ') {
        $fin--;
    }
    
    $nuevaCadena = "";
    for ($k = $inicio; $k <= $fin; $k++) {
        $nuevaCadena .= $cadena[$k];
    }
    
    return $nuevaCadena;
}
?>
