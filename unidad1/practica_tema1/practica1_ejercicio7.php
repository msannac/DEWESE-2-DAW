
    <?php
// Definir los palos y rangos
$palos = array('Corazones', 'Diamantes', 'Tréboles', 'Picas');
$rangos = array('2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A');

// Crear un array para la mano
$mano = array();

// Seleccionar 5 cartas aleatorias
for ($i = 0; $i < 5; $i++) {
    // Elegir un índice aleatorio para el palo
    $indice_palo = rand(0, count($palos) - 1);
    
    // Elegir un índice aleatorio para el rango
    $indice_rango = rand(0, count($rangos) - 1);
    
    // Crear la carta
    $carta = $rangos[$indice_rango] . " de " . $palos[$indice_palo];
    
    // Agregar la carta a la mano
    $mano[] = $carta;
}

// Mostrar la mano de cartas
echo "Tu mano de póker es:<br>";
for ($l = 0; $l < count($mano); $l++) {
    echo $mano[$l] . "<br>";
}
?>


