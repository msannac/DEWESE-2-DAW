<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //en phplos arrays tienen un tamaño dinamico, le podemos añadir elementos sin problema
    //Tambbien puede combinar datos de distinto tipo, incluso arrays dentro de otros
    $alumno = ["jose", 23, false, 6.78, ["petito", 23, 11500]];

    //Para acceder a los elementos de un array utilizamos el operador []
    //Si dentro de un array hay otro array y queremos acceder a algun elemento del array interno
    //utilizamos dos veces [] el primero es la posicion del array interno dentro del array principal y el segundo indica
    //La posicion del elemento 
    print $alumno[4][2] . "<br/>";

    //$alumno = "final";
    $alumno[] = "final";

    //Con print_r mostramos el contenido de un array
    print_r($alumno);


    //Vamos a calcular la media el maximo y el minimo de una array de numeros
    for ($i = 0; $i < 20; $i++) {
        //Rellenamos aleatoriamente el array con 20 numeros
        $lista_numeros[] = rand(1, 100);
    }

    print "El valor maximo es " . max($lista_numeros) . "<br/>";
    print "El valor minimo es " . min($lista_numeros) . "<br/>";
    print "La media es " . array_sum($lista_numeros) / count($lista_numeros) . "<br/>";

    print_r($lista_numeros);

    $min = PHP_INT_MAX;
    $max = PHP_INT_MIN;
    $avg = 0;

    //Recorro todos los numeros
    for ($i = 0; $i < count($lista_numeros); $i++) {

        //Vamos sumando en avg todos los numeros
        $avg = $avg + $lista_numeros[$i];

        //El minimo se hace comprobando el numero en la posicion i 
        //Si es menor que nuestro minimo temporal
        if ($lista_numeros[$i] < $min)
            $min = $lista_numeros[$i];


        //El aximo se hace comprobando el numero en la posicion i 
        //Si es mayor que nuestro maximo temporal
        if ($lista_numeros[$i] > $max)
            $max = $lista_numeros[$i];
    }

    //Calculamos la media
    $avg=$avg/count($lista_numeros);

    print "<br/>El valor maximo es " . $max . "<br/>";
    print "El valor minimo es " . $min . "<br/>";
    print "La media es " . $avg . "<br/>";

    $lista_letras = ['a','e','z'];

    print "<br/>";
    print_r($lista_letras);
    print "<br/>";
    unset($lista_letras[1]);
    print "<br/>";
    print_r($lista_letras);
    print "<br/>";
    $lista_letras[] ='e';
    $lista_letras[1] ='u';
    print "<br/>";
    print_r($lista_letras);
    print "<br/>";

    if (isset($lista_letras[2]))
        print "Existe la posicion 2 del array";
        if (isset($lista_letras[4]))
        print "Existe la posicion 4 del array";

    ?>
</body>

</html>