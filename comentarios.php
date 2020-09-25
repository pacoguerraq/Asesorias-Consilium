<?php

$conn = mysqli_connect('localhost', 'asesor14_q', 'Consilium.01', 'asesor14_datos');

if (mysqli_connect_errno($conn)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

date_default_timezone_set('America/Monterrey');

$nombre = $_POST['nombre'];
$hora = date('h:i a, d/m/y');
$asesor = $_POST['asesor'];
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$year = $_POST['year'];
$comentario = $_POST['comentario'];
$calificacion = $_POST['calificacion'];

$sql = "INSERT INTO comentarios (nombre, hora, asesor, dia, mes, year, comentario, calificacion) VALUES ('$nombre' , '$hora', '$asesor', '$dia', '$mes', '$year', '$comentario', '$calificacion');";
mysqli_query($conn, $sql);

header("Location: res.php");

mysqli_close($link);

?>