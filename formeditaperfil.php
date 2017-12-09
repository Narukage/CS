<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">



<?php include("head.php"); ?>

<body>
<br>


<?php 
	include("header.php");
	
	$correctname = false;
	$correctmail = false;
	$correctpass = false;
	$correctsecpass = false;
	$correctgender = false;
	$correctdate = false;
	$correctequalpass = false;

	$regexnombre = '^[a-zA-Z0-9]{3,15}$';
	$regexpass = '^[a-zA-Z0-9_]{6,15}$';
	$regexpassmayus = '^.*[A-Z].*$';
	$regexpassminus = '^.*[a-z].*$';
	$regexpassnum = '^.*[0-9].*$';


	if (isset($_POST['Mail'])) {
		$mail =  $_POST['Mail'];

		if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
			$correctmail = true;
		}
	}

	if(isset($_POST['nick'])){
		$nick =  $_POST['nick'];
		$matchnick = preg_match('/'.$regexnombre.'/', $nick);
		if ($matchnick > 0) {
			$correctname = true;
		}
	}

	
	if (isset($_POST['fechaNac'])) {
		$fechanac =  $_POST['fechaNac'];
		
		if (DateTime::createFromFormat('Y-m-d', $fechanac)){
			$correctdate = true;
		}
		
	}

	if (isset($_POST['pais'])) {
		$pais =  $_POST['pais'];
	}

	if (isset($_POST['ciudad'])) {
		$ciudad =  $_POST['ciudad'];
	}

	if (isset($_POST['Genero'])) {
		$genero =  $_POST['Genero'];
		$correctgender = true;
	}

	$insertado = false;
	$ignorarPass  = false;

	if(isset($_POST['Contrasenya']) && isset($_POST['Contrasenya2'])){
		$pass =  $_POST['Contrasenya'];
		$rpass =  $_POST['Contrasenya2'];

		if($pass === "" && $pass === ""){
			$ignorarPass = true;
		}
	}
		
	if(!$ignorarPass && isset($_POST['Contrasenya']) && isset($_POST['Contrasenya2'])){
		$pass =  $_POST['Contrasenya'];
		$rpass =  $_POST['Contrasenya2'];

		echo '<label> Pass - '. $pass.'.</label><br>';
		$matchpass = preg_match('/'.$regexpass.'/', $pass);
		$matchpassmayus = preg_match('/'.$regexpassmayus.'/', $pass);
		$matchpassminus = preg_match('/'.$regexpassminus.'/', $pass);
		$matchpassnum = preg_match('/'.$regexpassnum.'/', $pass);

		if (($matchpass > 0) &&
			($matchpassmayus > 0) &&
			($matchpassminus > 0) &&
			($matchpassnum > 0)) {

			$correctpass = true;
		}	

		echo '<label> Pass2 - '. $rpass.'.</label><br>';
		$matchrpass = preg_match('/'.$regexpass.'/', $rpass);
		$matchrpassmayus = preg_match('/'.$regexpassmayus.'/', $rpass);
		$matchrpassminus = preg_match('/'.$regexpassminus.'/', $rpass);
		$matchrpassnum = preg_match('/'.$regexpassnum.'/', $rpass);

		if (($matchrpass > 0) &&
			($matchrpassmayus > 0) &&
			($matchrpassminus > 0) &&
			($matchrpassnum > 0)) {
				$correctsecpass = true;
		}

		if($correctpass && $correctsecpass){
			if (strcmp($pass, $rpass) === 0) {
				$correctequalpass = true;
			}
		}

		echo '<label> name - '. $correctname .'</label><br>';		
		echo '<label> mail - '. $correctmail .'</label><br>';
		echo '<label> pass1 - '. $correctpass .'</label><br>';
		echo '<label> pass2 - '. $correctsecpass .'</label><br>';
		echo '<label> passeq - '. $correctequalpass .'</label><br>';
		echo '<label> gender - '. $correctgender .'</label><br>';
		echo '<label> date - '. $correctdate .'</label><br>';

		if($correctname && $correctmail && ($correctpass && $correctsecpass && $correctequalpass && !$ignorarPass) && $correctgender && $correctdate){
			$cryptedpass = md5($pass);
			$sql = "UPDATE usuario 
					SET NomUsuario = '".$nick."', Email = '".$mail."', Clave = '".$cryptedpass."', Sexo = '".$genero."', FNacimiento = '".$fechanac."', Pais = '".$pais."', Ciudad = '".$ciudad."' 
					WHERE NomUsuario = '".$_SESSION['uname']."'";
			
			include ('utilidades.php');
			$insertado = Utilidades::ejecutaUpdate($sql);

		}else{
			echo '<h4>Oops, something was wrong :( </h4>';	
		}
	}else{
		//Sin contraseñas
		if($correctname && $correctmail && $correctgender && $correctdate){
			$cryptedpass = md5($pass);
			$sql = "UPDATE usuario 
					SET NomUsuario = '".$nick."', Email = '".$mail."', Sexo = '".$genero."', FNacimiento = '".$fechanac."', Pais = '".$pais."', Ciudad = '".$ciudad."' 
					WHERE NomUsuario = '".$_SESSION['uname']."'";
				
			
			include ('utilidades.php');
			$insertado = Utilidades::ejecutaUpdate($sql);


		}else{
			echo '<h4>Oops, something was wrong :< </h4>';	
		}
	}



	if(!$insertado){
		if(!$correctname)
			echo '<label> El nombre no tiene formato correcto.</label><br>';
		if(!$correctmail)
			echo '<label> El Email no tiene el formato correcto.</label><br>';
		if(!$correctgender)
			echo '<label> Debes escoger un género.</label><br>';
		if(!$correctdate)
			echo '<label> Tu fecha de nacimiento no tiene un formato correcto.</label><br>';
 		echo '<br><form action="editaperfil.php"><button type="submit">Atrás</button></form>';
    }else{
		echo '<h4>Actualizado correctamente </h4>';	
 		echo '<br><form action="menuperfil.php"><button type="submit">Ir a mi perfil</button></form>';
    }

if($_FILES["imagen"]["error"]){
		echo "<section type='principal'><p>Ooops, algo ha ido mal con la subida de la foto. Intentalo otra vez.</p><br>
			<form action='editaperfil.php'><button type='submit'>Atrás</button></section>";
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

		$sql = "UPDATE usuario SET Foto = '" .$ruta. "' WHERE NomUsuario = '".$_SESSION['uname']."'" ;	
		
		include ('utilidades.php');
		$insertado = Utilidades::ejecutaUpdate($sql);
		       
        echo "<p>Foto subida correctamente</p><br>
			<form action='misdatos.php'><button type='submit'>Ir a mi perfil</button></form><form action='editaperfil.php'><button type='submit'>Atrás</button></form>";
		}
		else{
				echo "<section type='principal'><p>No hemos podido guardar tu foto. Vuelve a intentarlo.</p><br>
			<form action='editaperfil.php'><button type='submit'>Atrás</button></section>";
		}
	}


?>


<br><br><br>

<?php include("footer.php"); ?>

</html>