<?php

namespace Controller;

use Config;
use Model\JugadorModel;
use PDO;

// controller/insert_jugador_controller.php
require_once '../config/database.php';
require_once '../model/jugador_model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = [
        'nombre' => $_POST['nombre'],
        'posicion' => $_POST['posicion'],
        'idEquipo' => $_POST['idEquipo']
    ];

    $config = include '../config/database.php';
    $conexion = new PDO("mysql:host=" . $config['host'] . ";dbname=" . $config['dbname'], $config['user'], $config['password']);
    $model = new JugadorModel($conexion);
    $model->insertarJugador($datos);

    header('Location: main_equipos_controller.php');
}
?>