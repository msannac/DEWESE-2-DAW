<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body>
    <?php

    //Si me llegan datos muestro la persona seleccionada
    if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['direccion']) && isset($_POST['telefono'])) {

        print "<div class='alert alert-primary' role='alert'>";
        print "<label> {$_POST['nombre']}  -- </label>";
        print "<label> {$_POST['email']} -- </label>";
        print "<label> {$_POST['direccion']} -- </label>";
        print "<label> {$_POST['telefono']} </label>";
        print "</div>";
    }



    //Al cargar el autoload me permite que se automatice
    //La carga de librerias y objetos que tengamos incluidos en el proyecto
    require_once('../vendor/autoload.php');


    use Faker\Factory;

    //Configuramos el idioma de el contenido a generar
    $faker = Factory::create('es_ES');
    $faker_ingles = Factory::create('en_EN');

    //Con el metodo name genera un nombre aleatorio
    $nombre_espanol = $faker->name;
    $nombre_ingles = $faker_ingles->name;


    $lista_personas;

    //Ejemplo de datos que nos podrían llegar desde BD
    for ($i = 0; $i < 20; $i++) {

        //Creamos una persona aleatoria en un array asociativo
        $persona =
            [
                "nombre" => $faker->name,
                "email" => $faker->email,
                "direccion" => $faker->address,
                "telefono" => $faker->phoneNumber

            ];

        //Metemos las personas en un array
        $lista_personas[] = $persona;
    }
    ?>
    <div class="bd-content ps-lg-2">
        <div class="bd-example">
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">email</th>
                        <th scope="col">direccion</th>
                        <th scope="col">telefono</th>
                        <th scope="col">&nbsp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //Recorremos los datos de las personas y vamos creando las celdas
                    foreach ($lista_personas as $persona) {
                        print "<tr>";
                        print "<th>{$persona['nombre']}</th>";
                        print "<td>{$persona['email']}</td>";
                        print "<td>{$persona['direccion']}</td>";
                        print "<td>{$persona['telefono']}</td>";

                        //Creamos un boton para que al pulsarlo pase todos los datos de 
                        //la persona de esta fila a otra web
                        print "<td>";
                        print "<form action='#' method='post'>";
                        print "<button type=submit class='btn btn-primary'>Seleccionar</button>";
                        print "<input type=hidden value='" . $persona['nombre'] . "' name='nombre'>";
                        print "<input type=hidden value='" . $persona['email'] . "' name='email'>";
                        print "<input type=hidden value='" . $persona['direccion'] . "' name='direccion'>";
                        print "<input type=hidden value='" . $persona['telefono'] . "' name='telefono'>";
                        print "</form>";
                        print "</td>";

                        print "</tr>";
                    }

                    ?>


                </tbody>

            </table>
        </div>
    </div>



    <?php
    //Si nos llegan los datos de una persona mostramos una ventana con su informacion

    ?>


</body>

</html>