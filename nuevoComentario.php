<?php 
session_start();
    include('cabecera.inc');
    include('inicio.inc');
    include('acceso.inc');
    include('adodb5/adodb.inc.php');

  ?>

<?php

   error_reporting(0);
   $comentario = $_POST['comentario'];
   $foto  = $_POST['idfoto'];

   if($comentario=="" || $comentario==" " || $comentario=="  " || $comentario=="   " || $comentario=="    "){
          ?>
          <script type="text/javascript">
              alert("Introduce un comentario");
              stop();
              history.back();
          </script>
          <?php
   }
  else{

  if(isset($_COOKIE['user'])){
      $user = $_COOKIE['user'];
  }

  else if(isset($_SESSION['user'])){   
      $user=$_SESSION['user'];
  }
  

    include_once 'adodb/adodb.inc.php';
    $con = NewADOConnection('mysql');
    $con->Connect('localhost', // El servidor
    'root', // El usuario
    '', // La contraseña
    'p&i'); // La base de datos
    // Ejecuta una sentencia SQL


    $sentencia5 = "SELECT * FROM usuarios where NomUsuario = '$user' ";
    $resultado5 = $con->Execute($sentencia5);
    $cont = 0;
    // Recorre el resultado y lo muestra en forma de tabla HTML
    while(!$resultado5->EOF) {

        echo '<tr>';
        //echo '<td>' . $resultado->fields['Usuario'] . '</td>';
        $iduser = $resultado5->fields['IdUsuario'];
        $resultado5->MoveNext();
      }



 $fecha = date('Y-m-d H:i:s');

 $sentencia = "INSERT INTO `comentario`(`Comentario`, `Fecha`, `Usuario`, `Foto`, `Validado`) 
              VALUES ('$comentario','$fecha',$iduser, $foto,0 )";
  // Ejecuta la sentencia SQL
 $resultado = $con->Execute($sentencia);


  if(!$resultado)
  {
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";


        ?>
          <script type="text/javascript">
              alert("No se pudo insertar comentario");
              stop();
              history.back();
              return (false);
            </script>
  <?php
  }
  else{
    echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "Comentario insertado: ";
  echo "$comentario";
  echo "<br>";
  echo "Fecha: ";
  echo "$fecha";
  echo "<br>";
  echo "Usuario: ";
  echo "$user";
  echo " ";
  echo "$iduser";
  echo "<br>";
  echo "Id foto: ";
  echo "$foto";
  echo "<br>";
  echo "<br>";
  echo "<a href='detalle.php?id=$foto'><button type='submit'>Continuar</button></a>";

  }
 
} 

?>

<?php 
    include('pie.inc');
  ?>