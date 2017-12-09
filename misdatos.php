<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">



<?php include("head.php"); ?>

<body>
<br>

<?php include("header.php"); ?>


<section class="principales"> 
    
<?php
            
        $mysqli = @new mysqli('localhost', 'Pepe', 'pepe', 'pibd');

        if($mysqli->connect_errno) {
            echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
            echo '</p>';
            exit;
        }

       
        $sentenciaUsr = 'SELECT NomUsuario, Email, Sexo, FNacimiento, Ciudad, Pais, Foto FROM usuario WHERE IdUsuario="' . $_COOKIE['IdUsuario'] . '"';
    
        if(!($resultadoUsr = $mysqli->query($sentenciaUsr))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: ". $mysqli->error;
            echo "</p>";
            exit;
        }
    
        $dataUsr = mysqli_fetch_assoc($resultadoUsr);
    
        $sentenciaPais = 'SELECT NomPais FROM paises WHERE IdPais="' . $dataUsr['Pais'] . '"';
            
        if(!($resultadoPais = $mysqli->query($sentenciaPais))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentenciaPais</b>: ". $mysqli->error;
            echo "</p>";
            exit;
        }
        
        $nombreP = mysqli_fetch_assoc($resultadoPais);
        
        if($dataUsr['Sexo']=='1'){
            $sexo='Hombre';
        }
        else if($dataUsr['Sexo']=='0'){
            $sexo='Mujer';
        }
        else if($dataUsr['Sexo']=='2'){
            $sexo='Otros';
        }
      
        echo "<img  src='" . $dataUsr['Foto'] . "' alt='" . $dataUsr['NomUsuario'] . "'><br>"; 
        echo "<p><b>Nombre de usuario</b> " . $dataUsr['NomUsuario'] . "<br>";
        echo "<b>Género:</b> " . $sexo . "<br>";
        echo "<b>Email:</b> " . $dataUsr['Email'] . "<br>"; 
        echo "<b>Fecha de nacimiento:</b> " . $dataUsr['FNacimiento'] . "<br>"; 
        echo "<b>País:</b> " . $nombreP['NomPais'] . "<br>";
        echo "<b>Ciudad:</b> " . $dataUsr['Ciudad'] . "</p>";
        
        
    
    ?>
    
    <form action="editaperfil.php"><button type="submit">Editar perfil</button></form>
    
    </section>  
</body>

<br><br><br>

<?php include("footer.php"); ?>

</html>