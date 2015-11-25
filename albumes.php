<?php 
session_start();
	include('cabecera.inc');
	include('sidebar.inc'); 	
  ?>
  
   <section id="content-datos">
	<div id="datos">
		<br>
		<h2>Estos son tus albumes:</h2>
		<br>
		<br>
		 <?php
                         mysql_query("SET NAMES 'utf8'");
                          $consulta='SELECT * FROM Albumes';
                          $resultado=mysql_query($consulta);
                        while ($lista=mysql_fetch_array($resultado)) {
                            echo "<option value=".$lista['IdAlbum'].">".$lista['Titulo']."</option>";
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
		
		<?php
		
		?>
	</div>
  </section>

<?php 
    include('pie.inc');
  ?>