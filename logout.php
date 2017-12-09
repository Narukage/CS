<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <?php

    session_destroy();
    setcookie('nombre', $usuario, time()+ -340000000000);
    setcookie('contr', $contrasenya, time()+ -34000000000);
    setcookie('last_visit', $current_visit, time()+ -34000000000);
    setcookie('fecha_mostrar', $fecha_mostrar, time()+ -34000000000);
    header ("location: index.php");

    ?>
</html>
