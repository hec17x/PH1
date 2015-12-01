<?php 
	session_start();
	include('cabecera.inc');
	include('sidebar.inc'); 	
  ?>


<section id="content-registro">
						<!---->
			<form  action = "sesionFin.php">

				<div id="cuerpo">

				<?php
				$user = $_SESSION['user'];				
				
				echo "<li><b>¿Esta seguro de que quiere darse de baja ".$user."?</b></li>";
				echo "</br>";
				?>

				<input type="submit" value="Confirmar baja" onclick="eliminar()" /> 
				
				</div>
				<script>

					function eliminar()
					{	
						   
			 		}
				</script>


            </form>
</section>




