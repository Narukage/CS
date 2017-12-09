<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">


<?php include("head.php"); ?>
<?php include("header.php"); ?>

<body>

<?php

	if($_FILES["imagen"]["error"]){
		echo "<section type='principal'><p>Ooops, something was wrong with your photo upload. Try again.</p><br>
			<form action='subirfoto.php'><button type='submit'>Upload a photo</button></section>";
	}
	else{
		if(@move_uploaded_file($_FILES["imagen"]["tmp_name"], 'files/perfiles/' . $_FILES["imagen"]["name"])){

		$mysqli = @new mysqli('localhost', 'Pepe', 'pepe', 'pibd');

        if($mysqli->connect_errno) {
            echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
            echo '</p>';
            exit;
        }
        
        $ruta= 'files/perfiles/' . $_FILES["imagen"]["name"];
		$insertado = false;
		
		$sql = "INSERT INTO usuario (Foto) VALUES ('".$ruta."')";

			
				include 'utilidades.php';
				$insertado = Utilidades::ejecutaInsert($sql);	
		       
        

			echo "<p>Photo uploaded successfully! Go see it right now :D</p><br>
			<form action='misalbumes.php'><button type='submit'>Go to your albums</button></form><form action='subirfoto.php'><button type='submit'>Upload another photo</button></form>";
		}
		else{
				echo "<section type='principal'><p>We couldn't save your photo. Try again.</p><br>
			<form action='subirfoto.php'><button type='submit'>Upload a photo</button></section>";
		}
	}

?>
    
</body>


<?php include("footer.php"); ?>

</html>