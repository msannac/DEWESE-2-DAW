
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con Operaciones Matemáticas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Formulario de Operaciones Matemáticas</h1>
    <form method="POST" class="mt-4">
        <!-- Límite usando range -->
        <div class="mb-3">
            <label for="limite" class="form-label">Seleccione un número (1-10):</label>
            <input 
                type="range" 
                id="limite" 
                name="limite" 
                class="form-range" 
                min="1" 
                max="10" 
                value="1" 
                oninput="mostrarSeleccion(this.value)">
            <p>Selección actual: <span id="valorSeleccionado">1</span></p>
        </div>
        
        <!-- Checkboxes -->
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="media" name="media">
            <label class="form-check-label" for="media">Media</label>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="sucesion" name="sucesion">
            <label class="form-check-label" for="sucesion">Sucesión Aritmética</label>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="factorial" name="factorial">
            <label class="form-check-label" for="factorial">Factorial</label>
        </div>

        <!-- Textarea -->
        <div class="mb-3">
            <label for="datos" class="form-label">Ingrese los datos:</label>
            <textarea id="datos" name="datos" class="form-control" rows="3"></textarea>
            <small class="form-text text-muted">Ingrese los datos separados por comas: enteros en la primera línea, floats en la segunda y cadenas en la tercera.</small>
        </div>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

<script>
    function mostrarSeleccion(valor) {
        // Actualiza el contenido del elemento con el valor actual del range
        document.getElementById('valorSeleccionado').textContent = valor;
    }
</script>

</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once './lib/funciones.php';

    // Recoger datos del formulario
    $limite = (int) $_POST['limite'];
    $mediaCheckbox = isset($_POST['media']);
    $sucesionCheckbox = isset($_POST['sucesion']);
    $factorialCheckbox = isset($_POST['factorial']);
    $textareaData = explode("\n", $_POST['datos']);
    $enteros = isset($textareaData[0]) ? array_map('intval', explode(',', trim($textareaData[0]))) : [];
    $floats = isset($textareaData[1]) ? array_map('floatval', explode(',', trim($textareaData[1]))) : [];
    $strings = isset($textareaData[2]) ? explode(',', trim($textareaData[2])) : [];

    // Calcular resultados
    $resultados = [];

    // Sumas
    $resultados['Suma de enteros'] = sumarEnteros($enteros);
    $resultados['Suma de floats'] = sumarFloats($floats);
    $resultados['Suma total'] = sumarTotal($enteros, $floats);

    // Media
    if ($mediaCheckbox) {
        $resultados['Media de todos los números'] = calcularMedia(array_merge($enteros, $floats));
    }

    // Sucesión aritmética
    if ($sucesionCheckbox) {
        $resultados['Sucesión aritmética'] = implode(', ', generarSucesion($limite, 10));
    }

    // Factorial
    if ($factorialCheckbox) {
        $indice = $limite - 1; // Índice en base cero
        $numeroFactorial = $enteros[$indice] ?? $limite;
        $resultados['Factorial'] = calcularFactorial($numeroFactorial);
    }

    // Palabra más larga
    $resultados['Palabra más larga'] = obtenerPalabraMasLarga($strings);

    // Mostrar resultados
    echo '<table class="table mt-4">';
    echo '<thead><tr><th>Clave</th><th>Valor</th></tr></thead>';
    echo '<tbody>';
    foreach ($resultados as $clave => $valor) {
        echo "<tr><td>{$clave}</td><td>{$valor}</td></tr>";
    }
    echo '</tbody>';
    echo '</table>';
}
?>
