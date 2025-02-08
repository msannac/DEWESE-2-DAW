<?php

namespace Controller;

use Config;
use Model\JugadorModel;
use PDO;

// controller/cargar_jugadores_controller.php
require_once '../config/database.php';
require_once '../model/jugador_model.php';

$idEquipo = $_GET['id'];
$config = include '../config/database.php';
$conexion = new PDO("mysql:host=" . $config['host'] . ";dbname=" . $config['dbname'], $config['user'], $config['password']);
$model = new JugadorModel($conexion);
$jugadores = $model->getJugadores($idEquipo);

include '../view/listar_jugadores_view.php';
?>