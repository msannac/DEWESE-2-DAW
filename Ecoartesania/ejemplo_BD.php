<?php 
//Importamos el código con la clase producto y evento
require_once(__DIR__ . '/app/Model/producto.php');
require_once(__DIR__ . '/app/Model/evento.php');

use App\Model\Producto;
use App\Model\Evento;

echo "La base de datos que utilizamos es: ". Producto::$nombreBD. "<br>";

//CONEXION
require_once("config.php");

//Conexion a la BD
try {
    $con = new PDO($dsn, $user, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //Si ha habido un fallo al conectarse a BD
    //Salta una excepcion, con getMEssage sacamos la descripcion del error
    echo 'Falló la conexión: ' . $e->getMessage();
}

//Creamos un objeto de tipo producto y evento y les prestamos nuestra conexion
$productoM = new Producto($con);
$eventoM = new Evento($con);

echo "Borramos un producto<br>";
$productoM->borrar(9);

$datos = $productoM->cargarTodoPaginado(2,5);

$datos_evento = $eventoM->cargarTodoPaginado(1,10);

//$productoM->insertar(['nombre'=>'Producto1','descripcion'=>'Descripción del producto 1','precio'=>100,'imagen'=>'imagen1.jpg']);

//$productoM->modificarTodo(['idProducto'=>'21','nombre'=>'Producto Modificado','descripcion'=>'Descripción modificada','precio'=>150,'imagen'=>'imagen_modificada.jpg']);

//$datos = $productoM->cargarTodoPaginado(2,10);

//var_dump($datos);
var_dump($datos_evento);

?>