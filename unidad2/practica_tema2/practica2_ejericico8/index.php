<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generador de Página Web</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Generador de Página Web</h1>
        <form method="POST">
            <div class="form-group">
                <label for="encabezado">Selecciona el Encabezado:</label>
                <select name="encabezado" class="form-control">
                    <option value="1">Encabezado 1</option>
                    <option value="2">Encabezado 2</option>
                    <option value="3">Encabezado 3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cuerpo">Selecciona el Cuerpo:</label>
                <select name="cuerpo" class="form-control">
                    <option value="1">Cuerpo 1</option>
                    <option value="2">Cuerpo 2</option>
                    <option value="3">Cuerpo 3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pie">Selecciona el Pie:</label>
                <select name="pie" class="form-control">
                    <option value="1">Pie 1</option>
                    <option value="2">Pie 2</option>
                    <option value="3">Pie 3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="estilo">Selecciona el Estilo:</label>
                <select name="estilo" class="form-control">
                    <option value="1">Estilo 1</option>
                    <option value="2">Estilo 2</option>
                    <option value="3">Estilo 3</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Generar Página</button>
        </form>
        <hr>
        <?php
        // Validar si se ha enviado el formulario
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $encabezado = $_POST['encabezado'];
            $cuerpo = $_POST['cuerpo'];
            $pie = $_POST['pie'];
            $estilo = $_POST['estilo'];
            // Incluir el archivo CSS seleccionado
            if ($estilo == '1') {
                echo '<link rel="stylesheet" href="css/estilo1.css">';
            } elseif ($estilo == '2') {
                echo '<link rel="stylesheet" href="css/estilo2.css">';
            } elseif ($estilo == '3') {
                echo '<link rel="stylesheet" href="css/estilo3.css">';
            }
        
            // Incluir el encabezado seleccionado
            if ($encabezado == '1') {
                include 'componentes/encabezado1.php';
            } elseif ($encabezado == '2') {
                include 'componentes/encabezado2.php';
            } elseif ($encabezado == '3') {
                include 'componentes/encabezado3.php';
            }
            
            // Incluir el cuerpo seleccionado
            if ($cuerpo == '1') {
                include 'componentes/cuerpo1.php';
            } elseif ($cuerpo == '2') {
                include 'componentes/cuerpo2.php';
            } elseif ($cuerpo == '3') {
                include 'componentes/cuerpo3.php';
            }
            
            // Incluir el pie seleccionado
            if ($pie == '1') {
                include 'componentes/pie1.php';
            } elseif ($pie == '2') {
                include 'componentes/pie2.php';
            } elseif ($pie == '3') {
                include 'componentes/pie3.php';
            }
        }
        ?>
        
    </div>
</body>
</html>
