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


        <form method="POST" action="examen_respuesta.php">

            <div class="mb-3 form-check">
            <label class="form-check-label" for="pais">Pais </label>
                <select name="pais" id="pais">
                    <option value="spain">España</option>
                    <option value="france">Francia</option>
                    <option value="italy">Italia</option>
                </select>

            </div>

            <div class="mb-3 form-check">
            <label class="form-check-label" for="comunidad">Comunidad </label>
                <select name="comunidad" id="comunidad">
                    <option value="Andalucia">Andalucia</option>
                    <option value="Valencia">Valencia</option>
                    <option value="Estremadura">Estremadura</option>
                </select>

            </div>

            <div class="mb-3 form-check">
            <label class="form-check-label" for="tienda">Tienda</label>
                <select name="tienda" id="tienda">
                    <option value="tienda1">tienda1</option>
                    <option value="tienda2">tienda2</option>
                    <option value="tienda3">tienda3</option>
                </select>

            </div>


            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="media" name="eliminar" value=cierto>
                <label class="form-check-label" for="media">Eliminar</label>
            </div>


            <div class="mb-3 col-sm-6">
                <label for="tiendas" class="form-label">Tiendas</label>
                <textarea class="form-control" id="tiendas" name="tiendas" rows="6"></textarea>
            </div>

            
            <div class="mb-3 col-sm-6">
                <label for="plantas" class="form-label">Plantas</label>
                <textarea class="form-control" id="plantas" name="plantas" rows="6"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>


        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>