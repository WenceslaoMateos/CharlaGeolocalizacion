<?php
$currentDir = getcwd();
$uploadDirectory = "/fotos/";
$filename = $_FILES['adjunto']['name'];
$tmpname = $_FILES['adjunto']['tmp_name'];
$uploadPath = $currentDir . $uploadDirectory . $filename;

$nombre = $_REQUEST['nombre'];
$apellido = $_REQUEST['apellido'];
$descripcion = $_REQUEST['descripcion'];
$longitud = $_REQUEST['longitud'];
$latitud = $_REQUEST['latitud'];

move_uploaded_file($tmpname, $uploadPath);

require('conexion.php');
$query = "  INSERT INTO sociedad (foto, posicion, nombre, apellido, descripcion) 
            VALUES ('$filename', ST_GeomFromText('POINT($longitud $latitud)', 4326), '$nombre', '$apellido', '$descripcion');";
mysqli_query($db, $query);
header("location: visualizacion.php");
