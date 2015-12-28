  <?php 
    session_start();
    include('cabecera.inc');
    include('inicio.inc');
    include('acceso.inc');
    include('adodb5/adodb.inc.php');

    ?>


    <?php

    echo "

		<div id='login-abrir'onclick='action1()' >";
        
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
       


	if(isset($_COOKIE['user']) OR isset($_SESSION['user']) )
	{
    //Si viene de index.php muestro esto:
  echo "<section id='datos'>";
  
       if($_GET['id'] !=null){

            $id = $_GET['id'] ; //esta variable contiene el id de la imagen
            ////////////////////////////////////////////////////////////////////si solo existe el titulo
            try
              {
                $con = new PDO('mysql:host=localhost; dbname=P&I', 'root', '');
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $con -> exec("SET CHARACTER SET utf8");

                
              /*  
              $con->Connect('localhost', // El servidor
              'root', // El usuario
              '', // La contraseña
              'p&i'); // La base de datos
              // Ejecuta una sentencia SQL*/

                $query = "SELECT * FROM Fotos WHERE IdFotos = '".$id."' ";
                $resultado=$con->query($query);
                $rows = $resultado->fetchAll();

                foreach($rows as $fila) {

                    $fe=$fila['Pais'];
                    if($fe!=0)
                    {
                    $sentencia3 = "SELECT * FROM Paises WHERE IdPais='$fe'";

                    $resultado2=$con->query($sentencia3);
                    $rows2 = $resultado2->fetchAll();

                    foreach($rows2 as $fila2) {
                      $pais = $fila2['NomPais'];
                    }

                  }
                  else
                    $pais = 'No definido';
                   


                    $id= $fila['IdFotos'];
                    $idAlbum = $fila['Album'];
                    
                     $sentencia4  = "SELECT * FROM Albumes WHERE IdAlbum = '".$idAlbum."' ";
                           $resultado3 = $con->query($sentencia4);
                              $rows3 = $resultado3->fetchAll();
                            foreach($rows3 as $fila3) {
                             {
                                $Puser=$fila3['Usuario'];
                              
                            }



                     echo "    <img src='./upload/fotos/".$fila['Fichero']."' width='400px'/></a>" ;
                          echo "<ul id='detalle_foto'>";
                          echo "<li><b>Título</b>".": ".$fila['Titulo']."</li>";
                          echo "<li><b>Descripción</b>".": ".$fila['Descripcion']."</li>";                          

                          $fechita = $fila['Fecha'];
                          if($fechita == '0000-00-00')
                              $fechita == 'No definida';
                          echo "<li><b>Fecha</b>".": ".$fechita."</li>";
                          echo "<li><b>Pais</b>".": ".$pais."</li>";
                          echo "<li><b>ID</b>".": ".$id."</li>";
                          echo "</ul>";
                      }
                


              $con=NULL;
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

  
                          echo "<a href='perAlbum.php?id=$idAlbum'>
                                <button type='submit'>Ver Album</button></a>";
                          echo "<a href='resumen.php?id=$Puser'>
                                <button type='submit'>Detalle de usuario</button></a>";
                    }


?>

<form  action="nuevoComentario.php" method="post">

<?php
            ///////////////////////////////////////////////////////////////////////////

          //empezamos los comentarios aqui, primero los mostramos con ADOdb
          ?>
          <section id="datos">
            <span>Comentarios:</span>
          <?php
          include_once 'adodb/adodb.inc.php';
          $con = NewADOConnection('mysql');
          $con->Connect('localhost', // El servidor
          'root', // El usuario
          '', // La contraseña
          'p&i'); // La base de datos
          // Ejecuta una sentencia SQL

          $sentencia = "SELECT * FROM comentario where Foto = '$id' ";
          $resultado = $con->Execute($sentencia);
          $cont = 0;

          // Recorre el resultado y lo muestra en forma de tabla HTML
          while(!$resultado->EOF) {

              $idusu = $resultado->fields['Usuario'];
              //buscamos el nombre del user:
              $sentencia10 = "SELECT * from usuarios where IdUsuario = '$idusu' ";
              $resultado10 = $con->Execute($sentencia10);
              while(!$resultado10->EOF){
                  $NomUsuario = $resultado10->fields['NomUsuario'];
                  $resultado10->MoveNext();
              }

              if($cont == 0 ){
                 echo '<table><tr>';
                 echo '<th>Usuario</th><th>Comentario</th><th>Fecha</th>';
                 echo '</tr>';
                 echo '<br>';
                 echo '<br>';
                 $cont =1;
              }
              echo '<tr>';
              echo '<td>' . $NomUsuario . '</td>';
              echo '<td>' . $resultado->fields['Comentario'] . '</td>';
              echo '<td>' . $resultado->fields['Fecha'] . '</td>';

              $resultado->MoveNext();
          }
          echo '</table>';
          echo '<br>';
          ?>
          <!-- FORMULARIO PARA INTRODUCIR EL COMENTARIO-->
          
          <input id="comentario" name="comentario"  type="text" placeholder="Escribe tu comentario..."/>
          <input type="hidden" id="idfoto" name="idfoto" value = "<?php echo "$id" ?>"    />
          <input type="submit" value="Comentar" /> 

          </form>
          </section>

          <?php
	}

	

else
  {   
      echo "<section id='datosdetalle'>";
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<h3>Necesitas estar <a href='registro.php'>Registrado</a> o iniciar sesión para ver esta foto.</h3>";
  }

	echo "</div>";
    include('pie.inc');

  ?>
  
