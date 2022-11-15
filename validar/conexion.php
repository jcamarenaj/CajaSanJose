
<?php    
    $usuario = 'root';
    $password = '';
    
    try {
        $con = new PDO('mysql:host=localhost;dbname=noticias', $usuario, $password);

    } catch (PDOException $e) {
        print($e->getMessage());
    }

?>
