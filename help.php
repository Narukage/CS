<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<?php include("head.php"); ?>

<body>
<br>

<?php include("header.php"); ?>

<h2>¿Cómo lo hacemos?</h2>
<div id="imagen">
	<img src="https://i.imgur.com/4gB4rqD.png">
</div>
<article>
<p>
1. En el momento de la subida, se le aplica al archivo el algoritmo AES, el cual
nos devuelve una clave de 128 bits de longitud que utilizaremos en un futuro
para desencriptar el archivo.
</p>
<br>
<p>
2. Almacenamos la clave, habiéndola codificado en RSA previamente, en la
base de datos. Decidimos utilizar una única clave privada y encriptarla con
RSA, puesto que la clave tiene poca longitud.
</p>
<br>
<p>
3. El usuario recibe el archivo cifrado en la carpeta contenedora que elija
dentro de su directorio de Google Drive.
</p>
</article>

<h2>Contacta con nosotras</h2>

<h3 class = "contactus"> Sara Vilaplana Rúa </h3>
<p>Email: saravrua95@gmail.com</p>

<br>

<h3 class = "contactus"> Yolanda Cruz Girona </h3>
<p>Email: yolanda.cswag@gmail.com</p>

<br>

<h3 class = "contactus"> María Sanchez Tenías </h3>
<p>Email: mhxer00@gmail.com</p>
<br><br><br>

<?php include("footer.php"); ?>

</html>
