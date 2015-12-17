<?php 
  session_start();
    include('cabecera.inc');  
    include('sidebar.inc');     

  ?>


      <section id="content-datos">

	
	           <form id="datos2" class="Registro" action="sub_foto.php" method="post" enctype="multipart/form-data">

                    <h3>Añade una nueva foto:</h3> 
            

                <div id="formulario">
                  <label for="B_titulo" > Titulo de la foto: </label>
                <input id="B_titulo" name="Titulo" required="required" type="text" placeholder="Titulo"/>
               
			 	

			

              <label for="B_titulo" > Descripcion: </label>
                <input id="B_titulo" name="Descripcion" required="required" type="text" placeholder="Descripcion"/>
               
                
              

                    <label for="R_Album">Album:</label>
                    <br>
                    <select id="R_Album" name="Album">
                        <option value="" disabled selected>Album</option>
                          <?php
                          if(isset($_COOKIE['user'])){
                              $user = $_COOKIE['user'];
                            }

                          else if(isset($_SESSION['user'])){   
                            $user=$_SESSION['user'];
                            }


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
        
         

			
						<br>
            <br>
					<label for="B_Dia">Fecha de subida:</label>
                    <br>
						   <input type="date"  name="fecha" id="fecha"/>
                        
                   
                   
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
                  <br>
                  <br>
                
				        <label for="B_titulo" >Foto: </label>
                  <br>
                    <input type="file" name="uploadedfile" id="uploadedfile" />
                 
               
				
                <input type="submit" value="Añadir Foto"/> 
                </div>
                </form>
                 <br>
               
	</div>
</section>



  <?php 
 
  ?>