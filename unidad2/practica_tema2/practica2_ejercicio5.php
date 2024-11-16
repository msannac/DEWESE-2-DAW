<?php

/*Crea un programa que genere un número aleatorio y 
haga que el usuario lo intente acertar en menos de 6 intentos. 
Si está muy cerca , a menos de 5 posiciones, dirá (calentito totalis!), 
si está más lejos dirá que el número es mayor o menor.*/ 

// Inicializar variables
$numeroAleatorio = isset($_POST['numeroAleatorio']) ? intval($_POST['numeroAleatorio']) : rand(1, 50); // Obtener o generar número aleatorio
$intentosMaximos = 6; // Número máximo de intentos
$intentos = isset($_POST['intentos']) ? intval($_POST['intentos']) : 0; // Obtener o iniciar contador de intentos
$ganado = false;
$ultimoNumero = isset($_POST['numero']) ? intval($_POST['numero']) : null; // Último número ingresado

// Incrementar intentos si el usuario ingresó un número
if ($ultimoNumero !== null) {
    $intentos++; // Incrementar contador de intentos

    // Verificar si el número es correcto
    if ($ultimoNumero === $numeroAleatorio) {
        $ganado = true;
        echo "<h2>¡Enhorabuena! Has adivinado el número $numeroAleatorio en $intentos intentos.</h2>";
    } elseif (abs($ultimoNumero - $numeroAleatorio) < 5) {
        echo "<p>¡Calentito total! Estás muy cerca del número.</p>";
    } elseif ($ultimoNumero < $numeroAleatorio) {
        echo "<p>El número es mayor. Intenta de nuevo.</p>";
    } else {
        echo "<p>El número es menor. Intenta de nuevo.</p>";
    }

    // Mostrar el último número ingresado
    echo "<p>Último número ingresado: $ultimoNumero</p>";
}

// Mensaje final si se alcanzan los intentos máximos y no ha ganado
if ($intentos >= $intentosMaximos && !$ganado) {
    echo "<h2>Lo siento, no adivinaste el número. Era $numeroAleatorio.</h2>";
} elseif (!$ganado && $intentos < $intentosMaximos) {
    // Mostrar el formulario si el juego no ha terminado
    echo "<h3>Intento " . ($intentos + 1) . " de $intentosMaximos:</h3>";
    echo "<form method='post'>";
    echo "<input type='number' name='numero' min='1' max='50' required />";
    echo "<input type='hidden' name='numeroAleatorio' value='$numeroAleatorio' />"; // Enviar número aleatorio actual
    echo "<input type='hidden' name='intentos' value='$intentos' />"; // Enviar intentos actuales
    echo "<input type='submit' value='Adivinar' />";
    echo "</form>";
}
?>


