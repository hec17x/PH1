  <?php 
  session_start();
    include('cabecera.inc');  
    include('sidebar.inc');     

  ?>


      <section id="content-registro">

	
	       
			 <form action="sub_album.php" method="post">

			 	<div id= "formulario">
                    <h3>Crear un nuevo album:</h3> 
                </div>

                <div id="formulario">
                <input id="B_titulo" name="Titulo" required="required" type="text" placeholder="Titulo"/>
               
                <span class="bar"></span>
			 	<label for="B_titulo" > Titulo del Album: </label>
				</div>

				<div id="formulario">
                <input id="B_descripcion" name="Descripcion" required="required" type="text" placeholder="Descripcion"/>
               
			 	<label for="B_descripcion" > Descripcion: </label>
				</div>

				 <div id="busqueda">
	               <br>
					<label for="B_Dia">Fecha de subida:</label>
                    <br>
                           <input type="date"  name="fecha" id="fecha"/>
                        
                    </div>
                        
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
				<a href="#"><input type="submit" value="Crear nuevo Album"/> </a>
                </div>
                </form>
	</div>
</section>



  <?php 

  ?>