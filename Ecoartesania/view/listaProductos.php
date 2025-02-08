<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Lista de Productos</h1>
    <a href="/productos/crear" class="btn btn-success mb-3">Agregar Nuevo Producto</a>

    <table class="table table-bordered">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?= $producto['idproducto'] ?></td>
                <td><?= $producto['nombre'] ?></td>
                <td><?= $producto['descripcion'] ?></td>
                <td><?= $producto['precio'] ?> €</td>
                <td>
                    <a href="/productos/<?= $producto['idproducto'] ?>" class="btn btn-info btn-sm">Ver</a>
                    <a href="/productos/<?= $producto['idproducto'] ?>/modificar" class="btn btn-warning btn-sm">Editar</a>
                    <a href="/productos/<?= $producto['idproducto'] ?>/eliminar" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    </div>
</body>
</html>