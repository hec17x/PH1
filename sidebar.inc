	<sidebar>

	 <div id="sideBg">

	 	<div id="sideCont">
	 	<div id="latBg"></div>
	 	<div id="lat">
	
	 	<a href='perfil.php'>
	 		<div id="avatar_up">
	 		
	 		<?php
	 		 if(!($iden = mysql_connect("localhost", "root", "")))
   	 die("Error: No se pudo conectar");
  	// Selecciona la base de datos
 	 if(!mysql_select_db("p&i", $iden))
   	 die("Error: No existe la base de datos");
   	$user=$_SESSION['user'];
 	$sentencia = "SELECT NomUsuario, Foto FROM usuarios WHERE NomUsuario='$user'";
  	// Ejecuta la sentencia SQL
  	$resultado = mysql_query($sentencia, $iden);
  	if(!$resultado)
    die("Error: no se pudo realizar la consulta");
  
   while($fila = mysql_fetch_assoc($resultado))
  {
    $userOK=$fila['NomUsuario'];
    $foto=$fila['Foto'];
  }

	 		echo " <img id='avatar' src='upload/avatar/".$user."-".$foto."' >";
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
            <li><a href="albumes.php">Álbumes</a></li>
            <li><a href='nuevoAlbum.php'>Crear álbum</a></li>
            <li><a href='nuevaFoto.php'>Añadir foto</a></li>
           
             <li><a href='sesionFin.php'>Salir</a></li>
			
        </ul>
    	</div>
    </div>
	</div>
    

</sidebar>