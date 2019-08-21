<?php

/**require('templates/coneccion.php');

if (isset($_REQUEST['enviado']) && ($_REQUEST['enviado'] == "si")) {
    $original = $_REQUEST['nombre'];
    $coordinates = explode(',', $original);
    $filename = str_replace('-','m',$original);
    // /*
    exec("gmt grdview " . $_FILES['adjunto']['tmp_name'] . " " . $_REQUEST["-Wc"] . " -B1a2 -BWSneZ+b+tBatimetrico -JM-57/-38/7i " . $_REQUEST["tipoImagen"] . " -JZ4i -P -p170/20 -Cmagma.cpt > '$filename'.ps");
    exec("gmt psconvert -Tf -Z -A4 -E720 '$filename'.ps");
    exec("mv '$filename'.pdf batimetrias/");
    exec("rm '$filename'.ps");
    exec("rm gmt.history");
    $sql = mysqli_query($db, "  INSERT INTO batimetrias (W, S, E, N, nombre) 
                                VALUES (" . $coordinates[0] . ",
                                    " . $coordinates[1] . ", 
                                    " . $coordinates[2] . ", 
                                    " . $coordinates[3] . ", '$filename');");
    header("Content-type: application/octet-stream");
    header("Content-disposition: attachment; filename=batimetria.pdf");
    readfile("batimetrias/$filename.pdf");
} else
*/?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sociedad de Fomento</title>
        <script src="./jquery/jquery.min.js"></script>
        <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="./bootstrap/js/bootstrap.min.js"></script>
    </head>
<body>
    <main>
        <div class="container">
            <form method="post" name="archivo" enctype="multipart/form-data" action="subida-db.php">
                


                <h1> Sociedad de Fomento </h1>
                <h4> Reporte de problemas </h4>

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
                <input type="hidden" name="enviado" value="si"/>
                <p>


                <input  id="longitud" name="longitud" value="0" /> 
                <input id="latitud" name="latitud" value="0" /> 





            </form>
        </div>
    </main>
    <script>
        function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
        }

        function showPosition(position) {
        $("#longitud").val(position.coords.longitude);
        $("#latitud").val( position.coords.latitude);
        console.log();
        }
        
        getLocation();


    </script>
    </body>
</html>
