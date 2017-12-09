<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">



<?php include("head.php"); ?>

<body>
<br>

<?php include("header.php"); ?>

    <h2>Sube un nuevo archivo</h2>
    
<section class="principales"> 
    
    <form action="subida.php" method="post" enctype="multipart/form-data">
                
        <?php
        
        $mysqli = @new mysqli('localhost', 'Pepe', 'pepe', 'pibd');

        if($mysqli->connect_errno) {
            echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
            echo '</p>';
            exit;
        }
        $sentencia = 'SELECT IdAlbum, Titulo FROM albumes where Usuario="' . $_COOKIE['IdUsuario'] . '"';

        if(!($resultado = $mysqli->query($sentencia))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: ". $mysqli->error;
            echo "</p>";
            exit;
        }
        
        
        while($titAlbum = $resultado->fetch_assoc()) {
            
            
        }
        
        // Libera la memoria ocupada por el resultado
        $resultado->close();
        // Cierra la conexión
        $mysqli->close();
        
        ?>

    <br><br>
    <label><b>Selecciona un archivo: </b></label>
    <input type="file" name="imagen" accept="">
    <br><br>
    <br><br><br>
        
        
        <button type="submit">Sube</button></form>
    
    </section>  
</body>

<br><br><br>

<?php include("footer.php"); ?>

</html>