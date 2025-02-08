<?php

namespace App\Model;

use PDO;
use PDOException;

class Producto extends Model
{
    function __construct($con)
    {
        parent::__construct($con);
        $this->table = "producto";
    }

    public function insertar($datos)
    {
        $sql = "INSERT INTO $this->table (nombre, descripcion, precio, imagen) VALUES (:nombre, :descripcion, :precio, :imagen)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(':precio', $datos['precio'], PDO::PARAM_STR);
        $stmt->bindParam(':imagen', $datos['imagen'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function modificar($datos)
    {
        $sql = "UPDATE $this->table SET nombre = :nombre, descripcion = :descripcion, precio = :precio, imagen = :imagen WHERE idproducto = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id', $datos['id'], PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(':precio', $datos['precio'], PDO::PARAM_STR);
        $stmt->bindParam(':imagen', $datos['imagen'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function obtenerProductos($pagina)
    {
        try {
            $offset = ($pagina - 1) * 10; // Asumiendo 10 productos por página
            $sql = "SELECT idproducto, nombre FROM producto LIMIT 10 OFFSET :offset";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Hubo un problema al obtener los productos: ' . $e->getMessage();
            return [];
        }
    }

    public function cargar($id)
    {
        try {
            $sql = "SELECT idproducto, nombre, descripcion, precio, imagen FROM producto WHERE idproducto = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Hubo un problema al cargar el producto: ' . $e->getMessage();
            return null;
        }
    }
}