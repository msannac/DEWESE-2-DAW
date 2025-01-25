<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Entrenador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Editar Entrenador</h1>

    <form method="POST" action="/entrenadores/<?= $entrenador['id'] ?>/editar" class="mt-4">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?= htmlspecialchars($entrenador['nombre']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="experiencia" class="form-label">Experiencia (en años)</label>
            <input type="number" name="experiencia" id="experiencia" class="form-control" value="<?= $entrenador['experiencia'] ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
        <a href="/entrenadores" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
