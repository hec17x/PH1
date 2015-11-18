<?php 
session_start();
	include('cabecera.inc');
	include('sidebar.inc'); 	
  ?>
  
   <section id="content-datos">
	<div id="datos">
		<br>
		<li>Usuario:</li>
		<?php

	 		if (isset($_COOKIE['user'])) 
	 		{
	 			echo "<h2>".$_COOKIE["user"]."</h2>";
	 		}
	 		else
	 		{
	 			echo "<h2>". $_SESSION['user']."</h2>";
	 		}
	 			
	 		?>

		<li>Contraseña:</li>
	 	<?php

	 		if (isset($_COOKIE['pass'])) 
	 		{
	 			echo "<h2>".$_COOKIE["pass"]."</h2>";
	 		}
	 		else
	 		{
	 			echo "<h2>". $_SESSION['pass']."</h2>";
	 		}
	 			
	 		?>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		
		<?php
		
		?>
	</div>
  </section>

<?php 
    include('pie.inc');
  ?>