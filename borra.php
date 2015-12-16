<?php

if($_GET['id']!=null){
		        	$idAlbum = $_GET['id'];
		  		try
		        	{
		        		$con = new PDO('mysql:host=localhost; dbname=P&I', 'root', '');
		        		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		        		
		        		//este fragmento en ADOdb elimina las fotos de la carpeta del server*////////
    					include_once 'adodb/adodb.inc.php';
					    $con = NewADOConnection('mysql');
					    $con->Connect('localhost', // El servidor
					    'root', // El usuario
					    '', // La contraseña
					    'p&i'); // La base de datos
					    // Ejecuta una sentencia SQL


					    $sentencia5 =  "SELECT * from fotos where Album = '".$idAlbum."'";
					    $resultado5 = $con->Execute($sentencia5);
					    // Recorre el resultado y lo muestra en forma de tabla HTML
					    while(!$resultado5->EOF) {
					    	$borra = $resultado5->fields['Fichero'];
		     				$fichero = "upload/fotos/".$borra;

		     				unlink($fichero);
					        
					        //echo '<td>' . $resultado->fields['Usuario'] . '</td>';
					        
					        $resultado5->MoveNext();
					      }
					    /////////////////////////////////////////////////////////////////////////////////



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