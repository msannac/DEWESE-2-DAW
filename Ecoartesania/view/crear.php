<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Agregar Nuevo Producto</h1>

    <form method="POST" action="/productos/crear" enctype="multipart/form-data" class="mt-4">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" name="precio" id="precio" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" name="imagen" id="imagen" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="evento" class="form-label">Evento Asociado</label>
            <select name="evento" id="evento" class="form-control">
                <?php foreach ($eventos as $evento): ?>
                    <option value="<?php echo htmlspecialchars($evento['idevento']); ?>"><?php echo htmlspecialchars($evento['nombre']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="/" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>