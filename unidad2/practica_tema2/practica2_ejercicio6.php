
    <?php


    /*Investigar cómo funciona el juego de piedra papel y tijeras lagarto y spock. 
Crear un programa en php que al pulsar un botón genere dos manos (en imagen) 
y posteriormente determine el vencedor o si hay empate. 
Debe de simular una competición al mejor de 3.
*/
     // Array de opciones
    $opciones = ['piedra', 'papel', 'tijeras', 'lagarto', 'spock'];

    // Inicialización de variables
    $ganador1 = 0;
    $ganador2 = 0;
    $rondas = 0;

    // Función para determinar el ganador de una ronda
    function determinarGanador($mano1, $mano2) {
        // TODO: Implementar el resto de reglas de victoria
        // Condiciones de victoria para mano1
        if ($mano1 == 'piedra' && ($mano2 == 'tijeras' || $mano2 == 'lagarto')) return 1;
        if ($mano1 == 'papel' && ($mano2 == 'piedra' || $mano2 == 'spock')) return 1;
        if ($mano1 == 'tijeras' && ($mano2 == 'papel' || $mano2 == 'lagarto')) return 1;
        if ($mano1 == 'lagarto' && ($mano2 == 'papel' || $mano2 == 'spock')) return 1;
        if ($mano1 == 'spock' && ($mano2 == 'piedra' || $mano2 == 'tijeras')) return 1;
        // Condiciones de victoria para mano2
        if ($mano2 == 'piedra' && ($mano1 == 'tijeras' || $mano1 == 'lagarto')) return 2;
        if ($mano2 == 'papel' && ($mano1 == 'piedra' || $mano1 == 'spock')) return 2;
        if ($mano2 == 'tijeras' && ($mano1 == 'papel' || $mano1 == 'lagarto')) return 2;
        if ($mano2 == 'lagarto' && ($mano1 == 'papel' || $mano1 == 'spock')) return 2;
        if ($mano2 == 'spock' && ($mano1 == 'piedra' || $mano1 == 'tijeras')) return 2;
        // Empate
        return 0;
    }
     // Bucles anidados para jugar mejor de 3
    while ($rondas < 3 && $ganador1 < 2 && $ganador2 < 2) {
        // Selección aleatoria de manos
        $indice1 = rand(0, 4);
        $indice2 = rand(0, 4);
        $mano1 = $opciones[$indice1];
        $mano2 = $opciones[$indice2];

              // Determinación del ganador
              switch (determinarGanador($mano1, $mano2)) {
                case 0: // Empate
                    echo "<p>Ronda " . ($rondas + 1) . ": Empate. Ambos eligieron $mano1.</p>";
                    break;
                case 1: // Gana el jugador 1
                    echo "<p>Ronda " . ($rondas + 1) . ": Jugador 1 gana con $mano1 contra $mano2.</p>";
                    $ganador1++;
                    break;
                case 2: // Gana el jugador 2
                    echo "<p>Ronda " . ($rondas + 1) . ": Jugador 2 gana con $mano2 contra $mano1.</p>";
                    $ganador2++;
                    break;
            }
    
            // Mostrar las imágenes de las manos
            echo "<p>Jugador 1: <img src='/DES/unidad2/practica_tema2/Juego_pptls/$mano1.png' alt='$mano1' width='100'></p>";
            echo "<p>Jugador 2: <img src='/DES/unidad2/practica_tema2/Juego_pptls/$mano2.png' alt='$mano2' width='100'></p>";
        
            // Incrementar el contador de rondas
            $rondas++;
        }
        // Mostrar el resultado final
        if ($ganador1 > $ganador2) {
            echo "<h2>Jugador 1 es el ganador al mejor de 3!</h2>";
        } elseif ($ganador2 > $ganador1) {
            echo "<h2>Jugador 2 es el ganador al mejor de 3!</h2>";
        } else {
            echo "<h2>La competición terminó en empate.</h2>";
        }
        ?>
        <!-- Botón para jugar de nuevo -->
        <form method="post">
            <button type="submit">Jugar otra vez</button>
        </form>
    </body>
    </html>
      

















