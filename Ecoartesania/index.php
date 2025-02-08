<?php

require_once __DIR__ . '/vendor/autoload.php';

use FastRoute\RouteCollector;
use App\Controlador\ProductoController;
use App\Controlador\UsuarioController;
use Dotenv\Dotenv;
use Kint\Kint;
use App\Model\Producto;
use App\utils\Utils;

// Inicializa dotenv para cargar las variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$producto = new App\Controlador\ProductoController();
$usuario = new App\Controlador\UsuarioController();

$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {

    
//Con addroute voy añadiendo rutas url por get o por post a las que responderemos
//Las que no esten aquí darán fallo
//Listado de productos
//$r->addRoute('GET', '/', ['App\Controlador\ProductoController', 'mostrarProductos']);
$r->addRoute('GET', '/listaProductos/{pagina:\d+}', ['App\Controlador\ProductoController', 'mostrarProductos']);
$r->addRoute('POST', '/', ['App\Controlador\ProductoController', 'mostrarProductosFiltrado']);
//Mostrar detalle de producto
$r->addRoute('GET', '/productos/{id:\d+}', ['App\Controlador\ProductoController', 'mostrarProducto']);
$r->addRoute('GET','/productos/crear',['App\Controlador\ProductoController', 'crearProducto']);
$r->addRoute('POST','/productos/crear',['App\Controlador\ProductoController', 'insertarProducto']);
$r->addRoute('GET','/productos/{id:\d+}/eliminar',['App\Controlador\ProductoController', 'eliminarProducto']);
// Rutas para el registro y login de usuarios
$r->addRoute('GET', '/registro', ['App\Controlador\UsuarioController', 'mostrarRegistro']);
$r->addRoute('POST', '/registro', ['App\Controlador\UsuarioController', 'registro']);
$r->addRoute('GET', '/login', ['App\Controlador\UsuarioController', 'mostrarLogin']);
$r->addRoute('POST', '/login', ['App\Controlador\UsuarioController', 'login']);
$r->addRoute('GET', '/confirmarCuenta', ['App\Controlador\UsuarioController', 'confirmarCuenta']);
$r->addRoute('GET', '/cerrarSesion', ['App\Controlador\UsuarioController', 'cerrarSesion']);
$r->addRoute('GET', '/verify', ['App\Controlador\UsuarioController', 'confirmarCuenta']);
// Rutas para la gestión de usuarios
$r->addRoute('GET', '/usuarios', ['App\Controlador\UsuarioController', 'mostrarUsuarios']);
$r->addRoute('GET', '/usuarios/{id:\d+}', ['App\Controlador\UsuarioController', 'mostrarUsuario']);
$r->addRoute('GET', '/usuarios/{id:\d+}/eliminar', ['App\Controlador\UsuarioController', 'eliminarUsuario']);
 // Ruta para mostrar el formulario de modificación
 $r->addRoute('GET', '/productos/{id:\d+}/modificar', ['App\Controlador\ProductoController', 'mostrarFormularioModificacion']);
 // Ruta para manejar la modificación del producto
 $r->addRoute('POST', '/productos/modificar', ['App\Controlador\ProductoController', 'modificar']);
 $r->addRoute('GET', '/', ['App\Controlador\UsuarioController', 'mostrarLogin']);
});

//Dependiendo de la solicitud haremos una cosa u otra 
//recomemos la url y si ha sido get post o cual
// Obtener datos de la solicitud
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Eliminar parámetros de la consulta
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

// Despachar la ruta
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // Ruta no encontrada
        http_response_code(404);
        echo "404 - Página no encontrada<br>Intentalo de nuevo";
        break;
    
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        // Método HTTP no permitido
        $allowedMethods = $routeInfo[1];
        http_response_code(405);
        echo "405 - Método no permitido. Métodos permitidos: " . implode(', ', $allowedMethods);
        break;
    
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        //Asignacion doble de variables que se reciben desde un array seria igual a las dos siguientes lineas
        //$class=$handler[0];
        //$method=$handler[1];
        [$class, $method] = $handler;
        $controller = new $class();
       
        //Llamamos a la funcion encargada de despachar la ruta
        $controller->$method($vars);
        //call_user_func([$controller, $method], $vars);
        break;
}