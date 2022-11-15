<?php 
include("conexion.php");
$id = $_POST['id'];
$sql = "DELETE FROM noticia WHERE id = $id";
$query = $con->prepare($sql);
$query->execute();

header("location: crud.php");