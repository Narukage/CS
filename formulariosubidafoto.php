<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<?php include("head.php"); ?>

<body>
<br>
<?php include("header.php"); ?>

<h3>Upload a new photo!</h3>

<?php 
	if (isset($_POST['titulo'])) {
		$titulo =  $_POST['titulo'];
	}
	if (isset($_POST['fecha'])) {
		$fecha =  $_POST['fecha'];
	}
	if (isset($_POST['pais'])) {
		$pais =  $_POST['pais'];
	}
	if (isset($_POST['album'])) {
		$album =  $_POST['album'];
	}
	if (isset($_POST['descripcion'])) {
		$descripcion =  $_POST['descripcion'];
	}
		
	$fechareg = date("Y-m-d");

	$insertado = false;
		$sql = "INSERT INTO fotos (Titulo, Descripcion, Fecha, Pais, Album, FRegistro)
			VALUES ('".$titulo."', '".$descripcion."', '".$fecha."', '".$pais."', '".$album."', '".$fechareg."')";

	
		include 'utilidades.php';
		$insertado = Utilidades::ejecutaInsert($sql);	

	if($insertado==true){
		echo "<p class='principales'>Your photo was uploaded successfully! Go to your albums to see it :D</p><br>
		<section class='principales'><form action='misalbumes.php'><button>My albums</button></form></section>
		";
	}
	else{
		echo "<p class='principales'>Ooops, something was wrong! Go back to try again.</p><br>
		<section class='principales'><form action='subirfoto.php'><button>Go back</button></form></section>
		";
	}

?>



</body>

<br><br><br>


<?php include("footer.php"); ?>


</html>