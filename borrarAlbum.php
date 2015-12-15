<?php 
	session_start();
	include('cabecera.inc');
	include('sidebar.inc');

?>


<section id="content-registro">
						<!---->
			<form  action = "borrarAlbum2.php">

				<div id="cuerpo">

				<?php
				if($_GET['id']!=null){
				$idAlbum = $_GET['id'];
				//echo "$idAlbum";				
					echo "<li><b>¿Esta seguro de que desea borrar este album?</b></li>";
					echo "</br>";
	    			echo "<br><a href='borrarAlbum2.php?id=$idAlbum'><button type='submit'>Borrar Album</button></a>";
				}
				else{
					echo "No has seleccionado un album para borrar";	
				}
				?>

				
				</div>
            </form>
</section>