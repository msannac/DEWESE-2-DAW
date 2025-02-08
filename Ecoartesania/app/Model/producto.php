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

}