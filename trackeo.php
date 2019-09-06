<?php
require('coneccion.php');

/**
 * Se genera el objeto con los elementos de la base de datos.
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
    <h1 class="titulo"> Trackeo en tiempo real</h1>

    <div class="mapa" id="map"></div>

    <script src="./js/mapasOpenmaps.js">
        /*Mapas de openmaps*/
    </script>
    <script src="./js/track.js"></script>
</body>

</html>