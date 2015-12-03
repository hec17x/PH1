<?php 
session_start();
	include('cabecera.inc');
	include('sidebar.inc'); 	
  ?>
  
   <section id="content-datos">
	
		
					<form action="VerFoto.php" method="post">
				 
		<h2>Estos son tus albumes:</h2>
			
                       
		 <?php
                         mysql_query("SET NAMES 'utf8'");
                          $user=$_SESSION['user'];

                    		
                          $consulta1='SELECT * FROM Usuarios WHERE NomUsuario="'.$user.'"';
                          $resultado1 = mysql_query($consulta1, $iden);


						if($resultado1 === FALSE) { 
 						   die(mysql_error()); // TODO: better error handling
							}


                        while ($lista1=mysql_fetch_array($resultado1)) {
                           
                        		 $usuario=$lista1['IdUsuario'];
                              }
                         
                          $consulta='SELECT * FROM Albumes WHERE Usuario="'.$usuario.'"';
                          $resultado=mysql_query($consulta);

                        while ($lista=mysql_fetch_array($resultado)) {
                            echo " <input type='radio' name='Album' value=".$lista['IdAlbum']."><b>Titulo: </b>".$lista['Titulo']."<b> Descripcion:</b> ".$lista['Descripcion']."</input><br>";
                             }
                             ?>
              
                   <div id="formulario">
				<a href="#"><input type="submit" value="Ver"/> </a>
                </div>
            </form>
		
		
		<?php
		
		?>
	
  </section>

<?php 
 
  ?>