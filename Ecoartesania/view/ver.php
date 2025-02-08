<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Producto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="display-4"><?php echo htmlspecialchars($producto['nombre']); ?></h1>
        <img src="/imagenes/<?php echo htmlspecialchars($producto['imagen']); ?>" alt="Imagen del producto" class="img-fluid mb-4">
        <h2 class="my-4">Eventos Asociados</h2>
        <ul class="list-group">
            <?php foreach ($eventos as $evento): ?>
                <li class="list-group-item">
                    <strong>Nombre:</strong> <?php echo htmlspecialchars($evento['nombre']); ?><br>
                    <strong>Fecha:</strong> <?php echo htmlspecialchars($evento['fecha_evento']); ?><br>
                    <strong>Descripción:</strong> <?php echo htmlspecialchars($evento['descripcion']); ?><br>
                    <strong>Ubicación:</strong> <?php echo htmlspecialchars($evento['ubicacion']); ?><br>
                    <strong>Cupo Máximo:</strong> <?php echo htmlspecialchars($evento['cupo_maximo']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>