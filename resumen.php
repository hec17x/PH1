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

      $user = $_GET['id'];
          if(!($iden = mysql_connect("localhost", "root", "")))
                    die("Error: No se pudo conectar");
                  // Selecciona la base de datos
                if(!mysql_select_db("p&i", $iden))
                    die("Error: No existe la base de datos");
                      

                $sentencia1 = "SELECT * FROM usuarios where IdUsuario='$user'";
                // Ejecuta la sentencia SQL
                $resultado = mysql_query($sentencia1, $iden);
                
                if(!$resultado)
                die("Error: no se pudo realizar la consulta");
                
                while($fila = mysql_fetch_assoc($resultado))
                    {

                      $nom = $fila['NomUsuario'];
                      $email = $fila['Email'];
                      $nac = $fila['FNacimiento'];
                      $ciu = $fila['Ciudad']; 
                      $fe = $fila['Pais'];

                       $sentencia3 = "SELECT * FROM Paises WHERE IdPais='$fe'";
                            // Ejecuta la sentencia SQL
                             $resultado2 = mysql_query($sentencia3, $iden);
                             if(!$resultado2)
                                 die("Error : no se pudo realizar la consulta");
                            while($fila1 = mysql_fetch_assoc($resultado2))
                            {
                                $pais=$fila1['NomPais'];

                            }
                      echo "<h3>Datos Personales</h3>";
                      echo "<p><b>Nombre: </b>$nom</p>";
                      echo "<p><b>Email: </b>$email</p>";
                      echo "<p><b>Nacimiento: </b>$nac</p>";
                      echo "<p><b>Ciudad: </b>$ciu</p>";
                      echo "<p><b>Pais: </b>$pais</p>";

                      
                    }
                    ?>

                     <h3>Álbumes:</h3>

      <?php
       echo "<section id='ult-alb'>";
                  
                         
                          $consulta='SELECT * FROM Albumes WHERE Usuario="'.$user.'"';
                          $resultado=mysql_query($consulta, $iden);

                        while ($lista=mysql_fetch_array($resultado)) {

                          echo "<div id='cajaAlb'>";
                          $idbm= $lista['IdAlbum'];
                          $consultando='SELECT * FROM Fotos WHERE Album="'.$idbm.'"';
                          $resul=mysql_query($consultando, $iden);
                          
                           $i=0;
                         
                          while ($lista2=mysql_fetch_array($resul)) {
                            if($i<3)
                          {
                            echo "<div id='pAlbum'>";
                            echo "<img src=upload/fotos/".$lista2["Fichero"].">";
                              echo "</div>";
                            $i++;
                          }
                          }

                          if ($i==0) {
                            echo "<img id='blank-alb' src='images/album.png'>";
                          }

                          echo "<div id='desAlb'>";
                            echo "
                        <b> Descripcion:</b> ".$lista['Descripcion']."<br><a href='verAlbum.php?id=$idbm'><button type='submit'>Ver</button></a>
                                  ";
                          
                            echo "</div>";
                        echo "</div>";
                             }
                                 echo "</section>";
                             ?>

  </div>
</section>
<?php
                  }

  }

                          
                    





else
  { 
      echo "<h3>Necesitas estar <a href='registro.php'>Registrado</a> o iniciar sesión para ver esta foto.</h3>";
  }
  echo "</div>";
   echo " </section>";
    include('pie.inc');

  ?>
  
