  <?php 
    session_start();
    include('cabecera.inc');
   include('inicio.inc');
    include('acceso.inc');
    ?>


    <?php

    echo "<section id='content-det'>

		<div id='login-abrir'onclick='action1()' >";
      
  	if(isset($_COOKIE['user']) OR isset($_SESSION['user']) )
      {
      	if(isset($_COOKIE['user']))
      	{
        echo"<p id='login-abrir-nombre ''>Hola ".$_COOKIE['user']."</p>
         <img id='login-abrir-delante' src='images/delante.png'  alt='foto'>
          <img id='login-abrir-atras' src='images/atras.png'  alt='foto'>";
      	}

      	if(isset($_SESSION['user']))
      	{
      		 echo"<p id='login-abrir-nombre ''>Hola ".$_SESSION['user']."</p>
         <img id='login-abrir-delante' src='images/delante.png'  alt='foto'>
          <img id='login-abrir-atras' src='images/atras.png'  alt='foto'>";
      	}

      }
      else
      {
         echo "       
         <p id='login-abrir-nombre ''>Login</p>
         <img id='login-abrir-delante' src='images/delante.png'  alt='foto'>
          <img id='login-abrir-atras' src='images/atras.png'  alt='foto'>";
      }
       echo "</div>";
       


	if(isset($_COOKIE['user']) OR isset($_SESSION['user']) )
	{

	echo "<div id='detalle_foto'><!-- css  bajar-->
	
	</div>
	<div id='dfoto'>
		</div>
	";
	}
	else
	{	
			echo "<h3>Necesitas estar <a href='registro.php'>Registrado</a> o iniciar sesión para ver esta foto.</h3>";
	}
	echo "</div>";
    include('pie.inc');
  ?>
  
