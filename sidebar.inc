	<sidebar>

	 <div id="sideBg">

	 	<div id="sideCont">
	 	<div id="latBg"></div>
	 	<div id="lat">
	
	 	<a href='perfil.php'>
	 		<div id="avatar_up">
	 		<img id="avatar" src="images/avatar.jpg" >
	 		<?php
	 			echo "<h2>".$_COOKIE["user"]."</h2>";
	 		?>
	 		</div>

	 		<?php echo "</a>"; ?>
        <ul>
        	
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