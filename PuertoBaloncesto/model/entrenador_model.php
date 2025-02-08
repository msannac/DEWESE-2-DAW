<?php
namespace Model;

use PDO;

// model/entrenador_model.php
class EntrenadorModel {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function getEntrenadores() {
        $query = $this->conexion->prepare("SELECT * FROM Entrenador");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
