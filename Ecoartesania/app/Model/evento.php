<?php
namespace App\Model;

use PDO;
use PDOException;
use Exception;

class Evento extends Model
{
    function __construct($con)
    {
        parent::__construct($con);
        $this->table = "evento";
    }

    public function obtenerTodosLosEventos()
    {
        try {
            $sql = "SELECT * FROM evento";
            $result = $this->con->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Hubo un problema al obtener los eventos: ' . $e->getMessage();
            return [];
        }
    }

    public function mostrarEventosAsociadosProducto($idProducto)
    {
        // Comprobar que el idProducto no está vacío
        if (empty($idProducto)) {
            throw new Exception("El ID del producto no puede estar vacío");
        }
        // Preparar la consulta SQL para obtener los eventos asociados al producto
        $sql = "SELECT e.* FROM evento e
                INNER JOIN evento_producto ep ON e.idevento = ep.evento_idevento
                WHERE ep.producto_idproducto = :idProducto";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
        // Ejecutar la consulta
        $stmt->execute();
        // Obtener los resultados
        $eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $eventos;
    }
}
?>