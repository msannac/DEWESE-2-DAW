<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
</head>
<body>
    <?php
    function cumpleDomicilio($textoCasas) {
        $casas = explode("\n", trim($textoCasas));
        $provincias = [];
        $totalCasas = count($casas);
        foreach ($casas as $casa) {
            $datos = explode(" ", trim($casa));
            $provincias[] = $datos[0];
        }
        $unicas = array_unique($provincias);
        return [
            "mismaProvincia" => count($unicas) === 1,
            "maximoDosCasas" => $totalCasas <= 2
        ];
    }

    function cumpleHijos($textoHijos) {
        $hijos = explode("\n", trim($textoHijos));
        $menoresDe14 = 0;
        $conMinusvalia = 0;
        foreach ($hijos as $hijo) {
            $datos = explode(" ", trim($hijo));
            $edad = (int)$datos[1];
            $minusvalia = $datos[3];
            if ($edad < 14) $menoresDe14++;
            if ($minusvalia === "S") $conMinusvalia++;
        }
        return [
            "cumpleCondiciones" => ($menoresDe14 >= 3 || $conMinusvalia >= 1),
            "mediaEdad" => mediaEdad($textoHijos)
        ];
    }

    function mediaEdad($textoHijos) {
        $hijos = explode("\n", trim($textoHijos));
        $totalChicos = 0;
        $totalChicas = 0;
        $edadChicos = 0;
        $edadChicas = 0;

        foreach ($hijos as $hijo) {
            $datos = explode(" ", trim($hijo));
            $edad = (int)$datos[1];
            $sexo = $datos[2];
            if ($sexo === "H") {
                $edadChicos += $edad;
                $totalChicos++;
            } elseif ($sexo === "M") {
                $edadChicas += $edad;
                $totalChicas++;
            }
        }

        return [
            "mediaChicos" => $totalChicos > 0 ? $edadChicos / $totalChicos : 0,
            "mediaChicas" => $totalChicas > 0 ? $edadChicas / $totalChicas : 0
        ];
    }

    $edad = (int)$_POST["edad"];
    $estadoCivil = $_POST["estado_civil"];
    $sueldo = (int)$_POST["sueldo"];
    $hijos = $_POST["hijos"];
    $domicilios = $_POST["domicilios"];

    $cumpleDomicilios = cumpleDomicilio($domicilios);
    $cumpleHijos = cumpleHijos($hijos);

    $cumpleEdad = $edad >= 18 && $edad < 65;
    $cumpleEstadoCivil = $estadoCivil === "casado";
    $cumpleSueldo = $sueldo > 10000 && $sueldo < 30000;

    echo "<p style='color:" . ($cumpleEdad ? "green" : "red") . "'>Cumple edad</p>";
    echo "<p style='color:" . ($cumpleEstadoCivil ? "green" : "red") . "'>Cumple estado civil</p>";
    echo "<p style='color:" . ($cumpleSueldo ? "green" : "red") . "'>Cumple sueldo</p>";
    echo "<p style='color:" . ($cumpleDomicilios["mismaProvincia"] ? "green" : "red") . "'>Domicilios en misma provincia</p>";
    echo "<p style='color:" . ($cumpleDomicilios["maximoDosCasas"] ? "green" : "red") . "'>Máximo dos casas</p>";
    echo "<p style='color:" . ($cumpleHijos["cumpleCondiciones"] ? "green" : "red") . "'>Cumple condiciones de hijos</p>";

    $media = $cumpleHijos["mediaEdad"];
    echo "<p>Media de edad chicos: " . $media["mediaChicos"] . "</p>";
    echo "<p>Media de edad chicas: " . $media["mediaChicas"] . "</p>";
    ?>
</body>
</html>
