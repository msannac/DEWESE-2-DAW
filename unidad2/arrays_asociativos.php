<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $jose = ["nombre" => "jose", "edad" => 23, "repetidor" => false, "notaM" => 6.78];
    $juan = ["nombre" => "juan", "edad" => 34, "repetidor" => false, "notaM" => 5];
    $pedro = ["nombre" => "pedro", "edad" => 89, "repetidor" => true, "notaM" => 3.78];
    $sofia = ["nombre" => "sofia", "edad" => 2, "repetidor" => false, "notaM" => 7];

    for ($i = 0; $i < 40; $i++) {
        //Vamos creando un array asociativo 

        $alumnos[$i]["nombre"] = "Alumno" . ($i + 1);
        $alumnos[$i]["edad"] = rand(1, 100);
        $alumnos[$i]["notaM"] = rand(1.0, 10.0);
        //Tiene un 15% de probabilidades de repetir
        $alumnos[$i]["repetidor"] = (rand(1, 6) > 1 ? false : true);
    }

    //Con foreach podemos recorrer cada uno de los elementos del array
    /*foreach ($alumnos as $alumno)
{

    print_r($alumno);
    print "<br/>";

}*/

    //Con foreach podemos recorrer cada uno de los elementos del array
    foreach ($alumnos as $alumno) {

        //Para cada alumno, que es un array asociativo
        //Puedo recorrer sus valores utilizando for each y 
        //acceder a las claves y los valores por separado
        foreach ($alumno as $clave => $valor) {

            //Ejemplo si quisiera solo sacar las claves de cierto tipo
            //print "<br/>".$clave;
            if ($clave=="nombre") {
                print "<br/>".$valor;
            }
        }
    }



    ?>
</body>

</html>