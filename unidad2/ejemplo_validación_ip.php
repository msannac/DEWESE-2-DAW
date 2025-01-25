<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    //Vamos a hacer un ejemplo en el cual validamos si una ip esta bien
    $ip = "123.11.12.011";
    //Presuponemos que esta bien, vamos a ir comprobando si hay algun fallo
    $formato_correcto = true;

    //Con explode separamos los puntos y nos devuelve un array con los elementos que estan separados
    $numeros_ip = explode(".", $ip);
    //var_dump($numeros_ip);

    //Si la cantidad de numeros de la ip es distinta a 4 esta mal el formato
    //Con count podemos saber la cantidad de elementos del array
    if (count($numeros_ip) != 4)
    {
        echo "La ip no tiene el formato correcto, ya que no hay 3 puntos que separan los números";
        $formato_correcto = false;
    }

    //Bucles para recorrer un array 
    //Ejemplo de recorrido utilizando un indice ($i)
    /*for ($i=0;$i<count($numeros_ip);$i++)
    {

    }
*/

    foreach ($numeros_ip as $numero) {

        //Si no es un numero algunos de los componentes de la ip no es valido el formato
        if (!ctype_digit($numero)) 
        {
            echo "La ip no tiene el formato correcto, alguno de los componentes no es númerico";
            $formato_correcto = false;
            break;
        }
        else
        //Tambien comprobamos que el número este entre 0 y 254
        if ($numero<0 || $numero>255)
        {
            echo "La ip no tiene el formato correcto, valores fuera de rango";
            $formato_correcto = false;
            break;
        }
        else
        //Comprobamos que no haya 0 a la izquierda
        if (strlen($numero)>1 && $numero[0]=='0')
        {
            echo "La ip no tiene el formato correcto, ceros a la izquierda";
            $formato_correcto = false;
            break;
        }
    }

    if ($numeros_ip[0]==0 || $numeros_ip[0]==255 || $numeros_ip[3]==0 || $numeros_ip[3]==255)
    {
        echo "La ip no tiene el formato correcto, no puede ser 0 ni 255 al principio ni al final";
        $formato_correcto = false;
    }

    //Por ultimo sacamos por pantalla el mensaje de que ha ido bien
    if ($formato_correcto)
        echo "La ip es valida";




    ?>

</body>

</html>