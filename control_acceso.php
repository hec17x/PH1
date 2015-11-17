
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

session_start();
session_name("WebsiteID");


   $user = $_GET['usuario'];
   $password = $_GET['password'];

   $userH="Hector";
   $passH="Hector1";
   $userR="Roberto";
   $passR="Roberto1";
 
   if ((($user == $userH) AND ($password == $passH)) OR (($user == $userR) AND ($password ==$passR))){

     /* $_SESSION['user'] = $user;
      $_SESSION['pass'] = $password;**/
     

      if(isset($_GET['recordar'])){ //esta pulsado el chcekbox

            //aqui creamos la cookiee si no existe
            if(isset($_COOKIE['user'])){
               setcookie('user',$user,time()+60);
                setcookie('fecha',date("r"),time()+60);
                setcookie('pass',$password,time()+60);
              }
            //aqui modificamos la cookie ya existente
            else{
              setcookie('user',$user,time()+60);
              setcookie('fecha',date("r"),time()+60);
              setcookie('pass',$password,time()+60);
            }

        }   
        
        echo "<h3 id='Welcome'>Bienvenido ".$user."</h3>";
        echo '<script language="javascript">
        
        function redireccionarPagina() {
              window.location = "perfil.php";
        }
        
        setTimeout("redireccionarPagina()", 1500);
          
        </script>'; 

   }

   //si el login es fallido
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