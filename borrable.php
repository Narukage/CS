<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<?php include("head.php"); ?>

<body>
<br>
    <?php include("header.php"); ?>
    
<h2>#<?php echo $_POST['googlesearch'];
        ?></h2>


<article>
    <a href='fotodetalle.php?id=1'><img src="http://i.imgur.com/HJhhPld.jpg" alt="CosplayPerruno" style="max-width:500px;max-height:400px;"></a>
<br>
<img src="http://i.imgur.com/axHui2S.png" alt="Likes" class="likes"> <p class="en-linea">288</p>

<br>

    <a href='fotodetalle.php?id=2'><img src="http://i.imgur.com/HKQpAUC.jpg" alt="Embarazo bizarro" style="max-width:500px;max-height:300px;"></a>
<br>
<img src="http://i.imgur.com/axHui2S.png" alt="Likes" class="likes" ><p class="en-linea">99</p>
</article>


<br><br>

<h3> Related</h3>

<h4>#Random</h4>

<img src="http://de.acidcow.com/pics/20130205/cannot_explain_these_stange_pics_01.jpg" alt="Gato psicodélico" style="max-width:300px;max-height:200px;">
<img src="http://kingofwallpapers.com/random-image/random-image-005.jpg" alt="Lechuza con sombrero" style="max-width:300px;max-height:200px;">
<img src="http://i.imgur.com/LFkRLpr.png" alt="Roto2" style="max-width:300px;max-height:200px;">


</body>

<br><br><br>

<?php include("footer.php"); ?>

</html>