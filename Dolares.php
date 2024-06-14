<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOLARES ARRIBA DE 1000</title>
    <link rel="stylesheet" href="estilo2.css">
</head>
<body>
    <h1>¿Como ves la suba del dolar?</h1>
<div class="caja">
    <form name="base" method="post" action="Dolares.php">
        <br>
        <input class="animado1" type="text" name="nombre" placeholder="Nombre Y Apellido">
        <p> 
            <BR>  <textarea class="animado2" name="texto" placeholder="!!Escribre un comentario¡¡"></textarea>

            </p>
             <input class="animado3" type="submit" name="enviar">


    </form>
</div>
<?php
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=foro-et20.','root', '');
        if(!empty($_POST)){

            $nombre=$_POST['nombre'];
            $texto = $_POST['texto'];
            $fecha= date('Y-m-d');
       
        $conexion->query("INSERT INTO `dolares` (`ID`, `nombre`, `comentario`, `fecha`) VALUES (NULL, '$nombre', '$texto', '$fecha');");
         }

        $busca = $conexion->query("SELECT * FROM `dolares`");   
        echo '<div class="datos">';
        echo '<H3>CAJA DE COMENTARIOS</H3>';
        foreach($busca as $imagen)
        {
            echo '<img src="foto.avif">'."<p>".$imagen['nombre']."";
            echo "<br>"."".$imagen['comentario'].""."</br>";
            echo "<br>"."".$imagen['fecha']."</p>"."</br>";
        }
        echo '</div>';

        echo '<H2>FIN DEL FORO</H2>';
    
    } catch (PDOException $e) {
        echo 'Falló la conexión: ' . $e->getMessage();     

        
    }

?>
</body>
</html>