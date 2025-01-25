<?php
define("PLANTA_ORTALIZA", 0);
define("PLANTA_FLORAL", 1);
define("PLANTA_ORNAMENTAL", 2);
define("PLANTA_TROPICAL", 3);

/**
 * plantas_tienda($tienda,$datos_plantas): Recibe el nombre de una tienda y 
 * devuelve un array con las líneas de las plantas de dicha tienda 
 * (crear un array dentro $lista_planta[] y ir añadiendo las que coincidan.
 */
function plantas_tienda($nombre_tienda, $datos_plantas)
{
    //Separamos las plantas en lineas
    $lista_plantas = explode("\n", $datos_plantas);
    //Creamos una variable para guardar las plantas de esta tienda
    $plantas_tienda = [];

    //Recorro las plantas para guardar las que correspondan a la tienda que recibo
    foreach ($lista_plantas as $linea_planta) {

        //Separo los campos de cada linea de plantas
        $planta = explode("-", $linea_planta);

        //Si la planta pertenece a la tienda que recibimos, la guardamos en un array
        if ($nombre_tienda == $planta[0])
            $plantas_tienda[] = $planta;
    }

    //Devuelvo el array con las plantas de la tienda cuyo nombre recibimos
    return $plantas_tienda;
}

/**Si una tienda tiene invernadero, deberá de tener al menos 
 * dos plantas tropicales y más de 3 trabajadores, o más de 5 plantas florales y estar en andalucia. */
function invernadero_ok($datos_tiendas, $datos_plantas)
{

    $lista_tiendas = explode("\n", $datos_tiendas);
    //Recorro las tiendas para comprobar las cantidades
    foreach ($lista_tiendas as $linea_tienda) {
        //En la posicion 5 de cada linea esta 
        $tienda = explode("-", $linea_tienda);
        //sacamos los trabajadores
        $num_trabajadores = $tienda[1];

        //Saco las plantas de la tienda actual
        $plantas = plantas_tienda($tienda[0], $datos_plantas);
        //Inicializo a 0 la cantidad de plantas 
        $cant_plantas_tropicales = 0;
        $cant_plantas_florales = 0;
        //Recorremos todas las plantas
        foreach ($plantas as $planta) {
            //Si la planta actual es tropical incrementamos en contador
            if ($planta[4] == PLANTA_TROPICAL)
                $cant_plantas_tropicales++;
                       //Si la planta actual es tropical incrementamos en contador
            else if ($planta[4] == PLANTA_FLORAL)
                $cant_plantas_florales++;
  
        }

        //Si es un invernadero comprobamos
        if ($tienda[3]="S")
        {
            $esta_andalucia = mb_strtolower($tienda[2])=="sevilla" || mb_strtolower($tienda[2])=="cordoba"  || mb_strtolower($tienda[2])=="jaen" || mb_strtolower($tienda[2])=="cadiz" || mb_strtolower($tienda[2])=="huelva" || mb_strtolower($tienda[2])=="malaga" || mb_strtolower($tienda[2])=="almeria" || mb_strtolower($tienda[2])=="grana";
            if (!(($cant_plantas_tropicales>2 && $num_trabajadores>3) || ($cant_plantas_florales>5 && $esta_andalucia)))
            {
                return false;
            }
        }

    }
    //Si llega aqui es qeu va bien
    return true;
}


/**Deberá mostrar la tienda que ha recaudado más y la que menos, con su nombre. */
function maxmin_recaudado($datos_tiendas)
{
    $lista_tiendas = explode("\n", $datos_tiendas);
    //Recorro las tiendas para comprobar las cantidades
    $maxNombre = "";
    $minNombre = "";
    $max = PHP_INT_MIN;
    $min = PHP_INT_MAX;

    foreach ($lista_tiendas as $linea_tienda) {
        //En la posicion 5 de cada linea esta 
        $tienda = explode("-", $linea_tienda);

        if ($tienda[4] > $max) {
            $maxNombre = $tienda[0];
            $max = $tienda[4];
        }

        if ($tienda[4] < $min) {
            $minNombre = $tienda[0];
            $min = $tienda[4];
        }
    }

    $limites_recaudacion[$maxNombre] = $max;
    $limites_recaudacion[$minNombre] = $min;

    return $limites_recaudacion;
}

/**Deberá de comprobarse que cada tienda tiene los números de plantas que dice, 
 * es decir que el campo número de plantas de cada tienda coincide con la cantidad de 
 * líneas que hay en el textarea de plantas asociado a dicha tienda.
 */

function num_plantas_ok($datos_tiendas, $datos_plantas)
{

    $lista_tiendas = explode("\n", $datos_tiendas);
    //Recorro las tiendas para comprobar las cantidades
    foreach ($lista_tiendas as $linea_tienda) {
        //En la posicion 5 de cada linea esta 
        $tienda = explode("-", $linea_tienda);
        $cant_plantas = $tienda[5];

        //Cuento la cantidad de lineas de plantas de esta tienda
        $numlineas_tienda = count(plantas_tienda($tienda[0], $datos_plantas));

        //Si no coincide devuelvo false
        if ($cant_plantas != $numlineas_tienda) return false;
    }
    //Si llega aqui es qeu va bien
    return true;
}

/**También comprobará que todas las tiendas tengan al menos una planta */

function minimo1_planta($datos_tiendas, $datos_plantas)
{

    $lista_tiendas = explode("\n", $datos_tiendas);
    //Recorro las tiendas para comprobar las cantidades
    foreach ($lista_tiendas as $linea_tienda) {
        //En la posicion 5 de cada linea esta 
        $tienda = explode("-", $linea_tienda);

        //Cuento la cantidad de lineas de plantas de esta tienda
        $numlineas_tienda = count(plantas_tienda($tienda[0], $datos_plantas));

        //Si no coincide devuelvo false
        if ($numlineas_tienda == 0) return false;
    }
    //Si llega aqui es qeu va bien
    return true;
}

/**Deberá sacar un listado con la cantidad de plantas totales de cada tienda y la suma total. */

function sumastock_planta($datos_tiendas, $datos_plantas)
{

    $lista_tiendas = explode("\n", $datos_tiendas);
    $lista_stock = [];
    //Recorro las tiendas para comprobar las cantidades
    foreach ($lista_tiendas as $linea_tienda) {
        //En la posicion 5 de cada linea esta 
        $tienda = explode("-", $linea_tienda);

        //Cuento la cantidad de lineas de plantas de esta tienda
        $plantas_tienda = plantas_tienda($tienda[0], $datos_plantas);

        $suma_stock = 0;
        //Para cada planta de esta tienda
        foreach ($plantas_tienda as $planta) {
            //Voy sumando para cada tienda el stock de sus plantas
            $suma_stock = $suma_stock + $planta[2];
        }

        //una vez tenemos la suma de los stock de la tienda actual
        //guardo en un array asociativo la suma y como clave pongo 
        //el nombre de la tienda
        $lista_stock[$tienda[0]] = $suma_stock;
    }
    //Devolvemos el array con las tiendas y su suma de stock
    return $lista_stock;
}
