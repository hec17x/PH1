
  <?php 
  session_start();
    include('cabecera.inc');
   include('inicio.inc');
    include('acceso.inc');
  ?>
  <section id="content-index">

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
     <!-- <select id="Nordenacion" name="Nordenacion" onchange="ordenar()">
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
     -->     
  </div>
  
  <?php

            if(!($iden = mysql_connect("localhost", "root", "")))
                die("Error: No se pudo conectar");
              // Selecciona la base de datos


            if(!mysql_select_db("p&i", $iden))
                die("Error: No existe la base de datos");
                  

           $sentencia1 = "SELECT * FROM Fotos";
            // Ejecuta la sentencia SQL
            $resultado = mysql_query($sentencia1, $iden);
            if(!$resultado)
            die("Error: no se pudo realizar la consulta");
            
            while($fila = mysql_fetch_assoc($resultado))
                {

                    $fe=$fila['Pais'];
                    $sentencia3 = "SELECT * FROM Paises WHERE IdPais='$fe'";
                    // Ejecuta la sentencia SQL
                     $resultado2 = mysql_query($sentencia3, $iden);
                     if(!$resultado2)
                         die("Error : no se pudo realizar la consulta");
            
                    while($fila1 = mysql_fetch_assoc($resultado2))
                    {

                        $pais=$fila1['NomPais'];
                    }



                    $id= $fila['IdFotos'];

                    echo "<a href='detalle.php?di=$id'>","<img src='./upload/fotos/".$fila['Fichero']."' width='300px'/></a>" ;            
                    echo "<ul>";
                    echo "<li><b>Titulo</b>".": ".$fila['Titulo']."</li>";
                    echo "<li><b>Fecha</b>".": ".$fila['Fecha']."</li>";
                    echo "<li><b>Pais</b>".": ".$pais."</li>";
                    echo "<li><b>ID</b>".": ".$id."</li>";
                    echo "</ul>";
                }

  ?>


 </section>
  <?php 
    include('pie.inc');
  ?>
  

