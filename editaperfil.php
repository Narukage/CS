<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">



<?php include("head.php"); ?>

<body>
<br>

<?php include("header.php"); 
    $sql = "SELECT * FROM usuario WHERE NomUsuario = '".$_SESSION['uname']."'";
    include ('utilidades.php');

    $resultado = Utilidades::datosUsuario($sql);



?>


<section class="principales"> 
    
    <form method="POST" action="formeditaperfil.php" enctype="multipart/form-data">

    <br><br>
     <label class="en-linea">Nombre de usuario:</label>
     <input class="input-registro" type="text" name="nick" 
     value = <?php echo $resultado['NomUsuario'];?>>
     <br><br>
     <label class="en-linea">Email:</label>
     <input class="input-registro" type="text" name="Mail"
     value = <?php echo $resultado['Email'];?>>
     <br><br>
     <label class="en-linea">Nueva contraseña:</label>
     <input class="input-registro" type="password" name="Contrasenya" title="">
     <br><br>
     <label class="en-linea">Repetir nueva contraseña:</label>
     <input class="input-registro" type="password" name="Contrasenya2">
     <br><br>
     <label>Género:</label>
     <input class="altinput" type="radio" name="Genero" value="fem" 
     <?php if($resultado['Sexo']=='0') echo ' checked'; ?>>
     <label for="genero1">Mujer</label>
     <input class="altinput" type="radio" name="Genero" value="masc"
     <?php if($resultado['Sexo']=='1') echo ' checked'; ?>>
     <label for="genero2">Hombre</label>
     <input class="altinput" type="radio" name="Genero" value="otro"
     <?php if($resultado['Sexo']=='2') echo ' checked'; ?>>
     <label for="genero3">Otros</label>
     <br><br><br>
     <label>Fecha de nacimiento: </label>
     <input class="input-registro" type="date" name="fechaNac"
     value = <?php echo $resultado['FNacimiento'];?>>
     <br><br>
       <label>Pais: </label>
    
<select name="pais">
     <?php 
          $arraypaises = Utilidades::obtenerPaises();
          $seleccionado = "";
          foreach ($arraypaises as $idpais => $nompais) {
                if($resultado['Pais']==$idpais)
                    $seleccionado = "selected";
                echo '<option value="'.$idpais.'" '.$seleccionado.'>'.$nompais.'</option>';
          }
     ?>
</select>
<br><br>   
     <label>Ciudad:</label>
     <input class="input-registro" type="text" name="ciudad" value = <?php echo $resultado['Ciudad'];?>><br><br>
     <label>Selecciona una foto de perfil:</label>
     <input type="file" name="imagen" class="input-registro" accept="image/gif, image/jpeg, image/png">
        
    <br><br><br>
    <button type="submit">Actualiza mi perfil</button></form>
    
    </section>  
</body>

<br><br><br>

<?php include("footer.php"); ?>

</html>