<<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Básico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>


<body>
    <div class="container-lg align-items-start">
      <!--Para enviar los datos de un formulario hay que definir el modo de envío, get mete las variables 
      en la url, post las lleva invisibles, con action marcamos la página destino de los datos-->
        <form method= "get" action="repuesta_simple.php" >

            <div class="mb-3 mt-4 col-sm-5">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="Ayuda de email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3 col-sm-5">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="checkrecuerdame" name="checkrecuerdame">
                <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
            </div>

            <div class="mb-3">
                <label class="form-check-label" for="edad">Edad</label>
                <select class="form-select" aria-label="Default select example" id="edad" name="edad">
                    <option selected>Open this select menu</option>
                    <?php
                    //Realizo un bucle php que vaya la i desde 1 a 120
                    //En cada repetición escribirá un value para rellenar
                    //Las edades del select
                    for ($i = 1; $i <= 120; $i++) {
                        print "<option value =$i>$i</option>";
                    }
                    ?>
                </select>
            </div>

            <label class="form-check-label" for="sexo">Sexo:</label>
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="masculino" id="sexo">
                <label class="form-check-label" for="masculino">
                    Masculino
                </label>
            </div>

            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="femenino" id="sexo" checked>
                <label class="form-check-label" for="femenino">
                    Femenino
                </label>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Imagen de Perfil</label>
                <input class="form-control" type="file" id="imagen" name="imagen">
            </div>

            <div class="mb-3">
                <label for="exampleColorInput" class="form-label">Color de fondo</label>
                <input type="color" class="form-control form-control-color" id="color" value="#11ff11" title="Choose your color">
            </div>

            <div class="mb-3 col-sm-6">
                <label for="exampleFormControlTextarea1" class="form-label">Observaciones</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>


</html>

