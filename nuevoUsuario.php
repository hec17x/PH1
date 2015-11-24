
  <?php 
  //  include('cabecera.inc');
   // include('inicio.inc');
  ?>
  

<?php
   $user = $_GET['usuario'];
   $password = $_GET['contrasenya'];
   $email = $_GET['Email'];
   $sexo = $_GET['R_sexo'];
   $nacimiento = $_GET['R_Nacimiento'];
   $ciudad = $_GET['Ciudad'];
   $pais = $_GET['R_pais'];


  if(!($iden = mysql_connect("localhost", "Hector", "")))
    die("Error: No se pudo conectar");
  // Selecciona la base de datos
  if(!mysql_select_db("P&I", $iden))
    die("Error: No existe la base de datos");
 $fecha=date("Y-m-d");  
 $sentencia = "INSERT INTO usuarios(NomUsuario, Clave, Email, Sexo, FNacimiento, Ciudad, Pais) VALUES('$user','$password','$email','$sexo','$nacimiento','$ciudad','$pais')";
  // Ejecuta la sentencia SQL
  $resultado = mysql_query($sentencia, $iden);
  if(!$resultado)
    die("Error: no se pudo realizar la consulta");



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