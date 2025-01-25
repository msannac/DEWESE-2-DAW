<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Básico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container-lg align-items-start my-auto">
        <!-- Para enviar los datos de un formulario hay que definir el modo de envio, get mete las variables
         En la url, post las lleva invisibles, con action marcamos la pagina destino de los datos -->
        
        
         <form method="POST" action="ejemplo_tratamiento_texto.php">

            <div class="mb-3 col-sm-6">
                <label for="" class="form-label">Palabra a buscar</label>
                <input
                    type="text"
                    class="form-control"
                    name="palabra"
                    id="palabra"
                    aria-describedby="helpId"
                    placeholder="" />
                <small id="helpId" class="form-text text-muted">Introduce la palabra a buscar</small>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="diferenciaMay" name="diferenciaMay" value=cierto>
                <label class="form-check-label" for="diferenciaMay">Ignorar Mayusculas</label>
            </div>

            <div class="mb-3 col-sm-6">
                <label for="texto" class="form-label">Texto a Tratar</label>
                <textarea class="form-control" id="texto" name="texto" rows="6"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>


        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>