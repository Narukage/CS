<?php
session_start();
?>
<!DOCTYPE html>

<?php include("head.php"); ?>

<body>
<br>

<?php include("header.php"); ?>
    
<?php 
        
        $mysqli = @new mysqli('localhost', 'Pepe', 'pepe', 'pibd');

        if($mysqli->connect_errno) {
            echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
            echo '</p>';
            exit;
        }

        $cantidad = 'SELECT count(*) as numero from fotos WHERE Album="' .$_GET['idAlbum']. '"';

        $sentenciaAlbum = 'SELECT Titulo FROM albumes where IdAlbum="' . $_GET['idAlbum'] . '"';
        $sentenciaFoto = 'SELECT Titulo, Fecha, Pais, IdFoto, Fichero, Descripcion, Miniatura  FROM fotos where Album="' . $_GET['idAlbum'] . '"';

        if(!($resultadocantidad=$mysqli->query($cantidad))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: ". $mysqli->error;
            echo "</p>";
            exit;
        }

        $cuantos = mysqli_fetch_assoc($resultadocantidad);
        $total = $cuantos['numero'];
        $tupla = 3;

        $npag=$total/$tupla;
        if(($total%$tupla)>0){
            $npag++;
        }

        if(isset($_GET['pag'])){
            $pag=$_GET['pag'];
        }
        else{
            $pag=1;
        }
        if($npag>1){
            $sentenciaFoto=$sentenciaFoto."LIMIT " . ($pag-1)*$tupla . " ,".$tupla;
        }

        if(!($resultadoAlbum = $mysqli->query($sentenciaAlbum))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: ". $mysqli->error;
            echo "</p>";
            exit;
        }
    
        $titAlbum = mysqli_fetch_assoc($resultadoAlbum);
        
        echo 
       " <h2>" . $titAlbum['Titulo'] . "<br></h2>

        <section class='principales'>";
    
        if(!($resultadoFoto = $mysqli->query($sentenciaFoto))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentenciaFoto</b>: ". $mysqli->error;
            echo "</p>";
            exit;
        }
    



        while($dataF = $resultadoFoto->fetch_assoc()) {
            
            $sentenciaPais = 'SELECT NomPais FROM paises WHERE IdPais="' . $dataF['Pais'] . '"';
            if(!($resultadoPais = $mysqli->query($sentenciaPais))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: ". $mysqli->error;
            echo "</p>";
            exit;
            }
            $nombreP = mysqli_fetch_assoc($resultadoPais);
            
            echo "<a href='fotodetalle.php?id=" . $dataF['IdFoto'] . "'><img  src='" . $dataF['Miniatura'] . "' alt='" . $dataF['Descripcion'] . "'></a>
            <br><br><br>";
            echo "<p><b>Title:</b> " . $dataF['Titulo'] . "<br>";
            echo "<b>Date:</b> " . $dataF['Fecha'] . "<br>";
            echo "<b>Country:</b> " . $nombreP['NomPais'] . "<br><br><br>";

            }

        if($pag>1){

            echo "<a href='veralbum.php?idAlbum=". $_GET['idAlbum'] . "&pag=" . ($pag-1) ."'>Go back</a> // ";

        }

        echo "Page " . $pag;

        if($pag<$npag){

            echo " // <a href='veralbum.php?idAlbum=". $_GET['idAlbum'] . "&pag=" . ($pag+1) ."'>Go ahead</a>";

        }

        echo "</p></section>";
        
        

    ?>
    
</body>

<br><br><br>
    
<?php include("footer.php"); ?>

</html>