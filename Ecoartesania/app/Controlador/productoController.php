<?php

namespace App\Controlador;

use App\Utils\Utils;
use App\Model\Producto;
use App\Model\Evento;
use Kint\Kint;

class ProductoController
{

    public function mostrarProductos()
    {
        //Nos conectamos a la bd
        $con = Utils::getConnection();
        //Creamos el modelo
        $productoM = new Producto($con);
        //Cargamos los productos
        $productos = $productoM->cargarTodoPaginado(1,200);
        //Compactamos los datos que necesita la vista para luego pasarselos
        $datos = compact("productos");

        //Cargamos la vista
        Utils::render('listaProductos', $datos);
    }

    public function mostrarProducto($datos)
    {
        //Nos conectamos a la bd
        $con = Utils::getConnection();
        //Creamos el modelo
        $productoM = new Producto($con);
        //Cargamos el producto
        $producto = $productoM->cargar($datos['id']);
        
        // Creamos el modelo de Evento
        $eventoM = new Evento($con);
        // Cargamos los eventos asociados al producto
        $eventos = $eventoM->mostrarEventosAsociadosProducto($datos['id']);
        
        //Compactamos los datos que necesita la vista para luego pasarselos
        $datos = compact("producto", "eventos");
        
        //Cargamos la vista
        Utils::render('ver', $datos);
    }

    public function crearProducto()
    {
        Utils::render('crear');
    }

    public function insertarProducto()
    {
        // Guardamos los datos del formulario
        $producto = $_POST;
        $imagenRuta = null;

        // Verificamos si se subió una imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            $archivo = $_FILES['imagen'];

            // Definimos la ruta donde se guardará la imagen
            $directorioDestino = $_SERVER['DOCUMENT_ROOT'] . "/imagenes/";
            if (!is_dir($directorioDestino)) {
                mkdir($directorioDestino, 0777, true);
            }

            // Generamos un nombre único para la imagen
            $nombreArchivo = uniqid('producto_') . '.' . pathinfo($archivo['name'], PATHINFO_EXTENSION);
            $rutaCompleta = $directorioDestino . $nombreArchivo;

            // Movemos la imagen al directorio de destino
            if (move_uploaded_file($archivo['tmp_name'], $rutaCompleta)) {
                // Guardamos la ruta relativa para almacenarla en la base de datos
                $imagenRuta = $nombreArchivo;
            }
        }

        // Agregamos la ruta de la imagen a los datos del producto
        $producto['imagen'] = $imagenRuta;

        // Nos conectamos a la BD
        $con = Utils::getConnection();

        // Creamos el modelo
        $productoM = new Producto($con);

        // Insertamos el producto en la BD
        $productoM->insertar($producto);

        // Redirigimos
        Utils::redirect('/listaProductos/1');
    }

    public function eliminarProducto($datos)
    {
        //Nos conectamos a la bd
        $con = Utils::getConnection();
        //Creamos el modelo
        $productoM = new Producto($con);
        //borramos el producto
        $productoM->borrar($datos['id']);
        //Cargamos la vista
        Utils::redirect('/');
    }

    public function mostrarFormularioModificacion($vars)
    {
         // Obtener la ID del producto desde las variables de la ruta
        $id = $vars['id'];
        //Nos conectamos a la bd
        $con = Utils::getConnection();
        //Creamos el modelo
        $productoM = new Producto($con);
        //Cargamos el producto
        $producto = $productoM->cargar($id);
        //Compactamos los datos que necesita la vista para luego pasarselos
        $datos = compact("producto");

        //Cargamos la vista
        Utils::render('modificar', $datos);
    }

    public function modificar()
    {
        $datos = $_POST;
        $imagenRuta = null;

        // Verificamos si se subió una imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            $archivo = $_FILES['imagen'];

            // Definimos la ruta donde se guardará la imagen
            $directorioDestino = $_SERVER['DOCUMENT_ROOT'] . "/imagenes/";
            if (!is_dir($directorioDestino)) {
                mkdir($directorioDestino, 0777, true);
            }

            // Generamos un nombre único para la imagen
            $nombreArchivo = uniqid('producto_') . '.' . pathinfo($archivo['name'], PATHINFO_EXTENSION);
            $rutaCompleta = $directorioDestino . $nombreArchivo;

            // Movemos la imagen al directorio de destino
            if (move_uploaded_file($archivo['tmp_name'], $rutaCompleta)) {
                // Guardamos la ruta relativa para almacenarla en la base de datos
                $imagenRuta = $nombreArchivo;
            }
        }

        // Agregamos la ruta de la imagen a los datos del producto
        $datos['imagen'] = $imagenRuta;

        // Nos conectamos a la bd
        $con = Utils::getConnection();
        // Creamos el modelo
        $productoM = new Producto($con);
        // Modificamos el producto
        $productoM->modificar($datos);
        // Redirigimos a la vista principal
        Utils::redirect('/listaProductos/1');
    }
}
?>





