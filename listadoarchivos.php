<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">



<?php include("head.php"); ?>

<body>
<br>

<?php include("header.php"); ?>

    <h2>Archivos subidos</h2>
    
<section class="principales"> 
    
	  <?php
        
        $mysqli = @new mysqli('localhost', 'Pepe', 'pepe', 'pibd');

        if($mysqli->connect_errno) {
            echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
            echo '</p>';
            exit;
        }
		
        $sentencia = 'SELECT * FROM subida where IdUsuario="' . $_COOKIE['IdUsuario'] . '"';
		
        if(!($resultado = $mysqli->query($sentencia))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: ". $mysqli->error;
            echo "</p>";
            exit;
        }
        ?>

		
		<form enctype="multipart/form-data" action="descarga.php" method="POST">
    <br><br>
	
	<p><label for="portal" class="en-linea"> Archivos subidos:</label>
					 <select name="archivo" id="portal">
					 
					 <?php 	 
						while($ficherito = $resultado->fetch_assoc()) {
						echo '<option value="'.$ficherito['Nombre'].'">'.$ficherito['Nombre'].'</option>';
					}
					 ?>
					</select></p>
	
		<?php
		///	NO SE LO QUE ES
			/*$direccion='data/';
			
			if($dir=opendir($fichero_subido)){
				while($archivo=readdir($dir)){
					echo '<option>'.$archivo.'</option>';
				}
			}*/
		//FIN NO SE LO QUE ES
		?>
		
    <br><br>
    <br><br><br>
	
		<input type="submit" id="cosa" value="descarga"> <br> <br>
        
</form>
    
    </section>  
</body>

<br><br><br>

<?php include("footer.php"); ?>

</html>