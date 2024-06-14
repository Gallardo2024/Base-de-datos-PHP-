<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIBERTADORES 2024</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>¿Que opinas de que boca no clasifico?</h1>
    <div class="contenedor">
    <form name="base" method="post" action="Libertadores.php">
        <br>
       
        <input class="parte" type="text" name="nombre" placeholder="Nombre Y Apellido">
        <p>comentario</p>
        <input class="parte2" type="text" name="texto" placeholder="Escirbe tu Queja">

        <input class="parte3" type="submit">

    </form>
    </div>

    <?php
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=foro-et20.','root', '');
        if(!empty($_POST)){

            $nombre=$_POST['nombre'];
            $texto = $_POST['texto'];
            $fecha= date('Y-m-d');
        
        $conexion->query("INSERT INTO `libertadores` (`ID`, `nombre`, `comentario`,`fecha`) VALUES (NULL, '$nombre', '$texto','$fecha');");
         }     
        $busca = $conexion->query("SELECT * FROM `libertadores`");   
        echo '<div class="date2">';
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