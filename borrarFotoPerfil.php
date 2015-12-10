
  <?php 
   include('cabecera.inc');
   include('inicio.inc');
  ?>
  

<?php
session_start();

if(isset($_COOKIE['user'])){
    $user = $_COOKIE['user'];
  }

else if(isset($_SESSION['user'])){   
  $user=$_SESSION['user'];
  }




  if(!($iden = mysql_connect("localhost", "root", "")))
    die("Error: No se pudo conectar");
  // Selecciona la base de datos
  if(!mysql_select_db("p&i", $iden))
    die("Error: No existe la base de datos");

    
    $target_path = "upload/avatar/";
    unlink("upload/avatar/" .$user ."00.jpg");

    $sentencia2 = "UPDATE usuarios
    SET Foto = '$target_path'
    WHERE NomUsuario='$user'";
    $resultado2 = mysql_query($sentencia2, $iden);


   
/////////////////////////////////////////////////////////////////////////////////////
     
    echo "<br>";      
    echo "<br>";       
    echo "<br>";
    echo "<br>";
    echo "La foto ha sido borrada.";


   echo '<script language="javascript">
    function redireccionarPagina() {
        window.location = "perfil.php";
      }
     setTimeout("redireccionarPagina()", 3000);
    
    </script>';  



?>

<?php 
    include('pie.inc');
  ?>