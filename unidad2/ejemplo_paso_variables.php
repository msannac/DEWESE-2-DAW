<?php
    declare(strict_types=1);
    include './lib/funciones.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $nombre_funcion = "maximo";

    function maximo()
    {
        //Con get args podemos recuperar todos los argumentos con los
        //que se ha llamado a una funcion, los devuelve como un array
        $parametros = func_get_args();


        //usamos la función máx que nos devuel el máximo de los numeros
        return max($parametros);


    }


    /**
     * Ejercicio4 realizar un programa en php que lea los siguientes datos de un formulario; 
     * limite un número de 1 a 10 utilizando range de html
     * 3 checkbox, uno denominado media, otro sucesion aritmetica y otro factorial
     * Un textarea con con tres lineas llenas de datos de tipo int float y string,separados por comas
     * Debe de tener un diseño cuco con bootstrap
     *    
     * El programa php debe de realizar los siguiente, 
     * la suma de todos los enteros, y los float, por separado y juntos.
     * La media de todos los numeros si el checkbox esta marcado
     * La sucesion aritmetica del numero definido en el range, 10 valores, si el checkbox esta marcado
     * El factorial del número entero que este en la posicion que marca el range, si no hay del mismo valor del range
     * solo si el checkbox esta marcado.
     * La palabra mas larga de la ultima fila
     * 
     * Todos los valores deben de almacenarse en un array asociativo con claves de texto con nombre 
     * 
      * */
     



    //Para pasar por valor una variable a una funcion hay que poner delante el &
    //Esto hace que yo pueda modificar el valor de esa variable y se queda modificado
    //despues de la ejecucion de funcion
    function powertotalis_ref(&$numero,$potencia)
    {
        $numero = $numero**$potencia;
        echo $numero."<br/>";
    }

    $valor=3;
    powertotalis($valor,3);

    echo $valor."<br/>";

    powertotalis_ref($valor,3);

    echo $valor."<br/>";

    
    echo $nombre_funcion(23,24,1,-2,0,345,223)."<br/>";


    ?>
</body>
</html>