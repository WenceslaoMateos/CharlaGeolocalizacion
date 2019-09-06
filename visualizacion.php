<?php
require('coneccion.php');
/**
 * Genera el objeto correspondiente para su muestra en el mapa.
 */
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
    <h1 class="titulo"> Mapa de visualizacion</h1>

    <div class="subtitulo"> Reclamos en la Sociedad de Fomento </div>

    <div class="mapa" id="map"></div>


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