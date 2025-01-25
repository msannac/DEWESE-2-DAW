<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Ayuda</title>
    <!-- Importar Bootstrap desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Solicitud de Ayuda</h1>
    <form action="procesar.php" method="POST" class="mt-4">
        <!-- Campo Nombre -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required>
        </div>
        <!-- Campo Edad -->
        <div class="mb-3">
            <label for="edad" class="form-label">Edad:</label>
            <select id="edad" name="edad" class="form-select" required>
                <?php for ($i = 18; $i <= 65; $i++) echo "<option value='$i'>$i</option>"; ?>
            </select>
        </div>
        <!-- Campo Estado -->
        <div class="mb-3">
            <label class="form-label">Estado Civil:</label>
            <div>
                <input type="radio" id="soltero" name="estado" value="Soltero" required>
                <label for="soltero">Soltero</label>
                <input type="radio" id="casado" name="estado" value="Casado" required>
                <label for="casado">Casado</label>
            </div>
        </div>
        <!-- Campo Sueldo -->
        <div class="mb-3">
            <label for="sueldo" class="form-label">Rango de Sueldo:</label>
            <select id="sueldo" name="sueldo" class="form-select" required>
                <option value="0-10000">0 - 10,000</option>
                <option value="10001-20000">10,001 - 20,000</option>
                <option value="20001-30000">20,001 - 30,000</option>
                <option value="30001-40000">30,001 - 40,000</option>
                <option value="40001-50000">40,001 - 50,000</option>
            </select>
        </div>
        <!-- Campo Hijos -->
        <div class="mb-3">
            <label for="hijos" class="form-label">Hijos (uno por línea):</label>
            <textarea id="hijos" name="hijos" rows="5" class="form-control" required></textarea>
        </div>
        <!-- Campo Domicilios -->
        <div class="mb-3">
            <label for="domicilios" class="form-label">Domicilios (uno por línea):</label>
            <textarea id="domicilios" name="domicilios" rows="5" class="form-control" required></textarea>
        </div>
        <!-- Botón Enviar -->
        <button type="submit" class="btn btn-primary w-100">Enviar</button>
    </form>
</div>
<!-- Script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
