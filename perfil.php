<?php 
session_start();
if(!isset($_SESSION['user']) AND !isset($_COOKIE['user']))
{
	header("Location: index.php");
}

	include('cabecera.inc');
	include('sidebar.inc'); 	
  ?>
  
  <section id="content-datos">
	<div id="datos">

		<h2>Tu galería:</h2>
		<h3>Últimas fotos subidas:</h3>
		 <div id="fotos">

		 	 <?php

      $var =0;

      if(!($iden = mysql_connect("localhost", "root", "")))
        die("Error: No se pudo conectar");

       if(!mysql_select_db("p&i", $iden))
       die("Error: No existe la base de datos");
 	   	
   		if(isset($_COOKIE['user'])){
        	$user = $_COOKIE['user'];
        }

     	else if(isset($_SESSION['user'])){   
	   		$user=$_SESSION['user'];
        }

 		$consulta1='SELECT * FROM Usuarios WHERE NomUsuario="'.$user.'"';
                            $resultado1=mysql_query($consulta1);
                             while ($lista1=mysql_fetch_array($resultado1)) {
                                $usuario=$lista1['IdUsuario'];
                             }

         $consulta2='SELECT * FROM Albumes WHERE Usuario="'.$usuario.'"';
                          $resultado2=mysql_query($consulta2);
         
		

        if($resultado2){
		        while ($lista2=mysql_fetch_array($resultado2)) {
		                           	 
		    	 $IDA=$lista2["IdAlbum"]; 
                 }
		}

if(!empty($IDA)){ //Creo que este if soluciona el problema de error si el usuario no tiene fotos.
      

      $sentencia="SELECT * FROM fotos WHERE Album=".$IDA." ORDER BY FRegistro DESC";
      $resultado = mysql_query($sentencia, $iden);
        if(!$resultado)
          die("Error: no se pudo realizar la consulta");
         
         while($fila = mysql_fetch_assoc($resultado))
         {

             $fe=$fila["Pais"];
                        $sentencia3 = "SELECT * FROM Paises WHERE IdPais='$fe'";
                        // Ejecuta la sentencia SQL
                         $resultado2 = mysql_query($sentencia3, $iden);
                         if(!$resultado2)
                             die("Error : no se pudo realizar la consulta");
                
                        while($fila1 = mysql_fetch_assoc($resultado2))
                        {

                            $pais=$fila1['NomPais'];
                        }

            $fichero=$fila["Fichero"];
            $titulo=$fila["Titulo"];
            $fechaF=$fila["FRegistro"];
            ?>
         
            <script language="javascript" >
              iniciar("<?php echo $titulo; ?>","<?php echo $fichero; ?>","<?php echo $fechaF; ?>","<?php echo $pais; ?>","<?php echo $var; ?>");
            </script>
                  
                  <?php


            $var=$var+1;
         }
}

  ?>
		 	
  		</div>

		<h3>Últimos álbumes creados:</h3>

		<div id="albumes">
			<?php
                        while ($lista1=mysql_fetch_array($resultado1)) {
                           
                        		 $usuario=$lista1['IdUsuario'];
                              }
                         
                          $consulta='SELECT * FROM Albumes WHERE Usuario="'.$usuario.'"';
                          $resultado=mysql_query($consulta);

                        while ($lista=mysql_fetch_array($resultado)) {
                            echo "<p>Titulo: ".$lista['Titulo']."</p>";
                            echo "<p>Descripcion: ".$lista['Descripcion']."</p>";
                             }
                             ?>
			
	
		</div>
		
		<h2>Tus contactos:</h2>
		<div id="contactos">
			<div id="con_nom">
			<p>Bot</p>
			</div>
			<img id="con_avatar" src="images/avatar.jpg" >
			
		</div>

		<div id="contactos">
			<div id="con_nom">
			<p>Bot</p>
			</div>
			<img id="con_avatar" src="images/avatar2.jpg" >
			
			
		</div>

		<div id="contactos">
			<div id="con_nom">
			<p>Bot</p>
			</div>
			<img id="con_avatar" src="images/avatar3.jpg" >
			
			
		</div>


		<div id="contactos">
			<div id="con_nom">
			<p>Bot</p>
			</div>
			<img id="con_avatar" src="images/avatar4.jpg" >
			
			
		</div>


		<div id="contactos">
			<div id="con_nom">
			<p>Bot</p>
			</div>
			<img id="con_avatar" src="images/avatar5.jpg" >
			
			
		</div>

		<h2>Tus grupos:</h2>
		<div id="contactos">
			<div id="con_nom">
			<p>Bot Group</p>
			</div>
			<img id="con_avatar" src="images/group1.png" >
			
			
		</div>
	</div>
  </section>

<?php 

  ?>