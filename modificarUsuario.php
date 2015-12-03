
  <?php 
   include('cabecera.inc');
   include('inicio.inc');
  ?>
  

<?php
session_start();
   $id = $_POST['Id_usuario'];
   $user = $_POST['usuario'];
   $password = $_POST['contrasenya'];
   $email = $_POST['Email'];
   $nacimiento = $_POST['R_Nacimiento'];
   $ciudad = $_POST['R_ciudad'];


  if(!($iden = mysql_connect("localhost", "root", "")))
    die("Error: No se pudo conectar");
  // Selecciona la base de datos
  if(!mysql_select_db("p&i", $iden))
    die("Error: No existe la base de datos");




$sentencia = "UPDATE usuarios
          SET NomUsuario='$user', Clave='$password', Email = '$email', FNacimiento='$nacimiento', Ciudad='$ciudad'
          WHERE IdUsuario='$id'";

 setcookie('user',$user,time()+ 365 * 24 * 60 * 60);
 setcookie('pass',$password,time()+365 * 24 * 60 * 60);
 $_SESSION['user'] = $user;
 $_SESSION['pass'] = $password;



 $fecha = date('Y-m-d H:i:s');

 /*$sentencia = "UPDATE INTO usuarios(NomUsuario, Clave, Email, Sexo, FNacimiento, Ciudad, Pais, FRegistro, Foto) VALUES('$user','$password','$email','$sexo','$nacimiento', '$ciudad', '$pais', '$fecha', '$nombre')";
 */
 

  //ejecutamos la sentencias
  $resultado = mysql_query($sentencia, $iden);
  if(!$resultado)
  {
       echo "<br>";
   echo "<br>";
   echo "<br>";
   echo "<br>";
      echo "<br>";
   echo "<br>";

    die("El Usuario ya existe");
  }



   echo "<br>";
   echo "<br>";
   echo "<br>";
   echo "<br>";
   echo "Datos actualizados con éxito:";
   echo "<br>";
   echo "<br>";
   echo "Usuario: " .$user;
   echo "<br>";      
   echo "<br>";
   echo "Contraseña: " .$password;
   echo "<br>";      
   echo "<br>";
   echo "Email: " .$email;
 
   echo "<br>";      
   echo "<br>";
   echo "Fecha Nacimiento: " .$nacimiento;
   echo "<br>";      
   echo "<br>";
   echo "Ciudad: " .$ciudad;
   echo "<br>";      
   echo "<br>";




   echo '<script language="javascript">
    function redireccionarPagina() {
        window.location = "perfil.php";
      }
      setTimeout("redireccionarPagina()", 5000);
    
    </script>';  



?>

<?php 
    include('pie.inc');
  ?>