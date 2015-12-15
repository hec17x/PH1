  <?php 
  session_start();
    include('cabecera.inc');  
    include('sidebar.inc');     

  ?>


      <section id="content-datos">


			 <form id="datos"action="sub_album.php" method="post">
      <div id="formulario">
                    <h3>Crear un nuevo album:</h3> 
               

              <label for="B_titulo" > Titulo del Album: </label>
                <input id="B_titulo" name="Titulo" required="required" type="text" placeholder="Titulo"/>
               
           
         
        <label for="B_descripcion" > Descripcion: </label>
    
			
                <input id="B_descripcion" name="Descripcion" required="required" type="text" placeholder="Descripcion"/>
      
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
                
				<a href="#"><input type="submit" value="Crear nuevo Album"/> </a>
                </div>
                </form>
	</div>

</section>



  <?php 

  ?>