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

	 if (!isset($_SESSION)) { 
      session_start(); 
 
    } 

    if(isset($_COOKIE['user']))
    {
      echo "<h3 id='Welcome'>Hasta otra, ".$_COOKIE['user']."</h3>";
    }
    else
    {
      echo "<h3 id='Welcome'>Hasta otra, ".$_SESSION['user']."</h3>";
    }
   $_SESSION = array();
    if(isset($_COOKIE[session_name()])) {
     $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
		 setcookie("user", false,time()-(60*60*24*365)); 
    setcookie("pass", false,time()-(60*60*24*365)); 
    setcookie("fecha", false,time()-(60*60*24*365)); 
	}
   
    session_destroy(); 


     echo '<script language="javascript">
		function redireccionarPagina() {
  			window.location = "index.php";
			}
			setTimeout("redireccionarPagina()", 1500);
		
		</script>'; 
?>
</body>
</html>