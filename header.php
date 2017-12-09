
<header>
	<a class='titulo' href='principal.php'><h1 class="en-linea"><img  id = 'logotipo' src = "https://i.imgur.com/I2OhLXt.png" >Encrypt My Drive</h1>  </a>

		<section class="cabecera">
            
            <?php 
            if(isset($_SESSION['uname'])){
                
                if(isset($_COOKIE['nombre'])){   
                
                echo "<p class='en-linea'>Bienvenid@, ". $_SESSION['uname'] . "</p><br>
                <form class='en-linea' action='logout.php'><button type='submit'>Salir</button></form><br><br>";
                
                }
                       
                else{
                
                    echo "<p class='en-linea'>Bienvenid@, ". $_SESSION['uname'] . "</p><br>
                <form class='en-linea' action='logout.php'><button type='submit'>Salir</button></form><br><br>";
                }
                
                       }
                   
            else{
                
                echo "<form class='en-linea' action='login.php'><button type='submit'>Entra</button></form> <form class='en-linea' id='registro' action='registro.php'><button type='submit'>Registrate</button></form><br><br>";
            }
                
            ?>
            

		</section>

        <br>

<hr class="separador">
    
    <?php if(isset($_SESSION['uname'])){
    
       echo "<a class = 'hvr-grow' href='index.php'>Principal   </a>  
            <a class = 'hvr-grow' href='help.php'>Ayuda   </a>
            <a class = 'hvr-grow' href='menuperfil.php'>Menú personal   </a>
            <br><br><br>";
    }
    
    else{
        
        echo "<a class = 'hvr-grow' href='index.php'>Principal    </a>  
        <a class = 'hvr-grow' href='help.php'>Ayuda   </a>
        <br><br><br>";
            
    }
    
    ?>
    
</header>
