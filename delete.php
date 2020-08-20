<?php
//se incluye la configuracion para conectar la base de datos
include("config.php");

//obteniendo datos de la url
$id = $_GET['id'];

//Eliminando fila de la table
$result = mysqli_query($mysqli, "DELETE FROM users WHERE id=$id");

//Redirigir a la pagina principal
header("Location:index.php");
?>

