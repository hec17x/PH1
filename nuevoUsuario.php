
  <?php 
   include('cabecera.inc');
   //include('inicio.inc');
  ?>
  

<?php
session_start();
   $user = $_POST['usuario'];
   $password = $_POST['contrasenya'];
   $email = $_POST['Email'];
   $sexo = $_POST['R_sexo'];
   $nacimiento = $_POST['R_Nacimiento'];
   $ciudad = $_POST['Ciudad'];
   $pais = $_POST['R_pais'];

  $archivo = $_FILES['archivo']; 
          if (!isset($archivo)) 
             { die("Debes Elejir un archivo para cargar!"); } 
  $directorio  = './upload/avatar';
   $nombre = $_FILES['archivo']['name'];
   move_uploaded_file($_FILES['archivo']['tmp_name'], $directorio.$nombre);

  if(!($iden = mysql_connect("localhost", "Hector", "")))
    die("Error: No se pudo conectar");
  // Selecciona la base de datos
  if(!mysql_select_db("P&I", $iden))
    die("Error: No existe la base de datos");



 $fecha = date('Y-m-d H:i:s');

 $sentencia = "INSERT INTO usuarios(NomUsuario, Clave, Email, Sexo, FNacimiento, Ciudad, Pais, FRegistro, Foto) VALUES('$user','$password','$email','$sexo','$nacimiento', '$ciudad', '$pais', '$fecha', '$nombre')";
  // Ejecuta la sentencia SQL
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
   echo "Registro realizado con éxito:";
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
   echo "Sexo: " .$sexo;
   echo "<br>";      
   echo "<br>";
   echo "Fecha Nacimiento: " .$nacimiento;
   echo "<br>";      
   echo "<br>";
   echo "Ciudad: " .$ciudad;
   echo "<br>";      
   echo "<br>";
   echo "Pais: " .$pais;


  /* echo '<script language="javascript">
    function redireccionarPagina() {
        window.location = "index.php";
      }
      setTimeout("redireccionarPagina()", 3000);
    
    </script>';  */

?>

<?php 
    include('pie.inc');
  ?>