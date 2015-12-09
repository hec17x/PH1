<section id="content-registro">
   <?php
         if(!($iden = mysql_connect("localhost", "root", "")))
    die("Error: No se pudo conectar");
  // Selecciona la base de datos


  if(!mysql_select_db("p&i", $iden))
    die("Error: No existe la base de datos");
   
   ?>


<h2> Registro:</h2> 
    <!--onsubmit="return validaRegistro(this)"-->
	<form class="Registro" action="nuevoUsuario.php" method="post" enctype="multipart/form-data"  novalidate="true">

        <p>Rellene los siguientes campos:</p>
        <div id="formulario-registro">	
        <div id="user">			
		<input id="R_usuario" name="usuario" type="text" placeholder="Nombre de usuario"/>
        <span class="bar"></span>
		<label for="R_usuario" > Usuario: </label>
        </div>  
        </div>
        <div id="formulario-registro">   
		<input id="R_contrasenya" name="contrasenya" type="password" placeholder="Contraseña"/>
        <span class="bar"></span>
        <label for="R_contrasenya" > Contraseña: </label>
		</div>
         <div id="formulario-registro">  <div id="formulario-registro"> 
		<input id="R_rep_contrasenya" name="Contraseña" type="password" placeholder="Contraseña"/>
        <span class="bar"></span>
		<label for="R_rep_contrasenya" > Repetir contraseña: </label>
        </div>
         <div id="formulario-registro"> 
		
		<input id="R_email" name="Email" type="text" placeholder="Email"/>
		<span class="bar"></span>
        <label for="R_email"> Email:</label>
        </div>
        
        <div id="busqueda">
		  <label for="R_sexo"> Sexo:</label>
      
			<select id="R_sexo" name="R_sexo">
                <option value="" disabled selected>Sexo</option>
				<option value="0">Masculino</option>
				<option value="1">Femenino</option>
				</select>
		</div>
        
        <div id="busqueda">

		  <label for="R_Nacimiento">Fecha de Nacimiento:</label>
		
        <input type="date"  name="R_Nacimiento" id="R_Nacimiento"/> 
		</div>
		
		 <div id="formulario-registro">   
		<input id="R_ciudad" name="Ciudad"  type="text" placeholder="Ciudad"/>
        <span class="bar"></span>
		<label for="R_ciudad"> Ciudad:</label>
        </div>

        <div id="busqueda">
		<label for="R_pais">Pais:</label>

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

        <div id="busqueda">
		<label for="R_imagen"> Imagen:</label>

		<input type="file" name="uploadedfile" id="uploadedfile" /> 
		
		</div> 
  
        <div id="formulario-registro">  
		<input type="submit" value="Registrate" /> 
        </div>

    </form>
