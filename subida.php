<!DOCTYPE html>
<html>
    <head>
        <title>Sociedad de Fomento</title>
        <script src="./jquery/jquery.min.js"></script>
        <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="./bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        
    </head>
<body>
    <main>
        <div class="container">
            <form method="post" name="archivo" enctype="multipart/form-data" action="subida-db.php">

                <h1 class="titulo"> Sociedad de Fomento </h1>
                <h4 class="subtitulo"> Reporte de problemas </h4>
                <div id="formu">
                <p>
                    <label>Nombre: </label>
                    <label for="nombre"></label>
                    <input type="text" name="nombre" id="nombre" />
                </p>

                <p>
                    <label>Apellido: </label>
                    <label for="apellido"></label>
                    <input type="text" name="apellido" id="apellido" />
                </p>

                <p>
                    <label> Descripcion del problema: </label>
                    <label for="descripcion"></label>
                </p>
                <p>
                    <textarea name="descripcion" id="descripcion" cols="45" rows="5"></textarea>
                </p>

                <p>
                    <div class="form-group">
                        <label for="exampleInputFile">Adjuntar imagen:</label>
                        <input name="adjunto" type="file" class="form-control-file" id="adjunto" aria-describedby="fileHelp">
                    </div>
                </p>

                <p>
                    <button type="submit" class="btn btn-primary" name="enviar" value="enviar">Enviar</button>
                    <p>

                        <input type="hidden" id="longitud" name="longitud" value="0" />
                        <input type="hidden" id="latitud" name="latitud" value="0" />
                    </p>
                </p>
            </form>
        </div>
   
    </main>
    <script>
        /**
         * Obtiene la posición actual y la enlaza con el collback correspondiente
         */
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        /**
         * Cambia los valores de los elementos del formulario con los valores actuales de la posición.
         */
        function showPosition(position) {
            $("#longitud").val(position.coords.longitude);
            $("#latitud").val(position.coords.latitude);
        }

        getLocation();
    </script>
</body>

</html>