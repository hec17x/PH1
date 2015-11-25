<?php
session_start();

?>
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

  if(!($iden = mysql_connect("localhost", "root", "")))
    die("Error: No se pudo conectar");
  // Selecciona la base de datos
  if(!mysql_select_db("p&i", $iden))
    die("Error: No existe la base de datos");

 $sentencia = "SELECT NomUsuario, Clave FROM usuarios WHERE NomUsuario='$user' AND Clave='$password'";
  // Ejecuta la sentencia SQL
  $resultado = mysql_query($sentencia, $iden);
  if(!$resultado)
    die("Error: no se pudo realizar la consulta");
  
   while($fila = mysql_fetch_assoc($resultado))
  {
    $userOK=$fila['NomUsuario'];
    $passOK=$fila['Clave'];
  }



   $_SESSION['page'] = $_SERVER['HTTP_REFERER'];
 if(isset($user) AND isset($passOK))
 {
   if ((($user == $userOK) AND ($password == $passOK)))
   {

     /* $_SESSION['user'] = $user;
      $_SESSION['pass'] = $password;**/
     

      if(isset($_GET['recordar'])){ //esta pulsado el chcekbox
          $_SESSION['user'] = $user;
          $_SESSION['pass'] = $password;
            //aqui creamos la cookiee si no existe
            if(isset($_COOKIE['user'])){
               setcookie('user',$user,time()+ 365 * 24 * 60 * 60);
                setcookie('fecha',date("r"),time()+365 * 24 * 60 * 60);
                setcookie('pass',$password,time()+365 * 24 * 60 * 60);
              }
            //aqui modificamos la cookie ya existente
            else{
              setcookie('user',$user,time()+365 * 24 * 60 * 60);
              setcookie('fecha',date("r"),time()+365 * 24 * 60 * 60);
              setcookie('pass',$password,time()+365 * 24 * 60 * 60);
            }
       
        } 
        else
        {
          $_SESSION['user'] = $user;
          $_SESSION['pass'] = $password;

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
   
 }
 else{
      echo "<h3 id='Welcome'>¡Usuario o contraseña incorrectos!</h3>";
     echo '<script language="javascript">
    function redireccionarPagina() {
        window.location = "'.$_SESSION['page'].'";
      }
      setTimeout("redireccionarPagina()", 1500);
    
    </script>'; 
      
     // echo '<a href="'.$_SERVER['HTTP_REFERER'].'"><br>Volver</a>';
   }
?>
</body>
</html>