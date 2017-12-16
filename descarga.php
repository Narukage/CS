<?php



$cosanueva=$_POST['archivo'].".enc";
echo$cosanueva;
$file= file("/var/www/html/cs/tmp/ ");
$ruta = '/var/www/html/cs/tmp/'.$_POST['archivo'];

if(isset($_SESSION["uname"])){
	if(($fichero = @file("data/rsa".$_SESSION["uname"].$_POST["archivo"].".txt")) == false){
	   echo "<p>No se ha podido abrir el fichero de fotos seleccionadas</p>";
	 }else{
		 
	 }
}

		if (is_file($ruta))
		{
		   header('Content-Type: application/force-download');
		   header('Content-Disposition: attachment; filename='.$cosanueva);
		   header('Content-Transfer-Encoding: binary');
		   header('Content-Length: '.filesize($ruta));

		   readfile($ruta);
		}
		else
		   exit();
	   ?>
