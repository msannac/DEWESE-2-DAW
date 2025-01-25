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

    //Ejemplo de inicio de sesion y guarda de los datos del usuario
    //Por ejemplo pongo 1
    //Ejecutariamos esto cuando un usuario se loga correctamenta
    $_SESSION['user_id']= 1;
    $_SESSION['token']= bin2hex(random_bytes(32));




?>
</body>
</html>