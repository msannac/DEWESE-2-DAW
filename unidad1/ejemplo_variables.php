<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //Las constantes se definen utilizando la funcion define
    define("VIDA_MAX", 100);
    //O utilizando la palabra reservada const
    const MIN_ALUMNOS = 5;

    $array_numeros = array(23, 12 - 2, 34, 23);

    $i = 0;
    $num1 = 23 . "40";
    $num2 = "24";
    $num3 = $num1 + $num2;
    $num4 = 24;
    $num1 = "ventitres";

    $texto = "<br/>estamos en la clase daw de 2 daw,aunque sea de perogrullo";

    print PHP_INT_MAX . "</br>";

    if (is_int($num2))
        print "Es entero</br>";
    else
        print "No es entero</br>";


    print $num1;
    print "<br/> La suma de 23 y 24 es $num3";

    if (2 >= 2) {

        
        //nombre esta declarada dentro del if solo accesible dentro del if
        $nombre = "pepe";
        print "<br/> Entra";
    }

    //Si utilizamos comillas simples para las cadenas de texto
    //no se pueden meter variables dentro
    print '<br/>El nombre es ' . $nombre;

    echo "<br/>El nombre es $nombre";

    //strlen nos dice cuantos caracteres tiene un string
    print "<br/>El nombre tiene " . strlen($nombre) . " caracteres<br/>";

    $empleado = array("pedro", 34, 2345.4, "soltero");

    //count nos cuenta la cantidad de elementos de un array
    print("</br>El array empleado tiene " . count($empleado) . " elementos");
    //var_dump($empleado);

    print $texto;

    //str_replace reemplaza la palabra que esta como primer parametro por la que pongamos como segundo
    //Por defecto reemplaza todas las ocurrencias
    print str_replace("daw", "smr", $texto);

    //Explode corta una cadena y devuelve un array de secciones de dicha cadena
    //Hay que indicarle el caracter separador 
    var_dump(explode(" ", $texto));

    print "<br/>La vida maxima es: " . VIDA_MAX;

    if ($num2 === $num4)
        print "<br/> Son iguales";
    else
        print "<br/> No son iguales";;


    $valor = ($num2 + $num4) / 2;
    ?>
</body>

</html>