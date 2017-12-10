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

    <form action="insertararchivo.php" method="post" enctype="multipart/form-data">
      <?php
				if ($_FILES["imagen"]["error"] != 0)
				  {
					 echo "Error de archivo<br />";
				  }


          $dir_subida = '/var/www/html/cs/tmp/';
          $fichero_subido = $dir_subida . basename($_FILES['imagen']['name']);

          if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido)) {
              echo "<h2>¡Archivo subido con éxito!</h2>";
          } else {
            echo "<section type='principal'><p>Ooops, algo ha ido mal durante la subida. Prueba otra vez.</p><br>
              <form action='insertararchivo.php'><button type='submit'>Inténtalo de nuevo</button></section>";
          }


            $nombre = $_FILES['imagen']['name'];
					  /*$clave = randomString(32);
					  $encriptado = encriptar_AES($texto, $clave);
					  //$desencriptado = desencriptar_AES($encriptado, $clave);*/

            include('aes.php');

          //  $ruta = "C:\Users\Naru\Desktop";

            $crypt = new aes_encryption();

            $clave = $crypt->key = $crypt->rand_key(); //CLAVE AES PRIVADA

            //$clave = randomString(32);
            $crypt->iv = $crypt->rand_iv();

            $file = $fichero_subido;

            $fileenc=$crypt->encrypt_file($file, $file.'.enc'); //ESTE ES EL ARCHIVO CIFRADO CON AES

          //echo $resultado;


            //$crypt->decrypt_file($file.'.enc', $file);

				/*function randomString($length){
						$rand = '';
						$salt = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890\\';

				  for ($i = 0; $i < $length; $i++) {
						//Loop hasta que el string aleatorio contenga la longitud ingresada.
						$num = rand() % strlen($salt);
						$tmp = substr($salt, $num, 1);
						$rand = $rand . $tmp;
					}
					//Retorno del string aleatorio.
					return $rand;
				}

					/*function encriptar_AES($texto, $clave){

					  //Abre el módulo del algoritmo y el metodo de cifrado
					 $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
					 //Crea los ivs(vectores de inicializacion) del tamanio del td(128 bits) usando valores aleatorios
					 $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_DEV_URANDOM );
					 //Inicializa todos los buffers requeridos para el cifrado
					 mcrypt_generic_init($td, $clave, $iv);
					 //Genera el mensaje encriptado
					 $encrypted_data_bin = mcrypt_generic($td, $texto);
					 //Deinicializa el módulo de cifrado td
					 mcrypt_generic_deinit($td);
					 //Cierra el módulo mcrypt
					 mcrypt_module_close($td);
					 //bin2hex convierte datos binarios en su representación hexadecimal
					 $encrypted_data_hex = bin2hex($iv).bin2hex($encrypted_data_bin);

					 return $encrypted_data_hex;
					}

					function desencriptar_AES($encrypted_data_hex, $clave){

					 $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
					 $iv_size_hex = mcrypt_enc_get_iv_size($td)*2;
					 $iv = pack("H*", substr($encrypted_data_hex, 0, $iv_size_hex));
					 $encrypted_data_bin = pack("H*", substr($encrypted_data_hex, $iv_size_hex));
					 mcrypt_generic_init($td, $clave, $iv);
					 $decrypted = mdecrypt_generic($td, $encrypted_data_bin);
					 mcrypt_generic_deinit($td);
					 mcrypt_module_close($td);

					 return $decrypted;
         }*/
				  ?>


			<?php

			// RSA
			$config = array(
			    "digest_alg" => "sha512",
			    "private_key_bits" => 4096,
			    "private_key_type" => OPENSSL_KEYTYPE_RSA,
			);
			//Get key pair
			$res=openssl_pkey_new($config);
			// Get private key
			openssl_pkey_export($res, $privatekey);
			//Get public key
			$publickey=openssl_pkey_get_details($res);
			$publickey=$publickey["key"];

			openssl_public_encrypt($clave, $crypttext, $publickey); //ESTA ES LA CLAVE AES CIFRADA CON RSA

			openssl_private_decrypt($crypttext, $decrypted, $privatekey);

      $usuario = $_SESSION["uname"];

      $claveRSA = fopen("data/rsa".$usuario.$_FILES["imagen"]["name"].".txt", "w")
				or die("Unable to open file!"); //ARCHIVO .TXT QUE CONTIENE LA CLAVE AES CIFRADA CON RSA
      fwrite($claveRSA, $publickey);
			fwrite($claveRSA, "\n");
			fwrite($claveRSA, $privatekey);
      fclose($claveRSA);

			$crypttext = sanear_string($crypttext);
			$publickey = sanear_string($publickey);

			function sanear_string($string) {
				$string = trim($string);

				$string = str_replace(
					array('\\', '"', '\'', ')', '(', '=', ';'),
					array('/', '&', '&', '&', '&', '&', '&'),
					$string
				);
				return $string;
			}


			$mysqli = @new mysqli('localhost', 'Pepe', 'pepe', 'pibd');

			if($mysqli->connect_errno) {
				echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
				echo '</p>';
				exit;
			}

			$sentencia = "SELECT * FROM usuario WHERE usuario.NomUsuario='".$usuario."'";

			$resultado = mysqli_query($mysqli,$sentencia);
			$fila=mysqli_fetch_assoc($resultado);


			$insercion = "INSERT INTO subida (Nombre, PublicRSA, AESEncryptedKey, IdUsuario) VALUES ('".$nombre."', '".$publickey."',
			 '".$crypttext."','".$fila["IdUsuario"]."')";



				if(!($mysqli->query($insercion))) {
					echo "<p>Error al ejecutar la sentencia <b>$insercion</b>: ". $mysqli->error."\n";
					echo "<br>";
					echo "<br>";
					echo "No se ha podido insertar el archivo en la base de datos";
					echo "<br>";
					echo "<br>";
					echo "<form action='insertararchivo.php'><button type='submit'>Inténtalo de nuevo</button></section>";
					echo "</p>";
					exit;
				}

			?>

			<?php

		if($_FILES['imagen']["error"]){
			echo "<section type='principal'><p>Ooops, algo ha ido mal durante la subida. Prueba otra vez.</p><br>
				<form action='insertararchivo.php'><button type='submit'>Inténtalo de nuevo</button></section>";
		}
		else{
?>



    <!-- <br><br>
    <h3>Datos de la subida </h3><br>
    <p> <b>Nombre del archivo:</b> <?php echo $nombre; ?> </p>
	<p> <b> Clave privada: </b><?php echo $clave;?> </p>
	<p> <b> Archivo encriptado:</b></p>
	<p> <b> Clave privada RSA: </b><?php echo $privatekey;   ?> </p>
	<p> <b> Clave pública RSA: </b> <?php echo $publickey; ?> </p>
	<p> <b> Clave privada AES encriptada: </b> <?php echo $crypttext;  ?> </p> -->


    <!-- <br><br>
    <br><br><br> -->


        <button type="submit">Subir otro archivo</button></form>
    </form>
	<br>
	<?php
		}
		?>
		<br>
	<form action='menuperfil.php'><button type='submit'>Volver a mi perfil</button></form>
    </section>
</body>

<br><br><br>

<?php include("footer.php"); ?>

</html>
