<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    /**
     * inverso
     *
     * @param  mixed $cadena
     * @return void
     */
    function inverso($cadena)
    {
        $cad_inversa = "";
        //Recorremos la cadena desde el final hasta la primera posicion
        //con $i y vamos asignando cada caracter a la inversa
        for ($i = strlen($cadena) - 1; $i >= 0; $i--) {
            $cad_inversa = $cad_inversa . $cadena[$i];
        }

        //devolvemos la cadena inversa
        return $cad_inversa;
    }


    /**
     * esPalindromo
     * Devuelve cierto si la cadena es un palindromo, es decir si es igual que ella misma invertida
     * @param  mixed $palabra cadena a comprobar
     * @return true si es un palindromo 
     * @return false si no lo es
     */
    function esPalindromo($palabra)
    {
        //Tendremos que recorrer la cadena hasta la mitad solo, si es impar, hasta la mitad -1
        //al convertir a entero hacemos que siendo impar sea uno menos
        // es decir si tiene 5 caracteres la mitad es 2.5 al truncar convirtiendo a entero
        //se queda en 2
        $mitad = (int)strlen($palabra) / 2;

        //Recorremos todas las letras y comprobamos que son iguales a sus simetricas
        for ($i = 0; $i <= $mitad; $i++) {
            //Comparamos letra a letra la posicion actual del indice i con
            //su inversa, que sera la ultima posicion de la cadena (strlen -1) menos la i
            if ($palabra[$i] != $palabra[strlen($palabra) - 1 - $i]) {
                $esPal = false;
                return false;
            }
        }
        //Si llega al final del bucle sin salir implica que todas las letras son iguales
        return true;
    }


    #Este fichero recibe de un formulario html dos datos, una palabra con un type text
    #y un texto de varias lineas con un textarea y un checkbox que diga si ignora o no mayusculas
    #El programa contara la cantidad de palabras totales, la cantidad de palabras que sean palindromos
    #la cantidad de veces que esta la palabra que se recibe, la cantidad de lineas y la cantidad de frases (
    #cada frase tiene un punto al final)
    #se devolvera en un array asociativo con todos los valores resultados
    //$resultado = ["palabrasTotales" =>12, "palindromos" =>0 ];

    //RECOGER DATOS DEL FORMULARIO
    if (isset($_POST["palabra"])) $palabra_buscada = $_POST["palabra"];
    //Diferencia mayusculas es un checkbox, si no lo marco llega como null
    // por lo cual isset da falso
    if (isset($_POST["diferenciaMay"])) $ignorarMay = true; else $ignorarMay =false;
    if (isset($_POST["texto"])) $texto = $_POST["texto"];

    //Separamos en lineas
    $lineas = explode("\n", $texto);

    //Asingamos la cantidad de lineas del texto a la clave numLineas
    $resultado["numLineas"] = count($lineas);


    $num_palabras = 0;
    $num_frases = 0;
    $num_palabra_buscar = 0;
    $num_palindromos = 0;
    $num_palindromosv2 = 0;
    //Recorremos cada linea
    foreach ($lineas as $linea) {

        //Separamos en palabras cada linea
        $palabras = explode(" ", $linea);

        //Guardamos la cantidad de palabras
        $num_palabras = $num_palabras + count($palabras);

        //Para contar la cantidad de puntos
        //hago un explode de cada linea, separando por .
        //si el array resultante solo tiene un elemento implica que no hay ningun .
        //Si hay por ejemplo 3 puntos, el array tendra 4 elementos
        //implica que restando 1 al count del explode me dara la cantidad de 
        //. que hay en esta linea;
        $num_frases = $num_frases + count(explode(".", $linea)) - 1;

        //Recorro todas las palabras
        foreach ($palabras as $palabra) {
            
            $palabra=trim($palabra);
            echo "-".$palabra."-<br/>";

            //Si el checkbox de ignorar mayusculas esta marcado lo pasamos todo a minusculas
            if ($ignorarMay)
            {
                $palabra=strtolower($palabra);
                $palabra_buscada=strtolower($palabra_buscada);
            }

            //Si la palabra actual de la frase es la buscada 
            //incremento la cantidad de palabras encontradas
            if ($palabra == $palabra_buscada)
                $num_palabra_buscar++;

            //Es un palindromo si la palabra es igual a su inversa
            if ($palabra == inverso($palabra))
            {
                $num_palindromos++;
                echo $palabra. " es palindromo<br/>";
            }

            //Comprobamos con nuestra funcion si la palabra actual es un palindromo
            if (esPalindromo($palabra))
            {
              $num_palindromosv2++;
              echo $palabra. " es palindromo<br/>";
            }
        }
    }

    //Guardamos la cantidad de palabras
    $resultado["numPalabras"] = $num_palabras;
    $resultado["numFrases"] = $num_frases;
    $resultado["numPalabraBuscada"] = $num_palabra_buscar;
    $resultado["palindromos1"] = $num_palindromos;
    $resultado["palindromos2"] = $num_palindromosv2;

    //

    var_dump($resultado);

    ?>
</body>

</html>