  <?php 
    session_start();
    include('cabecera.inc');
    include('inicio.inc');
    include('acceso.inc');
    include('adodb5/adodb.inc.php');

    ?>


    <?php

    echo "<section id='content-det'>

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
       
?>
<form  action="nuevoComentario.php" method="post">

<?php

	if(isset($_COOKIE['user']) OR isset($_SESSION['user']) )
	{
    //Si viene de index.php muestro esto:
  
       if($_GET['id'] !=null){

            $id = $_GET['id'] ; //esta variable contiene el id de la imagen
            ////////////////////////////////////////////////////////////////////si solo existe el titulo

                if(!($iden = mysql_connect("localhost", "root", "")))
                    die("Error: No se pudo conectar");
                if(!mysql_select_db("p&i", $iden))
                    die("Error: No existe la base de datos");


                $sentencia1 = "SELECT * FROM Fotos WHERE IdFotos = '".$id."' ";
                // Ejecuta la sentencia SQL
                $resultado = mysql_query($sentencia1, $iden);
                if(!$resultado)
                die("Error: no se pudo realizar la consulta");
                
                while($fila = mysql_fetch_assoc($resultado))
                    {

                        $fe=$fila['Pais'];

                        if($fe!=0){
                            $sentencia3 = "SELECT * FROM Paises WHERE IdPais='$fe'";
                            // Ejecuta la sentencia SQL
                             $resultado2 = mysql_query($sentencia3, $iden);
                             if(!$resultado2)
                                 die("Error : no se pudo realizar la consulta");
                    
                            while($fila1 = mysql_fetch_assoc($resultado2))
                            {
                                $pais=$fila1['NomPais'];
                            }
                        }
                        else 
                          $pais = 'No definido';


                        $id= $fila['IdFotos'];


                          echo "    <img src='./upload/fotos/".$fila['Fichero']."' width='400px'/></a>" ;
                          echo "<ul>";
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


            ///////////////////////////////////////////////////////////////////////////

          //empezamos los comentarios aqui, primero los mostramos con ADOdb

/*
          $con = NewADOConnection('mysql');
          $con->Connect('localhost', // El servidor
                        'root',      // El usuario
                        '',          // La contraseña
                        'p&i');      // La base de datos

          // Ejecuta una sentencia SQL
          $sentencia = "SELECT * FROM 'comentario'";
          $resultado = $con->Execute($sentencia);
          echo "<pre>";

          while(!$resultado->EOF) {
              echo '<tr>';
              echo '<td>' . $resultado->fields['Comentario'] . '</td>';
              echo '</tr>';
              $resultado->MoveNext();
          }
          echo "</pre>";*/
          ?>
          <section id="datos">
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
                 echo '<th>Usuario</th><th>Fecha</th><th>Comentario</th>';
                 echo '</tr>';
                 $cont =1;
              }
              echo '<tr>';
              echo '<td>' . $NomUsuario . '</td>';
              echo '<td>' . $resultado->fields['Comentario'] . '</td>';
              echo '<td>' . $resultado->fields['Fecha'] . '</td>';

              $resultado->MoveNext();
          }
          echo '</table>';
          ?>
          <!-- FORMULARIO PARA INTRODUCIR EL COMENTARIO-->
          
          <input id="comentario" name="comentario"  type="text" placeholder="Escribe tu comentario..."/>
          <input type="hidden" id="idfoto" name="idfoto" value = "<?php echo "$id" ?>"    />
          <input type="submit" value="Comentar" /> 

          </form>
          </section>
          <?php
	}

	
}
else
  { 
      echo "<h3>Necesitas estar <a href='registro.php'>Registrado</a> o iniciar sesión para ver esta foto.</h3>";
  }
	echo "</div>";
    include('pie.inc');

  ?>
  
