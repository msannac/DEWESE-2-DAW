<?php
// view/mostrar_clubs_view.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Lista de Equipos</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equipos as $equipo): ?>
                    <tr>
                        <td><?= $equipo['idClub'] ?></td>
                        <td><a href="../controller/cargar_jugadores_controller.php?id=<?= $equipo['idEquipo'] ?>"><?= $equipo['nombre'] ?></a></td>
                        <td><a href="../controller/borrar_equipo_controller.php?id=<?= $equipo['idEquipo'] ?>" class="btn btn-danger">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>