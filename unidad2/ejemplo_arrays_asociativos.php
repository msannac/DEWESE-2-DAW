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
    
    $jose = ["nombre" => "jose","edad"=> 23,"repetidor"=> false,"notaM"=>6.78];
    $juan = ["nombre" => "juan","edad"=> 23,"repetidor"=> false,"notaM"=>5];
    $pedro = ["nombre" => "pedro","edad"=> 23,"repetidor"=> false,"notaM"=>3.78];
    $sofia = ["nombre" => "sofia","edad"=> 23,"repetidor"=> false,"notaM"=>7];


for($i=0;$i<40;$i++){

    $alumnos[$i]["nombre"] = "Alumno".($i+1);
    $alumnos[$i]["edad"] = rand(1,100);
    $alumnos[$i]["notaM"] = rand(1.0,10.0);
    //Tiene un 15% de probabilidad de que sea repetidor
    $alumnos[$i]["repetidor"] = (rand(1,6)>1?false:true);

}
// Con foreach podemos recorrer cada uno de los elementos del array
foreach($alumnos as $alumno);
{
//Para cada alumno, que es un array asociativo
//Puedo recorrer sus valores utilizando el foreach y
//acceder a las claves y los valores por separado

    foreach($alumno as $clave => $valor){
        if($clave == "nombre"){
            print "</br>$valor";
    }

}
}

?>



</body>
</html>