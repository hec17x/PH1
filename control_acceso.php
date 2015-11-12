
<!DOCTYPE html>
<html lang="es">
<!-- La cabecera -->

<head>
<meta charset="UTF-8" />
<meta name="generator" content="Sublime-Text" />
<meta name="author" content="Héctor - Roberto "/>
<meta name="keywords" content="HTML5, web" />
<meta name="description" content="PI - HOME" />

<link rel="stylesheet" type="text/css" href="css/acceso.css">
</head>
<body onload="this.style.opacity=1">
<?php

   $user = $_GET['usuario'];
   $password = $_GET['password'];

   $userH="Hector";
   $passH="Hector1";
   $userR="Roberto";
   $passR="Roberto1";
 
   if ((($user == $userH) AND ($password == $passH)) OR (($user == $userR) AND ($password ==$passR))){
      echo "<h3 id='Welcome'>Bienvenido ".$user."</h3>";
      echo '<script language="javascript">
		function redireccionarPagina() {
  			window.location = "perfil.php?user='.$user.'";
			}
			setTimeout("redireccionarPagina()", 1500);
		
		</script>'; 
      
   }
   else{
      echo "<h3 id='Welcome'>¡Usuario o contraseña incorrectos!</h3>";
     echo '<script language="javascript">
		function redireccionarPagina() {
  			window.location = "index.php";
			}
			setTimeout("redireccionarPagina()", 1500);
		
		</script>'; 
      
     // echo '<a href="'.$_SERVER['HTTP_REFERER'].'"><br>Volver</a>';
   }
?>
</body>
</html>