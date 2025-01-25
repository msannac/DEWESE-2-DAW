<?php

define("SUMA_ENTEROS", 0);
define("SUMA_FLOATS", 1);
define("SUMA_TODOS", 2);
define("SUCESION_SUMA", 3);
define("SUCESION_MULTIP", 4);


/**
 * powertotalis
 * La funcion recibe un numero y una potencia y devuelve el número elevado a esa potencia
 * @param  mixed $numero
 * @param  mixed $potencia
 * @return void
 */
function powertotalis($numero, $potencia)
{
    $numero = $numero ** $potencia;
    echo $numero . "<br/>";;
}


/**
 * suma
 *
 * @param  mixed $datos
 * @param  mixed $tipo_suma
 * @return void
 */
function suma($datos, $tipo_suma = SUMA_ENTEROS)
{

    //Separamos las lineas
    $lineas = explode("\n", $datos);

    //Separamos los numeros en dos arrays
    $lista_enteros = explode(",", $lineas[0]);
    $lista_float = explode(",", $lineas[1]);

    //Declaro la variable que va a tener la suma
    $suma = 0;

    //dependiendo de la suma que nos piden sumo unos números u otros
    switch ($tipo_suma) {
        case SUMA_ENTEROS:
            foreach ($lista_enteros as $num) {
                $suma = $suma + $num;
            };
            break;
        case SUMA_TODOS:
            foreach ($lista_enteros as $num) {
                $suma = $suma + $num;
            };
        case SUMA_FLOATS:
            foreach ($lista_float as $num) {
                $suma = $suma + $num;
            };
    }

    //Devolvemos la suma
    return $suma;
}


/**
 * media
 *
 * @param  mixed $datos
 * @return int
 */
function media($datos)
{
    $media_numeros = 0;
    $media_numeros = suma($datos, SUMA_TODOS);
    $lineas = explode("\n", $datos);
    $cantidad = count(explode(",", $lineas[0])) + count(explode(",", $lineas[1]));

    //La media es la suma dividida entre la cantidad de numeros
    return $media_numeros / $cantidad;
}

//function sucesion($numero,$tipo_sucesion)

function factorial($lista_enteros, $posicion)
{
    $num = 1;
    //Si en la lista esta la posicion del range cogemos ese número
    //Sino se usa el mismo numero del range

    echo "Posicion del range $posicion";
    echo " numero " . $lista_enteros[$posicion];

    if (isset($lista_enteros[$posicion]))
        $num = $lista_enteros[$posicion];
    else
        $num = $posicion;

    $factorial=1;
    //Vamos multiplicando en la variable factorial todos los números desde el num hasta 1
    while ($num>1)
    {
        $factorial = $factorial*$num;
        $num--;
    }    

    return $factorial;
}
