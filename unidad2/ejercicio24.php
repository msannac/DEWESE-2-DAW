<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<div class="container-lg align-items-start my-auto">
        <!-- Para enviar los datos de un formulario hay que definir el modo de envio, get mete las variables
         En la url, post las lleva invisibles, con action marcamos la pagina destino de los datos -->
        
        
         <form method="POST" action="ejercicio24_respuesta.php">

            <div class="mb-3 form-check">
            <input type="range" name="rango"  min="1" max="10">
                <label class="form-check-label" for="rango">Número Selecionado</label>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="media" name="media" value=cierto>
                <label class="form-check-label" for="media">media</label>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="sucesion" name="sucesion" value=cierto>
                <label class="form-check-label" for="sucesion">Sucesión Aritmética</label>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="factorial" name="factorial" value=cierto>
                <label class="form-check-label" for="factorial">factorial</label>
            </div>

            <div class="mb-3 col-sm-6">
                <label for="texto" class="form-label">Texto a Tratar</label>
                <textarea class="form-control" id="texto" name="datos" rows="6"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>


        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>