
<?php
/*Realizar un formulario en php que simule el juego del 1 simplificado. 
Mostrará la carta dada la vuelta actual y 4 cartas en imágenes como la mano del jugador. 
Las cartas serán botones, si se pulsa sobre una carta válida (mismo número o color), 
recargará la página y mostrará un mensaje de felicitación. 
Las cartas deben generarse aleatoriamente. 
Existira un botón para repetir la mano del usuario, 
pero la carta volteada debe ser la misma. (solo dos colores y hasta 5 para que sean menos imágenes)*/

// Generar la carta volteada con un número y color aleatorios si no se ha enviado el formulario
$colores = ['Rojo', 'Azul'];
if (isset($_POST['cartaVolteadaNumero']) && isset($_POST['cartaVolteadaColor'])) {
    $cartaVolteadaNumero = $_POST['cartaVolteadaNumero'];
    $cartaVolteadaColor = $_POST['cartaVolteadaColor'];
} else {
    $cartaVolteadaNumero = rand(1, 5);
    $cartaVolteadaColor = $colores[rand(0, 1)];
}
// Generar la mano del jugador con 4 cartas aleatorias
$mano = [];
for ($i = 0; $i < 4; $i++) {
    $numero = rand(1, 5);
    $color = $colores[rand(0, 1)];
    $mano[] = ['numero' => $numero, 'color' => $color];
}
// Comprobar si se ha pulsado una carta
$mensaje = '';
if (isset($_POST['jugar'])) {
    $cartaSeleccionada = $_POST['jugar'];
    $partes = explode('_', $cartaSeleccionada);

    // Verificar que $partes tiene exactamente dos elementos (número y color)
    if (count($partes) === 2) {
        $numeroSeleccionado = $partes[0];
        $colorSeleccionado = $partes[1];

        // Verificar si la carta seleccionada es válida por número o color
        if ($numeroSeleccionado == $cartaVolteadaNumero || $colorSeleccionado == $cartaVolteadaColor) {
            $mensaje = "¡Felicidades! Has seleccionado una carta válida.";
        } else {
            $mensaje = "La carta seleccionada no es válida.";
        }
    } else {
        $mensaje = "El formato de la carta seleccionada no es correcto.";
    }
}
// Manejar la opción de repetir la mano
if (isset($_POST['repetir'])) {
    // No cambiar la carta volteada, solo generar una nueva mano
    $mano = [];
    for ($i = 0; $i < 4; $i++) {
        $numero = rand(1, 5);
        $color = $colores[rand(0, 1)];
        $mano[] = ['numero' => $numero, 'color' => $color];
    }
    $mensaje = "La mano ha sido reiniciada, pero la carta volteada se mantiene igual.";
}
?>
<!-- Mostrar la carta volteada -->
<h2>Carta Volteada</h2>
<img src="/DES/unidad2/practica_tema2/Uno/<?php echo $cartaVolteadaNumero . '_' . $cartaVolteadaColor; ?>.png" alt="Carta Volteada">
<!-- Mostrar la mano del jugador -->
<h2>Tu Mano</h2>
<form method="post">
    <!-- Pasar la carta volteada a través de campos ocultos -->
    <input type="hidden" name="cartaVolteadaNumero" value="<?php echo $cartaVolteadaNumero; ?>">
    <input type="hidden" name="cartaVolteadaColor" value="<?php echo $cartaVolteadaColor; ?>">

    <?php foreach ($mano as $index => $carta) : ?>
        <button type="submit" name="jugar" value="<?php echo $carta['numero'] . '_' . $carta['color']; ?>">
            <img src="/DES/unidad2/practica_tema2/Uno/<?php echo $carta['numero'] . '_' . $carta['color']; ?>.png" alt="Carta">
        </button>
    <?php endforeach; ?>
</form>

<!-- Mostrar mensaje -->
<?php if ($mensaje) : ?>
    <p><?php echo $mensaje; ?></p>
<?php endif; ?>

<!-- Botón para reiniciar la mano -->
<form method="post">
    <!-- Pasar la carta volteada a través de campos ocultos -->
    <input type="hidden" name="cartaVolteadaNumero" value="<?php echo $cartaVolteadaNumero; ?>">
    <input type="hidden" name="cartaVolteadaColor" value="<?php echo $cartaVolteadaColor; ?>">
    <button type="submit" name="repetir">Repetir Mano</button>
</form>





