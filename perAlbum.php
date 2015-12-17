  <?php 
    session_start();
    include('cabecera.inc');
    include('inicio.inc');
    include('acceso.inc');
    include('adodb5/adodb.inc.php');

    ?>


    <?php

    echo "<section id='tuto'>";



	if(isset($_COOKIE['user']) OR isset($_SESSION['user']) )
	{
    
    if($_GET['id']!=null){

      $idAlbum = $_GET['id'];



            if(!($iden = mysql_connect("localhost", "root", "")))
                    die("Error: No se pudo conectar");
            if(!mysql_select_db("p&i", $iden))
                    die("Error: No existe la base de datos");

        $sentencia3 = "SELECT * FROM albumes where IdAlbum='$idAlbum'";
        // Ejecuta la sentencia SQL
        $resultado3 = mysql_query($sentencia3, $iden);
        if(!$resultado3)
            die("Error: no se pudo realizar la consulta");
        

        while($fila = mysql_fetch_assoc($resultado3))
            {
                $tituloAlbum=$fila["Titulo"];        
            }

        echo 'Éstas son las fotos del album: ' .$tituloAlbum;
        echo "<br>";

      $sentencia1 = "SELECT * FROM Fotos where Album='$idAlbum' ORDER BY FRegistro DESC";
      // Ejecuta la sentencia SQL
      $resultado = mysql_query($sentencia1, $iden);
        mysql_query("SET NAMES 'utf8'");
      if(!$resultado)
      die("Error: no se pudo realizar la consulta");
      
        $var = 0;

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


            $fichero=$fila["Fichero"];
            $titulo=$fila["Titulo"];
            $fechaF=$fila["FRegistro"];
            $idfoto = $fila["IdFotos"];

            ?>
            <section id = "fotos">
            <script language="javascript" >
              //iniciar("<?php echo $titulo; ?>","<?php echo $fichero; ?>","<?php echo $fechaF; ?>","<?php echo $pais; ?>","<?php echo $var; ?>");
              iniciarAlbum("<?php echo $titulo; ?>","<?php echo $fichero; ?>","<?php echo $fechaF; ?>","<?php echo $pais; ?>","<?php echo $var; ?>","<?php echo $idfoto; ?>");
            
            </script>
            </section>
                          
      
            <?php
            $var=$var+1;
          }
   

  }

                          
                    }




	

else
  { 
      echo "<h3>Necesitas estar <a href='registro.php'>Registrado</a> o iniciar sesión para ver esta foto.</h3>";
  }
	echo "</div>";
    include('pie.inc');

  ?>
  
