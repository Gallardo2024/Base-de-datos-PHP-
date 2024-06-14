<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La inflacion por las nubes</title>
    <link rel="stylesheet" href="estilo3.css">
</head>
<body>
    <h1>¿Como ves los Precios ahora?</h1>
<div class="caja2">
<form name="base" method="post" action="Inflacion.php">
        <br>
        <p>nombre</p>
        <input class="pista" type="text" name="nombre" placeholder="Nombre Y Apellido">
        <p>comentario</p>
        <input class="pista2" type="text" name="texto" placeholder="Escribre tus Quejas">

        <input class="pista3" type="submit">

    </form>
</div>

<?php
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=foro-et20.','root', '');
        if(!empty($_POST)){

            $nombre=$_POST['nombre'];
            $texto = $_POST['texto'];
            $fecha= date('Y-m-d');
        
        $conexion->query("INSERT INTO `inflacion` (`ID`, `nombre`, `comentario`,`fecha`) VALUES (NULL, '$nombre', '$texto','$fecha' );");
         }
        $busca = $conexion->query("SELECT * FROM `inflacion`");  
        echo '<div class="ruta">';
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