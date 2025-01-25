<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once("./lib/funciones.php");
    /**
     * Realizar un programa en php que lea los siguientes datos de un formulario; 
     *límite un número de 1 a 10 utilizando range de html
     *3 checkbox, uno denominado media, otro sucesion aritmetica y otro factorial
     *Un textarea con tres líneas llenas de datos; la primera de tipo int, la segunda float y string la 
     * tercera ,separados los valores de cada linea por comas
     *Debe de tener un diseño cuco con bootstrap
     *Cada operación matemática debe de ser realizada en una función que recibe los datos, cuando es un 
     *array de datos lo que recibe, deben de utilizarse 3 formas distintas de recibir los datos en las 
     *distintas funciones. Las funciones van en un fichero aparte dentro de una carpeta denominada lib, y 
     *debe incluirse en la web que recibe los datos.
     *El programa php debe de realizar los siguiente, 
     *la suma de todos los enteros, y los float, por separado y juntos.
     *La media de todos los números si el checkbox esta marcado
     *La sucesión aritmética del número definido en el range, 10 valores, si el checkbox esta marcado
     *El factorial se realizará sobre el número de la lista de números enteros del textArea que esté en 
     *la posición que marca el range, es decir, si en el range está seleccionada la posición 4, se deberá 
     *realizar el factorial del número entero que esté en cuarta posición. Si no hay ningún número en esa 
     *posición, se realizará el factorial del mismo número seleccionado en el range.
     *solo si el checkbox está marcado.
     *La palabra más larga de la última fila
     *
     *Todos los resultados deben de almacenarse en un array asociativo con claves de texto con nombre, al final el programa debe de recorrer el array asociativo y crear una tabla en la cual la primera columna sea la clave y la segunda el valor.
     */
    //Comprobamos que hay un valor en el range y en el textarea
    if (!isset($_POST["rango"]) || !isset($_POST["datos"])) {
        header("Location: ejercicio24.php");
    } else {
        $posicion = $_POST["rango"];
        //Separamos las lineas
        $lineas = explode("\n", $_POST["datos"]);
        //Separamos los numeros en dos arrays
        $lista_enteros = explode(",", $lineas[0]);


        //Guardo en el array asociativo los datos
        if (isset($_POST["media"]))
            $resultado["media"] = media($_POST["datos"]);

        if (isset($_POST["sucesion"])) {
           
        }

        $resultado["sumaTodos"] = suma($_POST["datos"], SUMA_TODOS);
        $resultado["sumaEnteros"] = suma($_POST["datos"], SUMA_ENTEROS);
        $resultado["sumaDecimales"] = suma($_POST["datos"], SUMA_FLOATS);

        if (isset($_POST["factorial"]))
            $resultado["factorial"] = factorial($lista_enteros, $posicion);

        echo "Suma: " . $resultado["sumaTodos"];
        echo "<br/>";
        echo "Media: " . $resultado["media"];
        echo "<br/>";
        echo "Factorial: " . $resultado["factorial"];
    }

    ?>
</body>

</html>