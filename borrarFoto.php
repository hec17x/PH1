<?php 
	session_start();
	include('cabecera.inc');
	include('sidebar.inc'); 	
  ?>


<section id="content-datos">
						<!---->
			<section id="datos2">

				<div id="cuerpo">

				<?php


		        if($_GET['id']!=null){
		        	$idF = $_GET['id'];
		        	try
		        	{
		        		$con = new PDO('mysql:host=localhost; dbname=P&I', 'root', '');
		        		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		        		
		        		$query = "SELECT * FROM Fotos WHERE IdFotos='".$idF."'";
		        		$resultado=$con->query($query);
		        		$rows = $resultado->fetchAll();

		        		foreach($rows as $fila) {
		        			echo "<p><b>Seguro que quieres borrar ".$fila['Titulo']." Si pulsa borrar, se borrarán todas las fotos de este album.</b> </p>";
		     				
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
    					/*$query =' DELETE from fotos where Album = "'.$idAlbum.'"';
		        		$query1 = 'DELETE FROM albumes where IdAlbum="'.$idAlbum.'"';*/

		        	}
		           
		  		echo "<a href='borraF.php?id=$idF'><button type='submit'>Borrar Foto</button></a>";
		     
					
		        }

		      
								 ?>

			

	
		        		
		    



						
					

						
						</div>


            </form>
</section>