<?php
session_start();
?>
<!DOCTYPE html>
<html>
<?php

    
$mysqli = @new mysqli('localhost', 'Pepe', 'pepe', 'pibd');

if($mysqli->connect_errno) {
echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
echo '</p>';
exit;
}

$sentenciaId = 'SELECT IdUsuario FROM usuario WHERE NomUsuario="' . $_SESSION['uname'] . '"';
    
if(!($resultado = $mysqli->query($sentenciaId))) {
    echo "<p>Error al ejecutar la sentencia <b>$sentenciaId</b>: ". $mysqli->error;
    echo "</p>";
    exit;
        }
        
$usrid = mysqli_fetch_assoc($resultado);

$sentenciaDe = 'DELETE FROM usuario WHERE IdUsuario="' . $usrid['IdUsuario'] . '"';

if($mysqli->query($sentenciaDe) == TRUE) {

    session_destroy();
    setcookie('nombre', $usuario, time()+ -340000000000);
    setcookie('contr', $contrasenya, time()+ -34000000000); 
    setcookie('last_visit', $contrasenya, time()+ -34000000000); 
    header ("location: principal.php");
    
}

?>

</html>