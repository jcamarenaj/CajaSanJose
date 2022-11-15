<?php
include("conexion.php");

if (isset($_POST['actualizarN'])) {


$id = $_POST['id'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$estatus = $_POST['estatus'];


$imagen = $_FILES['img']['name'];
$img = strtolower($imagen); 
$ruta = "img/" . $img;
$resultado = @move_uploaded_file($_FILES['img']['tmp_name'], $ruta);


$sql = "UPDATE  noticia SET titulo = '$titulo', descripcion = '$descripcion', imagen = '$imagen', status = '$status' WHERE id = $id";
$query = $con->prepare($sql);
$query->execute();


if ($query) {
    echo "Datos registrados correctamente";
} else {
    echo "Error no se pudo agregar";
}
header("location: crud.php");
} 