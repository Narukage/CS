<?php
session_start();
?>
<!DOCTYPE html>

<?php include("head.php"); ?>

<body>
<br>

<?php include("header.php"); ?>
    
<?php 
    
    if(isset($_SESSION['uname'])){
        
        $mysqli = @new mysqli('localhost', 'Pepe', 'pepe', 'pibd');

        if($mysqli->connect_errno) {
            echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
            echo '</p>';
            exit;
        }

        // Ejecuta una sentencia SQL
        $sentencia = 'SELECT Foto FROM usuario where NomUsuario="' . $_SESSION['uname'] . '"';

        if(!($resultado = $mysqli->query($sentencia))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: ". $mysqli->error;
            echo "</p>";
            exit;
        }
        
        $usrFoto = mysqli_fetch_assoc($resultado);
        
        echo 
       " <h2>Menú de usuario <br></h2>

        <section class='principales'>
            <img  src='" . $usrFoto['Foto'] . "' alt='Profile picture' width='125' >
            <br>

        <p>
            <b>" . $_SESSION['uname'] . "</b><br>
            </p>

        <a id = 'enlacesperfil' class='hvr-grow' href='insertararchivo.php'>Sube un archivo</a>
        <a id = 'enlacesperfil' class='hvr-grow' href='misdatos.php'>Información personal</a>
        <a id = 'enlacesperfil' class='hvr-grow' href='confirmaborrar.php'>Borrar cuenta</a>
        

        </section>


        <br><br><br><br><br>";
        
    }
    
    else{
        echo "<section class='principales'><p> Necesitas estar conectado para ver el perfil. Lo sentimos</p>
        <form action='login.php'><button type='submit'>Entra</button></form>
        </section>";
    }

    ?>
    
</body>

<br><br><br>
    
<?php include("footer.php"); ?>

</html>