<?php
session_start();

   include('cabecera.inc');
   include('sidebar.inc'); 

  
  if(!($iden = mysql_connect("localhost", "Hector", "")))
    die("Error: No se pudo conectar");
  // Selecciona la base de datos
  if(!mysql_select_db("P&I", $iden))
    die("Error: No existe la base de datos");

	if(isset($_POST['Album']))
	{
    	 $titulo = $_POST['Album'];


   	$sentencia1 = "SELECT * FROM Fotos WHERE Album='$titulo'";
    // Ejecuta la sentencia SQL
    $resultado = mysql_query($sentencia1, $iden);
    if(!$resultado)
    die("Error: no se pudo realizar la consulta");
  	

	$sentencia2 = "SELECT * FROM Albumes WHERE IdAlbum='$titulo'";
    // Ejecuta la sentencia SQL
    $resultado1 = mysql_query($sentencia2, $iden);
    if(!$resultado1)
    die("Error: no se pudo realizar la consulta");
	
	while($fila = mysql_fetch_assoc($resultado1))
  		{

   		 	$alb=$fila['Titulo'];
  		}
 	
echo  "<section id='content-datos'>";
echo "<div id='datos'>";
  	echo "<h1>".$alb."</h1>";
  		while($fila = mysql_fetch_assoc($resultado))
  		{
  			$fe=$fila['Pais'];
  			$sentencia3 = "SELECT * FROM Paises WHERE IdPais='$fe'";
    		// Ejecuta la sentencia SQL
   			 $resultado2 = mysql_query($sentencia3, $iden);
   			 if(!$resultado2)
   				 die("Error : no se pudo realizar la consulta");
	
			while($fila1 = mysql_fetch_assoc($resultado2))
  			{

   		 		$pais=$fila1['NomPais'];
  			}



  			echo "<img src='./upload/fotos/".$fila['Fichero']."' width='100px'/>";
  			echo "<ul>";
   		 	echo "<li><b>Titulo</b>".": ".$fila['Titulo']."</li>";
   		 	echo "<li><b>Fecha</b>".": ".$fila['Fecha']."</li>";
   		 	echo "<li><b>Pais</b>".": ".$pais."</li>";
   		 	echo "</ul>";
  		}

 	}
	 else
 	{
 		echo "<h1>ERROR</h1>";
 	}
 	echo "</div>";
echo "</section>";

?>