<?php
// view/insert_jugador_view.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Jugador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Insertar Nuevo Jugador</h1>
        <form method="post" action="../controller/insert_jugador_controller.php">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="posicion" class="form-label">Posición</label>
                <input type="text" class="form-control" id="posicion" name="posicion" required>
            </div>
            <div class="mb-3">
                <label for="idClub" class="form-label">Equipo</label>
                <select class="form-select" id="idEquipo" name="idEquipo" required>
                    <?php foreach ($equipos as $equipo): ?>
                        <option value="<?= $club['idEquipo'] ?>"><?= $club['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Insertar</button>
        </form>
    </div>
</body>
</html>