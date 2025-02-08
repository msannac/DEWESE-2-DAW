<?php

namespace Controller;

use Config;
use Model\equipoModel;
use PDO;

// controller/borrar_equipo_controller.php
require_once '../config/database.php';
require_once '../model/equipo_model.php';

$idClub = $_GET['id'];
$config = include '../config/database.php';
$conexion = new PDO("mysql:host=" . $config['host'] . ";dbname=" . $config['dbname'], $config['user'], $config['password']);
$model = new equipoModel($conexion);
$result = $model->borrarEquipo($idEquipo);

header('Location: main_equipos_controller.php');
?>