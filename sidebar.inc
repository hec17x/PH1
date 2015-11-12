	<sidebar>

	 <div id="sideBg">

	 	<div id="sideCont">
	 	<div id="latBg"></div>
	 	<div id="lat">
	 	<?php echo "<a href='perfil.php?user=".$_GET['user']."'>"; ?>	<div id="avatar_up">
	 		<img id="avatar" src="images/avatar.jpg" >
	 		<?php
	 			echo "<h2>".$_GET['user']."</h2>";
	 		?>
	 		</div>

	 		<?php echo "</a>"; ?>
        <ul>
        	<?php
             	echo "<li><a href='datos.php?user=".$_GET['user']."'>Datos</a></li>";?>
            <li><a href="#">Álbumes</a></li>
            <?php
           	echo "<li><a href='nuevoAlbum.php?user=".$_GET['user']."'>Crear álbum</a></li>";?>
            <li><a href="#">Añadir foto</a></li>
             <li><a href="index.php">Salir</a></li>
        </ul>
    	</div>
    </div>
	</div>
    

</sidebar>