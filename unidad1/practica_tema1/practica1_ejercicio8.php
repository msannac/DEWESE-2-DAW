<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversiones</title>
</head>
<body>
    <?php 
     // Si el número 1 no está presente, se asigna un valor por defecto
     $numero1 = $_GET['numero1'] ?? null;
     $numero2 = 23.6; // Fijo: 23.6
 
     if ($numero1 !== null) {
         // Convertir los valores a float
         $numero1_decimal = floatval($numero1);
         $numero2_decimal = floatval($numero2);
 
         // Conversión directa del primer número a entero
         $numero1_entero = (int)$numero1_decimal;
 
         // Redondear el segundo número y luego convertir a entero
         $numero2_redondeado = round($numero2_decimal);
 
         // Mostrar los resultados
         echo "Número 1 convertido directamente a entero: " . $numero1_entero . "<br>";
         echo "Número 2 (23.6) redondeado y convertido a entero: " . $numero2_redondeado . "<br><br>";
     } else {
         echo "Por favor, ingresa un número.";
     }
     ?>
 
     <form action="" method="GET">
         <label for="numero1">Número 1 (conversión directa):</label>
         <input type="text" id="numero1" name="numero1" required><br><br>
 
         <input type="submit" value="Convertir">
     </form>
   
    
    
    
    
</body>
</html>