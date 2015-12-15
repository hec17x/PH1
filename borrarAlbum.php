<?php 
	session_start();
	include('cabecera.inc');
	include('sidebar.inc'); 	
  ?>


<section id="content-registro">
						<!---->
			<form  action = "albumes.php" onsubmit="eliminar()">

				<div id="cuerpo">

				<?php
		        if($_GET['id']!=null){

		            $idAlbum = $_GET['id'];

		              $sentencia3 = "SELECT * FROM albumes where IdAlbum='$idAlbum'";
		              // Ejecuta la sentencia SQL
		              $resultado3 = mysql_query($sentencia3, $iden);
		              if(!$resultado3)
		                  die("Error: no se pudo realizar la consulta");
		              

		              while($fila = mysql_fetch_assoc($resultado3))
		                  {
		                      $tituloAlbum=$fila["Titulo"];        
		                  }

		              echo '<b>Si pulsa borrar, se borrarán todas las fotos del album: </b>' .$tituloAlbum;
		        }
		       
		        ?>

						<input type="submit" value="Borrar Album" /> 
						
						<script  type="text/javascript">

							function eliminar()
							{	
								<?php 
									$user = $_SESSION['user'];

						            if(!($iden = mysql_connect("localhost", "root", "")))
						                die("Error: No se pudo conectar");
						            // Selecciona la base de datos
						            if(!mysql_select_db("p&i", $iden))
						                die("Error: No existe la base de datos");
						            
						            //borra fotos de album
						            $sentencia2 =" DELETE from fotos where Album = '$idAlbum'  ";
						            $resultado2 = mysql_query($sentencia2, $iden);
						            if(!resultado2)
						            	die("Error al borrar las fotos del album");

						            //borra album
						            $sentencia1 = "DELETE FROM albumes where IdAlbum='$idAlbum'";
						            // Ejecuta la sentencia SQL
						            $resultado = mysql_query($sentencia1, $iden);
						            if(!$resultado)
						            	die("Error: no se pudo borrar el album");
						            return true;
								 ?>

								   
					 		}
						</script>
						</div>


            </form>
</section>