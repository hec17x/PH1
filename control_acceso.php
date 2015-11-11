<?php
   $user = $_GET['usuario'];
   $password = $_GET['password'];

   $userH="Hector";
   $passH="Hector1";
   $userR="Roberto";
   $passR="Roberto1";
 
   if (($user == $userH OR $user == $userR) AND ($password == $passH OR $password ==$passR)){
      echo "Bienvenido ".$user;
      echo '<script language="javascript">
		function redireccionarPagina() {
  			window.location = "perfil.php";
			}
			setTimeout("redireccionarPagina()", 1500);
		
		</script>'; 
      
   }
   else{
      echo "¡Usuario o contraseña incorrectos!";
     echo '<script language="javascript">
		function redireccionarPagina() {
  			window.location = "index.php";
			}
			setTimeout("redireccionarPagina()", 1500);
		
		</script>'; 
      
     // echo '<a href="'.$_SERVER['HTTP_REFERER'].'"><br>Volver</a>';
   }
?>