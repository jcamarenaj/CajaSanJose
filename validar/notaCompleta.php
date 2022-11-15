<?php

require("conexion.php");

$id = $_POST['id'];
    $queryFiltro = "  SELECT *
    FROM noticia
    where
    noticia.id = $id;";
    $queryFiltro = $con->prepare($queryFiltro);
    $queryFiltro->execute();
    $nota = $queryFiltro->fetchAll(PDO::FETCH_OBJ);
    foreach ($nota as $noti){
        $titulo =  $noti->titulo;
        $descripcion =  $noti->descripcion;
        $imagen = $noti->imagen;
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <title>Nota completa</title>
</head>
<body style="background-image:url(img/campusHuerta.png); 	width: 100%;
	height:100%;
	background-size: cover;">
<nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <h1 class="navbar-brand" href="#">Noticias</h1>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <h1 class="navbar-brand" aria-current="page" href="login.php">Administración</h1>

        </div>
    </nav>
    
    <div class="container text-center mt-3 border border-2 "><div class="titulo text-center" style="justify-content: center;">
            <h1 class="text-center" ><?php  echo $titulo ?></h1>
        </div>
        <div class="btn d-flex justify-content-start">
        <a  class="btn btn-success" href="index.php" style="height: 45px; position: absolute; top: 10%; left: 1256px;">REGRESAR</a>
     
        </div>
        
        <div class="imagen "><img  class="border border-2 border-dark" src="img/<?php echo $imagen ?>" alt="imagen <?php echo $imagen ?>" style="width: 650px; height: 320px;" ></div>
        <div class="cuerpo mt-5 text-center" style="width: 2/px;">
            <p class="p-2" style="text-align: justify; display: flex; justify-content: center; width: 100%;"><?php  echo $descripcion ?></p>
        </div>
        
    </div>
</body>
</html>