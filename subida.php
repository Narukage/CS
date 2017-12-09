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
		echo "<section type='principal'><p>Ooops, algo ha ido mal durante la subida. Prueba otra vez.</p><br>
			<form action='insertararchivo.php'><button type='submit'>Inténtalo de nuevo</button></section>";
	}
	else{
		if(@move_uploaded_file($_FILES["imagen"]["tmp_name"], 'C:\Users\Naru\Desktop' . $_FILES["imagen"]["name"])){

		$mysqli = @new mysqli('localhost', 'Pepe', 'pepe', 'pibd');

        if($mysqli->connect_errno) {
            echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
            echo '</p>';
            exit;
        }

        $ruta= 'C:\Users\Naru\Desktop' . $_FILES["imagen"]["name"];
		$insertado = false;


		//include ('portada.php');
        //Portada::createThumbnail($_FILES["imagen"]["name"], 150, 120, "files/fotos/", "tinythumb_");

		$fechareg = date("Y-m-d");
		$sql = "INSERT INTO fotos (Titulo, Descripcion, Fecha, Pais, Album, Fichero, Fregistro, Miniatura)
					VALUES ('".$_POST['titulo']."', '".$_POST['descripcion']."', '".$_POST['fecha']."', '".$_POST['pais']."', '".$_POST['album']."', '".$ruta."', '".$fechareg."', 'files/fotos/tinythumb_".$_FILES['imagen']['name']."')";


				include 'utilidades.php';
				$insertado = Utilidades::ejecutaInsert($sql);

        /*if(isset($_POST['portada'])){
        	if($_POST['portada']=='setportada'){


        		Portada::createThumbnail($_FILES["imagen"]["name"], 150, 120, "files/fotos/", "tinythumb_");


				$sql = "UPDATE albumes SET Portada = 'files/fotos/tinythumb_".$_FILES['imagen']['name']."' WHERE IdAlbum='" . $_POST['album']. "'";

				$insertado = Utilidades::ejecutaUpdate($sql);

        	}
        }*/

			echo "<p>Archivo subido correctamente</p><br>
			<form action='misalbumes.php'><button type='submit'>Go to your albums</button></form><form action='subirfoto.php'><button type='submit'>Upload another photo</button></form>";
		}
		else{
				echo "<section type='principal'><p>No hemos podido guardar tu foto. Vuelve a intentarlo.</p><br>
			<form action='subirfoto.php'><button type='submit'>Upload a photo</button></section>";
		}
	}

?>

</body>


<?php include("footer.php"); ?>

</html>
