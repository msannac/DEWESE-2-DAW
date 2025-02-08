<?php
namespace Model;

use PDO;

// model/jugador_model.php
class JugadorModel {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function getJugadores($idEquipo) {
        $query = $this->conexion->prepare("SELECT * FROM Jugador WHERE idEquipo = :idClub");
        $query->bindParam(':idEquipo', $idEquipo, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarJugador($datos) {
        $query = $this->conexion->prepare(
            "INSERT INTO Jugador (nombre, posicion, idEquipo) VALUES (:nombre, :posicion, :idClub)"
        );
        $query->bindParam(':nombre', $datos['nombre']);
        $query->bindParam(':posicion', $datos['posicion']);
        $query->bindParam(':idEquipo', $datos['idEquipo'], PDO::PARAM_INT);
        return $query->execute();
    }
}
?>
