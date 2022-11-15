<?php

include('conexion.php');

if (isset($_POST['actualizarN'])) {
    $id = trim($_POST["id"]);
    $sql = "SELECT * FROM noticia WHERE id = $id";
    $query = $con->prepare($sql);
    $query->execute();
    $res = $query->fetchAll(PDO::FETCH_OBJ);
}
if ($query->rowCount() > 0) {
    foreach ($res as $r) {
?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

            <title>Editar registro</title>
        </head>
        <body style="background-image:url(img/campusHuerta.png); 	width: 100%;
	height:100%;
	background-size: cover;">
            <div class="container">
                <h1 style="color:#fff;background-color:#a02128"class="text-center">EDITAR NOTICIA</h1>
                <form action="actualizarN.php" method="POST">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="titulo" class="text-warning bg-dark">Titulo de la noticia</label>
                                <input type="text" class="form-control" id="EditTitulo" name="titulo" value="<?php echo ($r->titulo) ?>">
                            </div>
                        </div>
                        <div class="col">

                            <div class="mb-3">
                                <label for="descripcion" class="text-warning bg-dark">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo ($r->descripcion) ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="img" class="text-warning bg-dark">imagen</label>
                                <input type="file" class="form-control" id="img" name="img" value="<?php echo ($r->imagen) ?>">
                            </div>
                        </div>
                        <div class="col">

                            <div class="mb-3">
                                <label for="estatus" class="text-warning bg-dark">Status</label>
                                <input type="text" class="form-control" id="status" name="status" value='<?php echo ($r->status) ?>'>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3 d-flex justify-content-end">
                        <form method="POST" action="actualizar.php">
                        <input type="hidden" name="id" value='<?php echo ($r->id) ?>'>
                            <button class="btn btn-success" name="actualizarN">Actualizar</button>
                        </form>
                    </div>
            </div>

            </form>
            </div>
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

        </html>
<?php }
} ?>