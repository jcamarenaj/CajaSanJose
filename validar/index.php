<?php require("conexion.php");
$sql = "SELECT * FROM noticia";
$query = $con->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Menu De Navegacion Con Listas</title> 
		<link rel="stylesheet" type="text/css" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  
</head>

<body style="background-image:url(img/campusHuerta.png); 	width: 100%;
	height:100%;
	background-size: cover;">
<ul class="menu">
    <nav class="navbar navbar-dark navbar-brand">
        <div class="container-fluid">
           <li><a class="navbar-brand" href="#">Noticias</a></li>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <li><a class="nav-link active" aria-current="page" href="login.php">Administración</a></li>
                    
        </div>
    </nav>
    </ul>
    <div class="container text-white" style="width: 50%;">

        <?php
        foreach ($results as $result) {
        ?>
            <div class="noticia my-3" style="margin-bottom: 350px;">
                <div class="card my-2" style="height: 200px;">
                    <img src="img/<?php echo $result->imagen ?>" class="card-img-top" alt="..." style="  object-fit: cover;  width:100%;  height:100%;">
                    <div class="card-body border border-2 rounded-bottom ">

                        <h5 class="card-title"><?php echo ($result->titulo) ?></h5>
                        <p class="card-text"><?php echo (substr($result->descripcion, 0, 71)) . '...' ?></p>
                        <form action="notaCompleta.php" method="POST">
                            <div class="botones d-flex justify-content-end my-2 ">
                                <input type="hidden" name="id" value="<?php echo ($result->id) ?>">
                                <button type="submit" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">Leer mas</button>
                            </div>
                        </form>
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    Descripcion de la noticia
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
             } ?>
                </div>
            </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</html>