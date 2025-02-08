<?php

namespace Model;

use PDO;

// model/equipo_model.php
class equipoModel {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function getEquipos() {
        $query = $this->conexion->prepare("SELECT * FROM Equipo");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEquipo($idEquipo) {
        $query = $this->conexion->prepare("SELECT * FROM Equipo WHERE idEquipo = :id");
        $query->bindParam(':id', $idEquipo, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function borrarEquipo($idEquipo) {
        $query = $this->conexion->prepare("DELETE FROM Equipo WHERE idEquipo = :id");
        $query->bindParam(':id', $idEquipo, PDO::PARAM_INT);
        return $query->execute() ? 1 : -1;
    }
}
?>
