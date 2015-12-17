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

        try
        {


          $con = new PDO('mysql:host=localhost; dbname=P&I', 'root', '');
          $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $con -> exec("SET CHARACTER SET utf8");

           $sentencia1 = "SELECT * FROM usuarios where IdUsuario='$user'";
           $resultado=$con->query($sentencia1);
           $rows = $resultado->fetchAll();

            foreach($rows as $fila) {

              $nom = $fila['NomUsuario'];
                      $email = $fila['Email'];
                      $nac = $fila['FNacimiento'];
                      $ciu = $fila['Ciudad']; 
                      $fe = $fila['Pais'];

               $sentencia3 = "SELECT * FROM Paises WHERE IdPais='$fe'";
               $resultado2=$con->query($sentencia3);
               $rows2 = $resultado2->fetchAll();

               foreach($rows2 as $fila1) {
                   $pais=$fila1['NomPais'];
               }

               echo "<h3>Datos Personales</h3>";
                      echo "<p><b>Nombre: </b>$nom</p>";
                      echo "<p><b>Email: </b>$email</p>";
                      echo "<p><b>Nacimiento: </b>$nac</p>";
                      echo "<p><b>Ciudad: </b>$ciu</p>";
                      echo "<p><b>Pais: </b>$pais</p>";
                       echo "<section id='ult-alb'>";
                  ?>

                     <h3>Álbumes:</h3>

      <?php
      
                         
                          $consulta='SELECT * FROM Albumes WHERE Usuario="'.$user.'"';
                          $resultado4=$con->query( $consulta);
                           $rows5 = $resultado4->fetchAll();

                       foreach($rows5 as $lista) {

                          echo "<div id='cajaAlb'>";
                          $idbm= $lista['IdAlbum'];
                          $consultando='SELECT * FROM Fotos WHERE Album="'.$idbm.'"';
                          $resultado5=$con->query($consultando);
                          $rows6 = $resultado5->fetchAll();

                         
                          
                           $i=0;
                         
                         foreach($rows6 as $lista2) {
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
                        <b> Descripcion:</b> ".$lista['Descripcion']."<br><a href='perAlbum.php?id=$idbm'><button type='submit'>Ver</button></a>
                                  ";
                          
                            echo "</div>";
                        echo "</div>";
                             }
                                 echo "</section>";
            }

        }
        catch(PDOException $e) 
        {
            echo "¡Error!\n";
              echo "Fichero: " . $e->getFile() . "<br />";
              echo "Línea:  " . $e->getLine() . "<br />";
              echo "Código: " . $e->getCode() . "<br />";
              echo "Mensaje: " . $e->getMessage() . "<br />";

              }




                    ?>

                   

      <?php
      
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
  
