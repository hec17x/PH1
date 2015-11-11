
  <?php 
    include('cabecera.inc');
    include('inicio.inc');
  ?>
  

<?php
   $user = $_GET['usuario'];
   $password = $_GET['contrasenya'];
   $email = $_GET['Email'];
   $sexo = $_GET['R_sexo'];
   $nacimiento = $_GET['R_Nacimiento'];
   $ciudad = $_GET['Ciudad'];
   $pais = $_GET['R_pais'];

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