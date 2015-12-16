<?php

if($_GET['id']!=null){
		        	$idAlbum = $_GET['id'];
		  		try
		        	{
		        		$con = new PDO('mysql:host=localhost; dbname=P&I', 'root', '');
		        		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		        		
		        		$query =" DELETE from fotos where Album = '".$idAlbum."'";
		        		$query1 = "DELETE FROM albumes where IdAlbum='".$idAlbum."'";
		        		
		        		if($con->query($query)==TRUE AND $con->query($query1)==TRUE)
		        		{
		        			echo "Todo ha sido borrado correctamente.";
		        			header('Location: albumes.php');
		        		}
		        		else
		        		{
		        			echo "Error borrando: ". $con->error;
		        		}

    					$con=NULL;
		        	}
		        	catch(PDOException $e) 
		        	{
 						echo "¡Error!\n";
    					echo "Fichero: " . $e->getFile() . "<br />";
    					echo "Línea:  " . $e->getLine() . "<br />";
    					echo "Código: " . $e->getCode() . "<br />";
    					echo "Mensaje: " . $e->getMessage() . "<br />";

		        	}

		  	}
		  	?>