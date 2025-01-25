<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start(); 
    session_regenerate_id(true);

    //Ejemplo de cambio de tiempo de sesion
    ini_set('session.gc_maxlifetime', 1800);


    //Si no estan en la sesion estos dos parametros implica que no se ha
    //iniciado la sesion
    if (!$_SESSION['id_usuario'] || !$_SESSION['token'])
    {
        header('Location:/');
    }
  

        //aqui pondriamos todo el código de la web
  
?>
</body>
</html>