<?php require('conexion.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Administracion</title>
</head>

<body style="background-image:url(img/campusHuerta.png); 	width: 100%;
	height:100%;
	background-size: cover;">

    <div class="container mt-3" >
        <div class="row">
        
            <div class="col-8">
              
            <div style="color:#fff;background-color:#a02128"class="text-center"><h2> INICIO </h2></div>

               
            </div>
            <div class="col-4 pull-rigth">
                <button type="button" class="btn btn-success m-2" style="float: right;" onclick="location.href='nuevo.php'">Nuevo</button>

            </div>
        </div>

    </div>
    <div class="text-center">
        <table class="container table table-hover table-dark" style="width: 40px; left: 40px;">
            <thead>
                <tr class="table table-primary">
                  
                    <th scope="col">id</th>
                    <th scope="col">titulo</th>
                    <th scope="col">descripcion</th>
                    <th scope="col">imagen</th>
                    <th scope="col">estatus</th>
                    <th scope="col" colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
               
                <?php
                $id = 1;
                $sql = "SELECT * FROM noticia";
                $query = $con->prepare($sql);
            
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);

                if ($query->rowCount() > 0) {
                    foreach ($results as $result) {
                        echo "<tr>
                        <td>" . $id++ . "</td>
                        <td>" . $result->titulo . "</td>
                        <td>" . $result->descripcion . "</td>
                        <td>" . "<img src='img/$result->imagen' class='card-img-top' alt='...' style='  object-fit: cover;  width:100%;  height:100%;'> ". "</td>
                        
                        <td>" . $result->status . "</td>"
                ?>
                        <td>

                            <form method="POST" action="actualizar.php">
                            <input type="hidden" name="id" value="<?php  echo ($result->id)?>">
                            <button class="btn btn-warning" name="actualizarN">Editar</button>
                            </form>

                        </td>
                        <td>
                            <form onsubmit="return confirm('Realmente quiere eliminar la noticia?');" method="POST" action='eliminar.php'>
                            <input type="hidden" name="id" value="<?php  echo ($result->id)?>">
                            <button class="btn btn-danger" name="eliminarNoticia">Eliminar</button>

                            </form>
                        </td>
                <?php

                    }
                }
                ?>
            </tbody>
        </table>
    </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</html>