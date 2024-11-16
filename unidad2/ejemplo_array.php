<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Generar un array de 10 números aleatorios entre 1 y 100
$numeros = [];
for ($i = 0; $i < 10; $i++) {
    $numeros[] = rand(1, 100); // Genera números entre 1 y 100
}

// Calcular el máximo, mínimo y la media
$maximo = max($numeros);
$minimo = min($numeros);
$suma = array_sum($numeros);
$media = $suma / count($numeros);

// Mostrar resultados
echo "Array de números: $numeros[0], $numeros[1], $numeros[2], $numeros[3], $numeros[4], $numeros[5], $numeros[6], $numeros[7], $numeros[8], $numeros[9]\n";

echo "Máximo: $maximo\n";
echo "Mínimo: $minimo\n";
echo "Suma: $suma\n";
echo "Media: $media\n";
?>

<?php

// Calcular el máximo, mínimo y la media
$maximo = PHP_INT_MIN;
$minimo = PHP_INT_MAX;
$avg = 0;


for ($i = 0; $i < count($numeros); $i++) {
    
    $avg = $avg + $numeros[$i];
    
    if ($numeros[$i] > $maximo) {
        $maximo = $numeros[$i];
    }
    if ($numeros[$i] < $minimo) {
        $minimo = $numeros[$i];
    }
    echo "$numeros[$i] ";
    
    }

$avg = $avg / count($numeros);

print "El valor maximo es: ".$maximo."<br>";
print  "El valor mínimo es: ".$minimo."<br>";
print  "La media es: ".$avg."<br>";




$Lista_letras = ["a", "e", "z"];



if (isset($Lista_letras[2])) 
    print "Existe la posición 2 del array</br>";

    if (!isset($Lista_letras[4]))
    print "No existe la dirección 4 del array</br>";


?>

</body>
</html>