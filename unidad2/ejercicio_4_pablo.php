/* Escriba un programa en php que lea los siguientes datos de un formulario;
limite un número de 1 a 10 utilizando range de html checkbox, uno denominado media, otro sucesion aritmetica y otro factorial
Un textarea con con tres lineas llenas de datos de tipo int float y string, separados por comas
Debe de tener un diseño cuco con bootstrap
El programa php debe de realizar los siguiente,
la suma de todos los enteros, y los float, por separado y juntos.
La media de todos los numeros si el checkbox esta marcado
La sucesion aritmetica del numero definido en el range, 10 valores, si el checkbox esta marcado
El factorial del número entero que este en la posicion que marca el range, si no hay del mismo valor del range
solo si el checkbox esta marcado.
La palabra mas larga de la ultima fila
Todos los valores deben de almacenarse en un array asociativo con claves de texto con nombre
*/

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Formulario de Cálculos</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="form-group">
                <label for="numero">Selecciona un número (1-10)</label>
                <select class="form-control" id="numero" name="numero">
                    <?php for ($i = 1; $i <= 10; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="media" name="media">
                    <label class="form-check-label" for="media">Calcular Media</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="sucesionAritmetica" name="sucesionAritmetica">
                    <label class="form-check-label" for="sucesionAritmetica">Generar Sucesión Aritmética</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="factorial" name="factorial">
                    <label class="form-check-label" for="factorial">Calcular Factorial</label>
                </div>
            </div>
            <div class="form-group">
                <label for="datos">Ingresa tus datos (enteros, floats y strings)</label>
                <textarea class="form-control" id="datos" name="datos" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lee los datos
        $numero = isset($_POST['numero']) ? intval($_POST['numero']) : null;
        $media = isset($_POST['media']);
        $sucesionAritmetica = isset($_POST['sucesionAritmetica']);
        $factorial = isset($_POST['factorial']);
        $datos = isset($_POST['datos']) ? explode("\n", $_POST['datos']) : [];

        // Separamos los valores
        $enteros = explode(',', $datos[0]);
        $floats = explode(',', $datos[1]);
        $strings = explode(',', $datos[2]);

        // Inicializamos las sumas
        $sumaEnteros = array_sum(array_map('intval', $enteros));
        $sumaFloats = array_sum(array_map('floatval', $floats));
        $sumaTotal = $sumaEnteros + $sumaFloats;

        // Calculamos la media si está marcado
        $mediaTotal = $media ? $sumaTotal / (count($enteros) + count($floats)) : null;

        // Generamos la sucesión aritmética si está marcado
        $sucesionTotal = [];
        if ($sucesionAritmetica) {
            for ($i = 0; $i < 10; $i++) {
                $sucesionTotal[] = $numero + $i;
            }
        }

        // Calculamos el factorial si está marcado
        $factorialTotal = $factorial ? array_product(range(1, $numero)) : null;

        // Encontramos la palabra más larga en la última línea
        $palabraMasLarga = '';
        foreach ($strings as $string) {
            if (strlen(trim($string)) > strlen($palabraMasLarga)) {
                $palabraMasLarga = trim($string);
            }
        }

        // Almacenamos los resultados
        $resultados = [
            'sumaEnteros' => $sumaEnteros,
            'sumaFloats' => $sumaFloats,
            'sumaTotal' => $sumaTotal,
            'mediaTotal' => $mediaTotal,
            'sucesionTotal' => $sucesionTotal,
            'factorialTotal' => $factorialTotal,
            'palabraMasLarga' => $palabraMasLarga
        ];

        // Mostramos los resultados
        echo '<pre>';
        print_r($resultados);
        echo '</pre>';
    }
    ?>
</body>
</html>
