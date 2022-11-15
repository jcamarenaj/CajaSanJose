<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/cabecera.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">

</head>
<body>
<form action="crud.php" method="POST">
   <h1 class="animate__animated animate__backInLeft">login</h1>

  <div class="container">
  <div class="form-group ">
    <label for="usuario" class="col-sm-2 col-form-label">Usuario</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control" id="usuario" name="usuario" >
    </div>
  </div>
  <div class="form-group ">
    <label for="pass" class="col-sm-2 col-form-label">Contraseña</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
    </div>
  </div>
  <input type="submit" value="Ingresar">
  </div>
</form>
</body>
<?php 
if($_POST){
  session_start();
  require("conexion.php");
  $usuario = $_POST['usuario'];
  $pass = $_POST['pass'];
  $query = "SELECT * FROM usuarios WHERE usuario = :usuario AND contraseña = :pass";
  $query = $con->prepare($query); 
  $query->bindParam(":usuario",$usuario);
  $query->bindParam(":pass",$pass);
  $query->execute();
  $logeo = $query->fetchAll(PDO::FETCH_OBJ);
  if($logeo){
      header("location: crud.php");
  }else{
      echo "Datos incorrectos";
  }
}




?>



</html>