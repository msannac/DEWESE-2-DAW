<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    function posicion_x_ocurrencia($texto, $palabra, $numero_ocurrencia)
    {
        //Vamos a usar contador para contar la cantidad de palabras encontradas
        $contador = 0;
        //Ponemos a -1 la primera posicion para que pueda encontrar una palabra en la que 
        //empiece al principio, ya que buscamos a partir de la siguiente posicion
        //de la últma palabra encontrada
        $pos = -1;
        while ($contador < $numero_ocurrencia) {
            //Buscamos la palabra en el texto a partir de la ultima palabra encontrada +1
            //Si no ponemos +1 va a encontrar siempre la misma
            $pos = strpos($texto, $palabra,$pos+1);
            //Si no encuentra la palabra indica que no hay hasta esa ocurrencia/repeticion
            if ($pos===false) return -1;

            //Incrementamos la cantidad de palabras que hemos encontrado
            $contador++;
        }
        //Devolvemos la posicion de la ultima piña
        return $pos;
    }

    $nombre = "Juanjo";
    $nota = 8.65456456;
    $texto = sprintf("%s tiene una nota jamon y 2 jamon de %.2f.<br/>", $nombre, $nota);

    $cantidad = 0;
    $texto2 = str_replace("jamon", "pavo", $texto, $cantidad);

    //Substr me devuelve una porcion de la cadena original, introduciendo la posicion inicial y la cantidad de caracteres
    //$texto = substr($texto, 20,10);
    echo $texto;
    echo $texto2;
    print " Se han encontrado $cantidad jamones en el texto y reemplazado.<br/>";


    $texto3 = "piña tenia yo una piña muy amarilla y otro una piña muy piña, que resulto una piña verde";
    print "La posicion de la x piña es ".posicion_x_ocurrencia($texto3, "piña", 3)."<br/>";


    $letra = chr(145);
    print str_pad($letra, 8, "#");

    ?>
</body>

</html>