<?php
session_start();
?>
<!DOCTYPE html>
<html>
<?php


$usuario = $_POST['uname'];
$contrasenya = md5($_POST['psw']);
    
$mysqli = @new mysqli('localhost', 'Pepe', 'pepe', 'pibd');

if($mysqli->connect_errno) {
echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
echo '</p>';
exit;
}

$sentenciaNombre = 'SELECT IdUsuario, NomUsuario, Clave FROM usuario WHERE NomUsuario="' . $usuario . '"';

if(!($resultadoNombre = $mysqli->query($sentenciaNombre))) {
echo "<p>Error al ejecutar la sentencia <b>$sentenciaNombre</b>: ". $mysqli->error;
echo "</p>";
exit;
}

$usr = mysqli_fetch_assoc($resultadoNombre);
    
if($usr== NULL)
    {
        header("location: login.php?error=si");
    }
    
else{
    
if ($usr['NomUsuario']==$usuario && $usr['Clave']==$contrasenya){
        
        $_SESSION['uname'] = $_POST['uname'];
        setcookie('IdUsuario', $usr['IdUsuario'], time()+ 60*60*24+30);

    	if(isset($_POST['guardar']) && $_POST['guardar'] =='recuerdausu'){
            $current_visit = date("l jS \of F Y h:i:s A");
            $fecha_mostrar = "";

            if(isset($_COOKIE['last_visit']))
                $fecha_mostrar = $_COOKIE['last_visit'];
            else
                $fecha_mostrar = $current_visit;

            setcookie('last_visit', $current_visit, time() + 60*60*24*30);
            setcookie('fecha_mostrar', $fecha_mostrar, time() + 60*60*24);
    		setcookie('nombre', $usuario, time()+ 60*60*24*30);
            setcookie('contr', $contrasenya, time()+ 60*60*24*30); 
            
    	}
        header("location: menuperfil.php");
    }else{
    header("location: login.php?error=si");
    }
}
?>
</html>