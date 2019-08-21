<?php
    require('coneccion.php');
    $longitud = $_REQUEST['longitud'];
    $latitud = $_REQUEST['latitud'];
    $newFileName = $_REQUEST['nombre'].$_REQUEST['apellido'];
    $filename = $_FILES['adjunto']['tmp_name'];
    exec("mv '$filename' fotos/$newFileName");
    $sql = mysqli_query($db, "  INSERT INTO sociedad (foto, posicion) 
                                VALUES ($newFileName, ST_GeomFromText('POINT($longitud $latitud)'));");
