<?php

namespace Controller;

use Config;
use Model\equipoModel;
use PDO;

// controller/main_clubs_controller.php
require_once '../config/database.php';
require_once '../model/equipo_model.php';

$config = include '../config/database.php';
$conexion = new PDO("mysql:host=" . $config['host'] . ";dbname=" . $config['dbname'], $config['user'], $config['password']);
$model = new equipoModel($conexion);
$clubs = $model->getClubs();

include '../view/mostrar_clubs_view.php';
?>