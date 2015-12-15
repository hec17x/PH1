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
		 <section id="fotos"->

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
		                           	 
		    	 $array[] = $lista2["IdAlbum"]; 
                 }
		}
		//numero de albumes en el array:
		if(isset($array))	$contarAlbum = count($array);
		else 				$contarAlbum = 0;

if($contarAlbum!=0){ //Creo que este if soluciona el problema de error si el usuario no tiene fotos.
      
	if($contarAlbum == 1)		
      $sentencia="SELECT * FROM fotos WHERE Album=".$array[0]."        ORDER BY FRegistro DESC";
     
	if($contarAlbum == 2)		
      $sentencia="SELECT * FROM fotos WHERE Album=".$array[0]." or Album = ".$array[1]."       ORDER BY FRegistro DESC";
    if($contarAlbum == 3)		
      $sentencia="SELECT * FROM fotos WHERE Album=".$array[0]." or Album = ".$array[1]."  or Album = ".$array[2]."     ORDER BY FRegistro DESC";
      


      $resultado = mysql_query($sentencia, $iden);
        if(!$resultado)
          die("Error: no se pudo realizar la consulta");
         
         
         $contador = 0; //el contador es para mostrar solo 8 fotos en galeria de index
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
            $idfoto = $fila["IdFotos"];

            if($contador < 6){
	            ?>
	         	<div>
	            <script language="javascript" >
	              //iniciar("<?php echo $titulo; ?>","<?php echo $fichero; ?>","<?php echo $fechaF; ?>","<?php echo $pais; ?>","<?php echo $var; ?>");
	              iniciar("<?php echo $titulo; ?>","<?php echo $fichero; ?>","<?php echo $fechaF; ?>","<?php echo $pais; ?>","<?php echo $var; ?>","<?php echo $idfoto; ?>");

	            </script>
	            </div>      
                  <?php
            }

            $contador = $contador +1;
            $var=$var+1;
         }
}

  ?>
		 	
  		</section>
  		<br>
		<h3>Últimos álbumes creados:</h3>

			<?php
       echo "<section id='ult-alb'>";
                        while ($lista1=mysql_fetch_array($resultado1)) {
                           
                        		 $usuario=$lista1['IdUsuario'];
                              }
                         
                          $consulta='SELECT * FROM Albumes WHERE Usuario="'.$usuario.'"';
                          $resultado=mysql_query($consulta, $iden);

                        while ($lista=mysql_fetch_array($resultado)) {

                          echo "<div id='cajaAlb'>";
                        	$idbm= $lista['IdAlbum'];
                          $consultando='SELECT * FROM Fotos WHERE Album="'.$idbm.'"';
                          $resul=mysql_query($consultando, $iden);
                          
                           $i=0;
                         
                          while ($lista2=mysql_fetch_array($resul)) {
                            if($i<3)
                          {
                            echo "<div id='pAlbum'>";
                            echo "<img src=upload/fotos/".$lista2["Fichero"].">";
                              echo "</div>";
                            $i++;
                          }
                          }

                          if ($i==0) {
                            echo "<img id='blank-alb' src='images/album.png'>";
                          }

                          echo "<div id='desAlb'>";
                            echo "
                        <b> Descripcion:</b> ".$lista['Descripcion']."<br><a href='verAlbum.php?id=$idbm'><button type='submit'>Ver</button></a>
                                  "."<br>";
                          
                            echo "</div>";
                        echo "</div>";
                             }
                                 echo "</section>";
                             ?>
			
	</div>
  </section>

<?php 

  ?>