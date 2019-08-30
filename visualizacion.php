<?php
require('coneccion.php');

$sql = mysqli_query($db, 'SELECT foto, ST_X(posicion) as lat, ST_Y(posicion) as lon, nombre, apellido, descripcion FROM sociedad');
$i = 0;
$resultado = '[';
if ($sql) {
    while ($row = mysqli_fetch_array($sql)) {
        if ($i != 0)
            $resultado .= ',';
        $i++;
        $resultado .= '
        {
            "foto":"' . $row['foto'] . '",
            "lat":' . $row['lat'] . ',
            "lon":' . $row['lon'] . ',
            "nombre":"' . $row['nombre'] . '",
            "apellido":"' . $row['apellido'] . '",
            "descripcion":"' . $row['descripcion'] . '"
        }';
    }
}
$resultado .= "]";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualizacion</title>
    <script src="./jquery/jquery.min.js"></script>
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./polyfill/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
    <script src="ol/ol.js"></script>
    <link rel="stylesheet" href="ol/ol.css" type="text/css">
    <link rel="stylesheet" href="css/popup.css">
    <link rel="stylesheet" href="css/style.css">    
</head>
<body>
    <h1 class="titulo"> Reclamo sociedad de fomento </h1>


    <div class="col-md-6">
        <div class="datos"> 
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
                             
        <p> Imagen: </p>
        <img >
            

        </div>
    </div>
    
    <div class="col-md-6">
        <div class="mapa" id="map"></div>  
    </div>

    <div id="popup" class="ol-popup bg-secondary" style="display: none;">
        <a href="#" id="popup-closer" class="ol-popup-closer"></a>
        <div id="popup-content" class="text-white"></div>
    </div>

    <script src="./js/mapasOpenmaps.js">
        /*Mapas de openmaps*/
    </script>
    <script>
        var datos = <?php echo $resultado; ?>;
    </script>
    <script src="./js/visualizacion.js"></script>
</body>
</html>