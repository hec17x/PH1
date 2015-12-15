<?php 
session_start();
	include('cabecera.inc');
	include('sidebar.inc'); 	
  ?>
  
   <section id="content-datos">
	

		<?php

	 		if (isset($_SESSION['user']) || isset($_COOKIE['user'])) 
	 		{
	 				//capturamos usuario y lo mostramos
	 				if(isset($_COOKIE['user'])){
			        	$user = $_COOKIE['user'];
			        }

			     	else if(isset($_SESSION['user'])){   
				   		$user=$_SESSION['user'];
			        }
	 				//echo "$user";
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
		                
		                ?>
		               <!--onsubmit="return modificarDatos(this)"-->
		            <form id= "datos" action="modificarUsuario.php" method="post" enctype="multipart/form-data"  novalidate="true">
		                	<p>Estos son tus datos, para modificarlos cambia el valor de cualquiera de ellos, 
		                		y pulsa actualizar datos:</p>
		              <div id="formulario">
		                <?php

	                    //echo "<li><b>ID</b>".": ".$fila['IdUsuario']."</li>";
	                    
	                    echo "<b>Nombre:</b>";
	                    ?>
	                    <input type="text" id ="R_usuario" name="usuario" value="<?php echo $fila['NomUsuario'];?>">
	         
	                    <?php
	                    //echo "<li><b>Contraseña</b>".": ".$fila['Clave']."</li>";
	                    echo "<b>Contraseña:</b>";
	                    ?>
	                    <input type="text" id="R_contrasenya" name="contrasenya" value="<?php echo $fila['Clave'];?>">
	                 
	                    <?php
	                    //echo "<li><b>Contraseña</b>".": ".$fila['Clave']."</li>";
	                    echo "<b>Email:</b>";
	                    ?>
	                    <input type="text" id="R_email" name="Email" value="<?php echo $fila['Email'];?>">
	                   
	                    <?php
	                    //echo "<li><b>Fecha de Nacimiento</b>".": ".$fila['FNacimiento']."</li>";
	                    echo "<b>Fecha de Nacimiento:</b>";
	                    ?>
	                    <input type="date" id="R_Nacimiento"  name="R_Nacimiento" value="<?php echo $fila['FNacimiento'];?>">
	              
	                    <?php
	                    //echo "<li><b>Ciudad</b>".": ".$fila['Ciudad']."</li>";
	                    echo "<b>Ciudad:</b>";
	                    ?>
	                    <input type="text" id="R_ciudad" name="R_ciudad" value="<?php echo $fila['Ciudad'];?>">
	     
	                    
	                    <!--<?php

						//$fe=$fila['Pais'];
                        //$sentencia3 = "SELECT * FROM paises WHERE IdPais='$fe'";
                        // Ejecuta la sentencia SQL
                        // $resultado2 = mysql_query($sentencia3, $iden);
                        // if(!$resultado2)
                        //     die("Error : no se pudo realizar la consulta");
                
                        // while($fila1 = mysql_fetch_assoc($resultado2))
                        {

                        //    $pais=$fila1['NomPais'];
                        }

	                    // echo "<b>Pais:  </b>".$pais."";

	                    ?> -->

	                     <?php
	                    //echo "<li><b>Fecha de Nacimiento</b>".": ".$fila['FNacimiento']."</li>";
	                    echo "<b>Cambiar de imagen:</b>";
	                    ?>

						<input type="file" name="uploadedfile" id="uploadedfile" /> 

	                    <input type="hidden" id="Id_usuario" name="Id_usuario" value="<?php echo $fila['IdUsuario'];?>">

	                    <input type="submit" value="Actualizar Datos"/> </a>
	                    </div>
	                </form>
	                    <?php
		                }
			 		}
	 		else
	 		{
	 		}
	 			
	 		


	 			
	 		?>
		<?php
		
		?>

  </section>

<?php 

  ?>