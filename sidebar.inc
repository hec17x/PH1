	<sidebar>

	 <div id="sideBg">

	 	<div id="sideCont">
	 	<div id="latBg"></div>
	 	<div id="lat">
	
	 	<a href='perfil.php'>
	 		<div id="avatar_up">
	 		<img id="avatar" src="images/avatar.jpg" >
	 		<?php

	 		if (isset($_COOKIE['user'])) 
	 		{
	 			echo "<h2>".$_COOKIE["user"]."</h2>";
	 		}
	 		else
	 		{
	 			echo "<h2>". $_SESSION['user']."</h2>";
	 		}
	 			
	 		?>
	 		</div>

	 		</a>
        <ul>
        	<li><a href='index.php'>Inicio</a></li>
            <li><a href='datos.php'>Datos</a></li>
            <li><a href="#">Álbumes</a></li>
            <?php
           	echo "<li><a href='nuevoAlbum.php'>Crear álbum</a></li>";?>
            <li><a href="#">Añadir foto</a></li>
           
             <li><a href='sesionFin.php'>Salir</a></li>
			
        </ul>
    	</div>
    </div>
	</div>
    

</sidebar>