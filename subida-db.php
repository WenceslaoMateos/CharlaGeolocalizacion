<?php
    $nombre = $_REQUEST['nombre'];
    $apellido= $_REQUEST['apellido'];
    $descripcion= $_REQUEST['descripcion'];
    $longitud = $_REQUEST['longitud'];
    $latitud = $_REQUEST['latitud'];
    $filename = $_FILES['adjunto']['tmp_name'];

    $newFileName = $nombre . $apellido;
    exec("mv '$filename' fotos/$newFileName");
    require('coneccion.php');
    $query = "  INSERT INTO sociedad (foto, posicion, nombre, apellido, descripcion) 
                VALUES ('$newFileName', ST_GeomFromText('POINT($longitud $latitud)', 4326), '$nombre', '$apellido', '$descripcion');";
    echo $query;
    mysqli_query($db, $query);
