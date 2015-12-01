<?php 
session_start();
	include('cabecera.inc');
	include('sidebar.inc'); 	
  ?>
  
   <section id="content-datos">
	<div id="datos">
		<br>
		<?php

	 		if (isset($_SESSION['user'])) 
	 		{
	 				//capturamos usuario y lo mostramos
	 				$user = $_SESSION['user'];
	 				//echo "$user";

                    echo "<br/>";


			 		if(!($iden = mysql_connect("localhost", "root", "")))
		                die("Error: No se pudo conectar");
		              // Selecciona la base de datos
		            if(!mysql_select_db("p&i", $iden))
		                die("Error: No existe la base de datos");
		                  

		            $sentencia1 = "SELECT * FROM usuarios where NomUsuario='$user'";
		            // Ejecuta la sentencia SQL
		            $resultado = mysql_query($sentencia1, $iden);
		            if(!$resultado)
		            die("Error: no se pudo realizar la consulta");
		            
		            while($fila = mysql_fetch_assoc($resultado))
		                {

		                 
	                    echo "<li><b>Nombre</b>".": ".$fila['NomUsuario']."</li>";
	                    echo "<li><b>Contraseña</b>".": ".$fila['Clave']."</li>";
	                    echo "<li><b>Email</b>".": ".$fila['Email']."</li>";
	                    echo "<li><b>Fecha de Nacimiento</b>".": ".$fila['FNacimiento']."</li>";
	                    echo "<li><b>Ciudad</b>".": ".$fila['Ciudad']."</li>";

						$fe=$fila['Pais'];
                        $sentencia3 = "SELECT * FROM paises WHERE IdPais='$fe'";
                        // Ejecuta la sentencia SQL
                         $resultado2 = mysql_query($sentencia3, $iden);
                         if(!$resultado2)
                             die("Error : no se pudo realizar la consulta");
                
                        while($fila1 = mysql_fetch_assoc($resultado2))
                        {

                            $pais=$fila1['NomPais'];
                        }



	                    echo "<li><b>Pais</b>".": ".$pais."</li>";
		                }
			 		}
	 		else
	 		{
	 			echo "<h2>". $_SESSION['user']."</h2>";
	 		}
	 			
	 		


	 			
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