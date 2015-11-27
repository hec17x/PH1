<?php 
session_start();
	include('cabecera.inc');
	include('sidebar.inc'); 	
  ?>
  
   <section id="content-datos">
	<div id="datos">
		<br>
		<li>Usuario:</li>
		<?php

	 		if (isset($_COOKIE['user'])) 
	 		{
	 				//capturamos usuario y lo mostramos
	 				$user = $_COOKIE['user'];
	 				echo "$user";
                    echo "<br/>";


			 		if(!($iden = mysql_connect("localhost", "root", "")))
		                die("Error: No se pudo conectar");
		              // Selecciona la base de datos
		            if(!mysql_select_db("p&i", $iden))
		                die("Error: No existe la base de datos");
		                  

		            $sentencia1 = "SELECT * FROM usuario where NomUsuario='$user'";
		            // Ejecuta la sentencia SQL
		            $resultado = mysql_query($sentencia1, $iden);
		            if(!$resultado)
		            die("Error: no se pudo realizar la consulta");
		            
		            while($fila = mysql_fetch_assoc($resultado))
		                {

		                    echo "<li><b>Nombre</b>".": ".$fila['NomUsuario']."</li>";
		                    
		                }
			 		}
	 		else
	 		{
	 			echo "<h2>". $_SESSION['user']."</h2>";
	 		}
	 			
	 		?>


	 			
	 		?>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		
		<?php
		
		?>
	</div>
  </section>

<?php 

  ?>