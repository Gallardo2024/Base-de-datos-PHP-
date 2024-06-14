<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>temas</title>
    <link rel="stylesheet" href="estilo4.css">
</head>
<body background="debate.png" >
<?php
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=foro-et20.','root', '');
        $busca = $conexion->query("SELECT * FROM `temas`");   

        echo '<h1>TEMAS DE DEBATE</h1>';

        echo '<div class="datos2">';
        foreach($busca as $imagen)
        {
             $tema = $imagen['tema'];
             $archivo = $tema . ".php";
             echo '<li><a class="texto" href="' . $archivo . '">' . $tema . '</a></li>';
             
        }
        echo '</div>';
    
    } catch (PDOException $e) {
        echo 'Falló la conexión: ' . $e->getMessage();        
    }


?>
</body>
</html>

