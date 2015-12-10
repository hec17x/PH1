
  <?php 
  session_start();
    include('cabecera.inc');
   include('inicio.inc');
    include('acceso.inc');
  ?>
  <section id="content-index">

    <!--seleccion de fotos -->
  <div id="fotoseleccionada">
    <?php 
      include("muestralineas.php");
    ?>
  </div>

  <div id="login-abrir"onclick="action()" >
      <?php


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
       ?>
  </div>

  <div id="selector-ordenacion">

  <h2>Últimas actualizaciones:</h2>
      <select id="Nordenacion" name="Nordenacion" onchange="ordenar()">
                <option value="" disabled selected>Ordenar por</option>
                <option value="Fecha">Fecha</option>
                <option value="Titulo">Titulo</option>
                <option value="Pais">Pais</option>
            </select>
      <select id="Tordenacion" name="Tordenacion" onchange="ordenar()">
                <option value="Ascendente" disabled selected>Tipo de ordenacion</option>
                <option value="Ascendente">Ascendente</option>
                <option value="Descendente">Descendente</option>
            </select>
          
  </div>
 <div id="fotos">

  <?php

      $var =0;

      if(!($iden = mysql_connect("localhost", "root", "")))
        die("Error: No se pudo conectar");

       if(!mysql_select_db("p&i", $iden))
       die("Error: No existe la base de datos");

      $sentencia="SELECT * FROM fotos ORDER BY FRegistro DESC";
      $resultado = mysql_query($sentencia, $iden);
        if(!$resultado)
          die("Error: no se pudo realizar la consulta");
         

         $contador = 0; //el contador es para mostrar solo 8 fotos en galeria de index
         while($fila = mysql_fetch_assoc($resultado))
         {

             $fe=$fila["Pais"];
                        $sentencia3 = "SELECT * FROM Paises WHERE IdPais='$fe'";
                        // Ejecuta la sentencia SQL
                         $resultado2 = mysql_query($sentencia3, $iden);
                         if(!$resultado2)
                             die("Error : no se pudo realizar la consulta");
                
                        while($fila1 = mysql_fetch_assoc($resultado2))
                        {

                            $pais=$fila1['NomPais'];
                        }

            $fichero=$fila["Fichero"];
            $titulo=$fila["Titulo"];
            $fechaF=$fila["FRegistro"];
            $ide= $fila["IdFotos"];
            
            if($contador < 8){
              ?> 
              <script language="javascript" >

                iniciar("<?php echo $titulo; ?>","<?php echo $fichero; ?>","<?php echo $fechaF; ?>","<?php echo $pais; ?>","<?php echo $var; ?>","<?php echo $ide; ?>");
              </script>      
              <?php
            }


            $var=$var+1;
            $contador = $contador + 1;
         }

  ?>

  </div>
  

 </section>
  <?php 
    include('pie.inc');
  ?>
  

