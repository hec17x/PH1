<?php 
  session_start();
    include('cabecera.inc');  
    include('sidebar.inc');     

  ?>


      <section id="content-registro">

	
	           <form class="Registro" action="sub_foto.php" method="post" enctype="multipart/form-data">

			 	<div id= "formulario">
                    <h3>Añade una nueva foto:</h3> 
                </div>

                <div id="formulario">
                <input id="B_titulo" name="Titulo" required="required" type="text" placeholder="Titulo"/>
               
			 	<label for="B_titulo" > Titulo de la foto: </label>
				</div>

                <div id="formulario">
                <input id="B_titulo" name="Descripcion" required="required" type="text" placeholder="Descripcion"/>
               
                <label for="B_titulo" > Descripcion: </label>
                </div>
                <div id="busqueda">

                    <label for="R_Album">Album:</label>
                    <br>
                    <select id="R_Album" name="Album">
                        <option value="" disabled selected>Album</option>
                          <?php
                          $user=$_SESSION['user'];


                              $consulta1='SELECT * FROM Usuarios WHERE NomUsuario="'.$user.'"';
                            $resultado1=mysql_query($consulta1);
                             while ($lista1=mysql_fetch_array($resultado1)) {
                                $usuario=$lista1['IdUsuario'];
                             }

                         mysql_query("SET NAMES 'utf8'");
                          $consulta='SELECT * FROM Albumes WHERE Usuario="'.$usuario.'"';
                          $resultado=mysql_query($consulta);
                        while ($lista=mysql_fetch_array($resultado)) {
                            echo "<option value=".$lista['IdAlbum'].">".$lista['Titulo']."</option>";
                             }
                             ?>
                        </select>                   
                </div>
         

				 <div id="busqueda">
	               <br>
						
					<label for="B_Dia">Fecha de subida:</label>
                    <br>
						   <input type="date"  name="fecha" id="fecha"/>
                        
                    </div>
                    <br>
				<div id="busqueda">

					<label for="R_pais">Pais:</label>
					<br>
                    <select id="R_pais" name="R_pais">
                        <option value="" disabled selected>Pais</option>
                          <?php
                         mysql_query("SET NAMES 'utf8'");
                          $consulta='SELECT * FROM Paises';
                          $resultado=mysql_query($consulta);
                        while ($lista=mysql_fetch_array($resultado)) {
                            echo "<option value=".$lista['IdPais'].">".$lista['NomPais']."</option>";
                             }
                             ?>
                        </select>					
                </div>
				
                 <div id="formulario">
                    <input type="file" name="archivo" id="archivo" />
                    <label for="B_titulo" > Foto: </label>
                </div>
                <br>

                <div id="formulario">
				
                <a href="#"><input type="submit" value="Añadir Foto"/> </a>
                </div>
                </form>
                 <br>
                <br>
                <br>
	</div>
</section>



  <?php 
 
  ?>