<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<?php include("head.php"); ?>

<body>
<br>
<?php include("header.php"); ?>

    <h2>Log in!</h2>
    <section class="principales">
<form method="POST" action="acceso.php">
    <label><b>Usuario</b></label>
    <input type="text" placeholder="Usuario" name="uname" required>
    <br><br>
    <label><b>Contraseña</b></label>
    <input type="password" placeholder="Contraseña" name="psw" required>
    <br><br>
    <label><b>Recuerdame</b></label>
    <input method="post" class="altinput" type="checkbox" name="guardar" value="recuerdausu">   
    <br><br>
    <button type="submit">Entra</button>
    
</form>
        </section>

    <?php
    
        if(isset($_GET['error'])){
            
            if($_GET['error']=="si"){
                echo "<p>Ooops, el usuario o la contraseña son incorrectos. Inténtalo de nuevo.</p>";
                $error="no";
            }
        }
    ?>
    
</body>

<br><br><br>
<?php include("footer.php"); ?>

</html>