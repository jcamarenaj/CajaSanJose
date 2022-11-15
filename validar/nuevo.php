<?php  require("conexion.php") ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>Nuevo</title>
</head>
<?php if (isset($_POST['submit'])) {

  
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $estatus = $_POST['estatus'];

  
    $imagen = $_FILES['img']['name'];
    $img = strtolower($imagen); 
    $ruta = "img/" . $img;
    $resultado = @move_uploaded_file($_FILES['img']['tmp_name'], $ruta);
   
    if ($resultado) {
    } else {
        echo " Error de subir la imagen ";
    }
    $sql = "INSERT INTO noticia values ('','$titulo','$descripcion','$imagen','$estatus')";
    $query = $con->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    
    if ($results) {
        echo "Datos registrados correctamente";
    } else {
        echo "Error de agregar";
    }
}  ?>

<body style="background-image:url(img/campusHuerta.png); 	width: 100%;
	height:100%;
	background-size: cover;">
    <div class="container">
    <div style="color:#fff;background-color:#a02128"class="text-center"><h2> REGISTRO DE LIBROS </h2></div>
    
        <form method="POST"  enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="titulo" class="text-warning bg-dark">Titulo de la noticia</label>
                        <input type="text" class="form-control" id="titulo" name="titulo">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="descripcion" class="text-warning bg-dark">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="estatus" class="text-warning bg-dark">Estatus</label>
                        <input type="text" class="form-control" id="estatus" name="estatus">
                    </div>
                </div>
                <div class="col">

              
                    <div class="mb-3">
                        <tr>
                            <td>
                                <label for="img" class="text-warning bg-dark">Imagen</label>
                            </td>
                            <td>
                                <input type="file" class="form-control" id="img" name="img">
                            </td>
                        </tr>


                    </div>
                </div>
                <div class="mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success" name="submit">Agregar</button>
                </div>
            </div>

        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</html>