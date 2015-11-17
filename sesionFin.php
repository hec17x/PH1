<?php
	 if (!isset($_SESSION)) { 
      session_start(); 
    $_SESSION = array();
    } 



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