<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once("./lib/funciones_examen.php");
   
    //Primero compruebo que tenemos datos en los textArea


    if (!isset($_POST["tiendas"]) || !isset($_POST["plantas"]))
    {
        echo "Faltan datos";
        header("location:examen.php");
    }
    else{

        $datos_tiendas = $_POST["tiendas"];
        $datos_plantas = $_POST["plantas"];
        
        echo "El numero de plantas esta bien " . (num_plantas_ok($datos_tiendas,$datos_plantas)?"OK":"FAIL") . "<br>";
        echo "minimo hay una planta " . (minimo1_planta($datos_tiendas,$datos_plantas)?"OK":"FAIL") . "<br>";


        var_dump(sumastock_planta($datos_tiendas,$datos_plantas));

        var_dump(maxmin_recaudado($datos_tiendas));

        

    }

    ?>
</body>

</html>