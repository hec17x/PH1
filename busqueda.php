  <?php 
    include('cabecera.inc');
    include('inicio.inc');
    include('acceso.inc');
  ?>
  



  <?php

    echo "

        <div id='login-abrir'onclick='action2()' >";
      
     if(isset($_COOKIE['user']) OR isset($_SESSION['user']) )
      {
        if(isset($_COOKIE['user']))
        {
        echo"<p id='login-abrir-nombre ''>Hola ".$_COOKIE['user']."</p>
         <img id='login-abrir-delante' src='images/delante.png'  alt='foto'>
          <img id='login-abrir-atras' src='images/atras.png'  alt='foto'>";
        }

        else if(isset($_SESSION['user']))
        {
           echo"<p id='login-abrir-nombre ''>Hola ".$_SESSION['user']."</p>
         <img id='login-abrir-delante' src='images/delante.png'  alt='foto'>
          <img id='login-abrir-atras' src='images/atras.png'  alt='foto'>";
        }

      }
      else
      {
         echo "       
         <p id='login-abrir-nombre ''>Login</p>
         <img id='login-abrir-delante' src='images/delante.png'  alt='foto'>
          <img id='login-abrir-atras' src='images/atras.png'  alt='foto'>";
      }
       echo "</div>";
       


?>
	
	       <section id="content-busqueda">

                  <?php
                         if(!($iden = mysql_connect("localhost", "root", "")))
                    die("Error: No se pudo conectar");
                  // Selecciona la base de datos


                  if(!mysql_select_db("p&i", $iden))
                    die("Error: No existe la base de datos");
                   
                   ?>


            <div id="for-busqueda">
			 <form id = "busqueda" action="resultado.php" method="get"  novalidate="true">

                <div id= "formularioB">
                    <h3>Criterios de busqueda:</h3> 
                </div>
                <div id="formularioB">
                <label for="B_titulo" > Titulo: </label>
                <br>
                <br>
                <input id="B_titulo" name="Titulo" required="required" type="text" placeholder="Titulo"/>
               
                <span class="bar"></span>
				</div>
				 <div id="formularioB">
	               <br>
						
					<label for="B_Fecha">Fecha de inicio:</label>
                    <br>
                    <br>
                    <input type="date" name="fecha_inicio" value="">
                    <br>
                    <!--
                  <p>Fecha inicio (formato: día-mes-año):
  <input type="text" name="fecha_inicio" value="">-->
          <label for="B_Fecha">Fecha de fin:</label>
                    <br>
                    <br>
                    <input type="date" name="fecha_fin" value="">
                    <br>
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
				<input type="submit" value="Buscar"/> </a>
                </div>
                </form>
            </div>
	</div>
</section>
  <?php 
    include('pie.inc');
  ?>
  

