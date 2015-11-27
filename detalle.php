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

        else if(isset($_SESSION['user']))
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
    //Si viene de index.php muestro esto:
    if(strpos($_SERVER['HTTP_REFERER'],"index.php") != false) {

    	echo "<div id='detalle_foto'><!-- css  bajar-->
          </div>
    	    <div id='dfoto'>
    		  </div>
    	    ";
    }
    //Si vengo de resultado muestra la foto con una consulta:
    else if(strpos($_SERVER['HTTP_REFERER'],"resultado.php") != false){
        //necesitamos el ID de la foto para poder mostrarla con todas sus cosas:

       if($_GET['di'] !=null){

            $id = $_GET['di'] ; //esta variable contiene el id de la imagen
            ////////////////////////////////////////////////////////////////////si solo existe el titulo

                if(!($iden = mysql_connect("localhost", "root", "")))
                    die("Error: No se pudo conectar");
                if(!mysql_select_db("p&i", $iden))
                    die("Error: No existe la base de datos");


                $sentencia1 = "SELECT * FROM Fotos WHERE IdFotos = '$id' ";
                // Ejecuta la sentencia SQL
                $resultado = mysql_query($sentencia1, $iden);
                if(!$resultado)
                die("Error: no se pudo realizar la consulta");
                
                while($fila = mysql_fetch_assoc($resultado))
                    {

                        $fe=$fila['Pais'];
                        $sentencia3 = "SELECT * FROM Paises WHERE IdPais='$fe'";
                        // Ejecuta la sentencia SQL
                         $resultado2 = mysql_query($sentencia3, $iden);
                         if(!$resultado2)
                             die("Error : no se pudo realizar la consulta");
                
                        while($fila1 = mysql_fetch_assoc($resultado2))
                        {

                            $pais=$fila1['NomPais'];
                        }


                        $id= $fila['IdFotos'];
                          
                          echo "<img src='./upload/fotos/".$fila['Fichero']."' width='100px'/></a>" ;
                          echo "<ul>";
                          echo "<li><b>Titulo</b>".": ".$fila['Titulo']."</li>";
                          echo "<li><b>Fecha</b>".": ".$fila['Fecha']."</li>";
                          echo "<li><b>Pais</b>".": ".$pais."</li>";
                          echo "<li><b>ID</b>".": ".$id."</li>";
                          echo "</ul>";
                    }


            ////////////////////////////////////////////////////////////////////////////



       } 



    }

	}
	else
	{	
			echo "<h3>Necesitas estar <a href='registro.php'>Registrado</a> o iniciar sesión para ver esta foto.</h3>";
	}
	echo "</div>";
    include('pie.inc');
  ?>
  
